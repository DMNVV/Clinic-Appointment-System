<?php
    require_once "init.php";

    $appointments = $DATA->getAllAppointments();

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
                <li class="nav-item"><a href="/appointments.php" class="nav-link active" aria-current="page">Appointments</a></li>
                <li class="nav-item"><a href="/patients.php" class="nav-link">Patient Info</a></li>
            </ul>
        </header>

        <div class="d-flex flex-column items-center gap-2">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name / Address</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Nurse Name</th>
                        <th scope="col">Appointment Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $date => $appointment) { ?>
                    <tr>
                        <th scope="row"><?= $appointment[0]->getName(); ?><br></th>
                        <td><?= $appointment[0]->getAge(); ?></td>
                        <td><?= $appointment[0]->getGender(); ?></td>
                        <td><?= $appointment[1]; ?></td>
                        <td><?php $date = new DateTime($date); echo $date->format("m-d-Y H:i:s") ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <a class="btn btn-success" href="add-appointment.php">Add New Appointment</a>
            </div>
        </div>
    </div>
</body>

</html>