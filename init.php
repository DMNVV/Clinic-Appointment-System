<?php
session_start();

require_once "Patient.php";
require_once "Clinic.php";
require_once "Util.php";

if (isset($_GET["reset"])) {
    Util::reset();
}

$DATA = Util::loadData();