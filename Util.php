<?php

class Util {
    static function sortByName($patients, $asc = true) {
        usort($patients, function($a,$b) {
            return strcmp($a->getName(), $b->getName());
        });

        $out = $asc ? $patients : array_reverse($patients);
        return $out;
    }

    static function sortByTime($patients, $asc = true) {
        usort($patients, function($a, $b) {
            return strcmp($a->getConsultation("time"), $b->getConsultation("time"));
        });

        $out = $asc ? $patients : array_reverse($patients);
        return $out;
    }

    static function sortByConsultation($patients, $asc = true) {
        usort($patients, function($a, $b) {
            return strcmp($a->getConsultation("consulted"), $b->getConsultation("consulted"));
        });
        
        $out = $asc ? $patients : array_reverse($patients);
        return $out;
    }
}
