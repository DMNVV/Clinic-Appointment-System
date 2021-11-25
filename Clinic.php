<?php

class Clinic {
    private $name;
    private $patients = [];

    public function __construct($name) {
        $this->name = $name;
    }

    // Getters
    public function getName() {
        return $this->name;
    }

    public function getAllPatients() {
        return $this->patients;
    }

    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function addPatient(Patient $patient) {
        array_push($this->patients, $patient);
    }