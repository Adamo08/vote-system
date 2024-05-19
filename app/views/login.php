<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php url('assets/css/style.css') ?>">

    <title><?=@$name?></title>
</head>

<body>

    <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center justify-content-center gap-2" href="<?php url()?>">
                        <img 
                            src="../../public/assets/images/vote_box_1.png" 
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


    <section class="vh-100 d-flex align-items-center justify-content-center">
        <div class="container-lg">
            <div class="row shadow">
                <!-- d-flex justify-content-center align-items-center -->
                <div class="col-sm-6">
                    <form class="p-4 bg-light h-100" action="<?php url('auth/login')?>" method="POST">
                        <?php
                            session_start();
                            if(isset($_SESSION['success_message'])){
                                echo  "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            <strong>Congrats 🎉👏🏻</strong> $_SESSION[success_message].
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
                            }
                        ?>    
                        <?php if(isset($failed)):?>
                            <p class="mb-2 text-danger"><?=$failed?></p>
                        <?php endif;?>
                        <h2 class="fw-normal mb-3 fw-bolder">Log in</h2>
                        <div class="mb-4">
                            <label for="form2Example18" class="form-label">Email address</label>
                            <input type="email" id="form2Example18" name="email" class="form-control form-control-lg"/>
                        </div>
                        <div class="mb-4">
                            <label for="form2Example28" class="form-label">Password</label>
                            <input type="password" id="form2Example28" name="password" class="form-control form-control-lg"/>
                        </div>
                        <div class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                        </div>
                        <p class="mb-0">Don't have an account? <a href="<?php  url('auth/signup')?>" class="text-info">Register here</a></p>
                    </form>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <img 
                        src="../../public/assets/images/vote_system_1.jpg" 
                        alt="Voting System" 
                        class="img-fluid h-100"
                    >
                </div>
            </div>
        </div>
    </section>



<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>
