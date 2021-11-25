<?php
 
class Patient {
    private $name;
    private $age;
    private $gender;
    private $address;
    private $consultation;
 
    public function __construct($name, $age, $gender, $address) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->address = $address;
        $this->consultation = [
            "time" => "",
            "consulted" => false
        ];
    }
 
 
    // Getters
    public function getName() {
        return $this->name;
    }
 
    public function getAge() {
        return $this->age;
    }
 
    public function getGender() {
        return $this->gender;
    }
 
    public function getAddress() {
        return $this->address;
    }
 
    public function getConsultation($key) {
        return $this->consultation[$key];
    }
 
    // Setters
    public function setName($name) {
        $this->name = $name;
    }
 
    public function setAge($age) {
        $this->age = $age;
    }
 
    public function setGender($gender) {
        $this->gender = $gender;
    }
 
    public function setAddress($address) {
        $this->address = $address;
    }
 
    public function setConsultation($key, $value) {
        $this->consultation[$key] = $value;
    }
}
Ad by Valueimpression
