<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?=@$name?></title>
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

    <section class="mt-5 vh-100 d-flex align-items-center justify-content-center">
        <div class="container-lg">
            <div class="row shadow">
                <div class="col-sm-6">
                    <form class="p-4 bg-light" action="<?php url('auth/register')?>" method="POST">
                        <div class="mb-2">
                            <?php if (isset($success)):?>
                                <p style="color: green"><?=$success?></p>
                            <?php endif;?>

                            <?php if (isset($error)):?>
                                <p style="color: red"><?=$error?></p>
                            <?php endif;?>
                        </div>
                        <h2 class="fw-normal mb-3 fw-bolder">Register</h2>
                        <div class="mb-2">
                            <label for="form2Example09" class="form-label">First Name</label>
                            <input type="text" id="form2Example09" name="fname" class="form-control form-control-lg" />
                        </div>
                        <div class="mb-2">
                            <label for="form2Example10" class="form-label">Last Name</label>
                            <input type="text" id="form2Example10" name="lname" class="form-control form-control-lg" />
                        </div>
                        <div class="mb-2">
                            <label for="form2Example18" class="form-label">Email address</label>
                            <input type="email" id="form2Example18" name="email" class="form-control form-control-lg" />
                        </div>
                        <div class="mb-2">
                            <label for="form2Example18" class="form-label">UserName</label>
                            <input type="text" id="form2Example18" name="username" class="form-control form-control-lg" />
                        </div>
                        <div class="mb-2">
                            <label for="form2Example28" class="form-label">Password</label>
                            <input type="password" id="form2Example28" name="password" class="form-control form-control-lg" />
                        </div>
                        <div class="mb-2">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                        </div>
                        <p class="mb-0">Already have an account? <a href="<?php  url('auth/index')?>" class="text-info">Login here</a></p>
                    </form>
                </div>
                <div class="col-sm-6 d-none d-sm-block">
                    <img 
                        src="../../public/assets/images/vote_system_2.jpg" 
                        alt="Voting System" 
                        class="img-fluid h-100"
                    >
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
