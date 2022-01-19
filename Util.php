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

    static function loadData() {
        if (!isset($_SESSION["data"]) || empty($_SESSION["data"])) {
            $Clinic = new Clinic("Diana May");

            $_SESSION["data"] = serialize($Clinic);
            return $Clinic;
        }

        return unserialize($_SESSION["data"]);
    }

    static function saveData() {
        global $DATA;

        $_SESSION["data"] = serialize($DATA);

        return true;
    }

    static function reset() {
        global $_DATA;

        unset($_SESSION["data"]);

        return true;
    }
}
