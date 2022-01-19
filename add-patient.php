<?php
    require_once "init.php";
    
    if (isset($_POST["addPatient"])) {
        $name = $_POST["fullName"];
        $gender = $_POST["gender"];
        $address = $_POST["address"];
        $age = $_POST["age"];
        $time = $_POST["time"];

        $newPatient = new Patient($name, $age, $gender, $address);
        $newPatient->setConsultation("time", $time);

        $DATA->addPatient($newPatient);
        Util::saveData();

        header("location: /patients.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Appointment System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Clinic Appointment System</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link" aria-current="page">Dashboard</a></li>
                <li class="nav-item"><a href="/appointments" class="nav-link active" aria-current="page">Appointments</a></li>

                <li class="nav-item"><a href="/patients.php" class="nav-link">Patient Info</a></li>
            </ul>
        </header>

        <div class="d-flex flex-row gap-2 justify-content-center">
            <form class="row" method="POST">
                <div class="mb-3 col-sm-12">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName">
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="gender" class="form-label">Gender</label>
                    <select id="gender" class="form-control" name="gender">
                        <option disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="male">Female</option>
                    </select>
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age">
                </div>
                <div class="mb-3 col-sm-12">
                <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="mb-3 col-sm-12">
                    <label for="time" class="form-label">Time</label>
                    <input type="time" id="time" class="form-control" name="time"/>
                </div>
                <button type="submit" class="btn btn-primary col-sm-12" name="addPatient">Add</button>
            </form>
        </div>
    </div>
</body>

</html>