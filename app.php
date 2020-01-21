<?php

function mensualiteHA($capital, $taux, $duree)
{
    $mensualiteHA = ($capital * (($taux / 100)/12)) / (1 - pow((1 + (($taux / 100)/12)), -$duree) );
    return round($mensualiteHA, 2);
}

function mensualiteAC($capital, $taux, $duree, $assurance = false)
{
    if (!empty($assurance))
    {
        $mensualiteAC = (($capital * (($taux / 100)/12)) / (1 - pow((1 + (($taux / 100)/12)), -$duree) )) + ($capital * (($assurance / 100) / 12));
        return round($mensualiteAC, 2);
    }
    else
    {
        $mensualiteAC = (($capital * (($taux / 100)/12)) / (1 - pow((1 + (($taux / 100)/12)), -$duree) ));
        return round($mensualiteAC, 2);
    }
}

function calculInteretsHA($capital, $taux, $duree)
{
    $interetsHA = ((($capital * (($taux / 100)/12)) / (1 - pow((1 + (($taux / 100)/12)), -$duree) )) * $duree) - $capital;
    return round($interetsHA, 2);
}

function calculInteretsAC($capital, $taux, $duree, $assurance = false)
{
    if (!empty($assurance))
    {
        $interetsAC = (((($capital * (($taux / 100)/12)) / (1 - pow((1 + (($taux / 100)/12)), -$duree) )) * $duree) - $capital) + (($capital * (($assurance / 100) / 12)) * $duree);
        return round($interetsAC, 2);
    }
    else
    {
        $interetsAC = ((($capital * (($taux / 100)/12)) / (1 - pow((1 + (($taux / 100)/12)), -$duree) )) * $duree) - $capital;
        return round($interetsAC, 2);
    }
}