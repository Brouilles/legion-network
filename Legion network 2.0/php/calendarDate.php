<?php
class Calendar{
    
    var $months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
    var $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');

    function getAll($years) {
        $v = array();
        $date = strtotime($years.'-01-01');

        while(date('Y', $date) <= $years)
        {
            //Get value
            $year = date('Y', $date);
            $month = date('n', $date);
            $day = date('j', $date);
            $week = str_replace('0', '7', date('w', $date));
            $v[$year][$month][$day] = $week;

            $date = $date + 24*3600;
        }

        return $v;
    }
}
?>

