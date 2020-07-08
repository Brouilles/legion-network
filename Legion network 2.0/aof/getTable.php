<?php
include 'aof/bdd_connect.php';

//GENERAL
function AOF_getTableAllValue($tableName)
{
    $bdd = AOF_connect();

    //Get All Value
    $reply = $bdd->query('SELECT * FROM '.$tableName);
    while($data = $reply->fetch())
    {
        print_r($data);
    }
}

function AOF_getTableValue($tableName, $id)
{
    $bdd = AOF_connect();

    //Get Value
    $stop = 0;
    $reply = $bdd->query('SELECT * FROM '.$tableName);

    while($stop != 1 && $data = $reply->fetch())
    {
        if($id == $data['id'])
        {
            $stop = 1;
        }
        else
        {
            $stop = 0;
        }
    }

    if($stop = 1)
    {
        return $data;
    }
}

function AOF_compareValueAndGetTableValue($tableName, $compareOriginal, $compare, $compareOriginal2 = NULL, $compare2 = NULL)
{
    $bdd = AOF_connect();

    //Compare
    $stop = 0;
    $reply = $bdd->query('SELECT * FROM '.$tableName);
    while($stop != 1 && $data = $reply->fetch())
    {
        if($compareOriginal == $data[$compare])
        {
            if($compare2 != NULL && $compareOriginal2 != NULL)
            {
                if($compareOriginal2 == $data[$compare2])
                    $stop = 1;
                else 
                    $stop = 0;
            }
            else if($compare2 == NULL && $compareOriginal2 == NULL)
                $stop = 1;
        }
        else
            $stop = 0;
    }

    if($stop = 1)
        return $data;
    else 
        return null;
}

function AOF_compareValueAndGetTableValueInverse($tableName, $compareOriginal, $compare, $compareOriginal2 = NULL, $compare2 = NULL)
{
    $bdd = AOF_connect();

    //Compare
    $stop = 0;
    $reply = $bdd->query('SELECT * FROM '.$tableName.' ORDER BY id DESC');
    while($stop != 1 && $data = $reply->fetch())
    {
        if($compareOriginal == $data[$compare])
        {
            if($compare2 != NULL && $compareOriginal2 != NULL)
            {
                if($compareOriginal2 == $data[$compare2])
                    $stop = 1;
                else 
                    $stop = 0;
            }
            else if($compare2 == NULL && $compareOriginal2 == NULL)
                $stop = 1;
        }
        else
            $stop = 0;
    }

    if($stop = 1)
        return $data;
    else 
        return null;
}

//COUNT
function AOF_count($tableName, $specialParameter = NULL, $specialParameterValue = NULL)
{
    $bdd = AOF_connect();

    //Count
    $count = 0;
    $reply = $bdd->query('SELECT * FROM '.$tableName);
    while($data = $reply->fetch())
    {
        if(isset($specialParameter) && isset($specialParameterValue))
        {
            if($data[$specialParameter] == $specialParameterValue)
            {
                $count += 1;
            }
        }
        else
            $count += 1;
    }

     return $count;
}

//COUNT AND GET ID
function AOF_countGetID($tableName, $compareOriginal, $compare, $compareOriginal2 = NULL, $compare2 = NULL)
{
    $bdd = AOF_connect();

    //Compare
    $count;
    $reply = $bdd->query('SELECT * FROM '.$tableName);
    while($data = $reply->fetch())
    {
        if($compareOriginal == $data[$compare])
        {
            if($compare2 != NULL && $compareOriginal2 != NULL)
            {
                if($compareOriginal2 == $data[$compare2])
                    $count[] = $data['id'];
            }
            else if($compare2 == NULL && $compareOriginal2 == NULL)
                $count[] = $data['id'];
        }
    }

    return $count;
}
?>
