<?php
    require_once "init.php";

    $patients = $DATA->getAllPatients();

    if (isset($_GET["delete"])) {
        $DATA->deletePatient($_GET["delete"]);
        Util::saveData();
        
        header("location: /patients.php");
    }

    if (isset($_GET["done"])) {
        $DATA->getPatient($_GET["done"])->setConsultation("consulted", true);
        Util::saveData();
        header("location: /patients.php");
    }

    if (isset($_GET["sort"])) {
        $isAsc = $_GET["order"] == "asc" ? true : false;
        switch ($_GET["sort"]) {
            case "name":
                $patients = Util::sortByName($patients, $isAsc);
                break;
            case "time":
                $patients = Util::sortByTime($patients, $isAsc);
                break;
            case "time":
                $patients = Util::sortByConsultation($patients, $isAsc);
                break;
        }
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
                <li class="nav-item"><a href="/appointments.php" class="nav-link" aria-current="page">Appointments</a></li>
                <li class="nav-item"><a href="/patients.php" class="nav-link active">Patient Info</a></li>
            </ul>
        </header>

        <div class="d-flex flex-column items-center gap-2">
            <div>
                <?php
                    $opposite_order = "desc";

                    if (isset($_GET["order"]) && $_GET["order"] == "asc") {
                        $opposite_order = "desc";
                    } else {
                        $opposite_order = "asc";
                    }
                ?>
                <a class="btn btn-primary" href="?sort=name&order=<?= $opposite_order; ?>">Sort by Name (<?= ucfirst($opposite_order); ?>)</a>
                <a class="btn btn-primary" href="?sort=time&order=<?= $opposite_order; ?>">Sort by Time (<?= ucfirst($opposite_order); ?>)</a>
                <a class="btn btn-primary" href="?sort=consultation&order=<?= $opposite_order; ?>">Sort by Consultation (<?= ucfirst($opposite_order); ?>)</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name / Address</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Status</th>
                        <th scope="col">C. Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient) { ?>
                    <tr>
                        <th scope="row"><?= $patient->getName(); ?><br></th>
                        <td><?= $patient->getAge(); ?></td>
                        <td><?= $patient->getGender(); ?></td>
                        <?php if (!$patient->getConsultation("consulted")) { ?>
                        <td><span class="badge rounded-pill bg-primary"><?= $patient->getConsultation("consulted") ? "CONSULTED" : "PENDING" ?></span></td>
                        <?php } else { ?>
                        <td><span class="badge rounded-pill bg-warning"><?= $patient->getConsultation("consulted") ? "CONSULTED" : "PENDING" ?></span></td>
                        <?php } ?>
                        <td>Time: <?= $patient->getConsultation("time"); ?></td>
                        <td>
                            <?php if (!$patient->getConsultation("consulted")) { ?>
                            <a href="?done=<?= $patient->getId(); ?>" class="text-success">Done</a>
                            <?php }?>
                            <a href="?delete=<?= $patient->getId(); ?>" class="text-danger">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <a class="btn btn-success" href="add-patient.php">Add New Patient</a>
            </div>
        </div>
    </div>
</body>

</html>