<?php
function AOF_permissions($permissionsLvl, $userPermissions)
{
    if($permissionsLvl == $userPermissions)
    {
        return true;
    }
    else if($permissionsLvl > $userPermissions)
    {
        return false; 
    }
    else 
        return false;
}
?>
