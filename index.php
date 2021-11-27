<?php
    require_once "init.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Clinic Management System</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Dashboard</a></li>
                <li class="nav-item"><a href="/patients.php" class="nav-link">Patient Info</a></li>
            </ul>
        </header>

        <div class="d-flex flex-row items-center gap-2">
            <div>
                <img src="bg.jpg" width="900" height="600">
            </div>
            <div class="d-flex flex-column gap-2 flex-grow-1">
                <div class="card flex-grow-1">
                    <div class="card-body">
                    <h5 class="card-title text-center">Patient Information</h5>
                        <p class="card-text text-center">Number of patients</p>
                        <h1 class="card-text text-center"> <b><?= count($DATA->getAllPatients()); ?></b></h1>
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="position-absolute top-50 start-50 translate-middle" viewBox="0 0 16 16">
  <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
  <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z"/>
</svg>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a class="btn btn-success" href="patients.php">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>