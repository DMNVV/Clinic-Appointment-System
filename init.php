<?php
session_start();

require_once "Patient.php";
require_once "Clinic.php";
require_once "Util.php";


$DATA = Util::loadData();