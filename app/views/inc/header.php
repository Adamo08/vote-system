<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>System-Vote</title>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center justify-content-center gap-2" href="<?php url()?>">
                    <img 
                        src="<?php echo SITE_NAME.'assets/images/vote_box_1.png'; ?>" 
                        alt="Logo" 
                        height="60"
                    >
                    <h1 class="fw-bolder">Vota</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php url('')?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php url('vote/index')?>">Vote</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php url('vote/result')?>">Results</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</header>