

    <?php  include(VIEWS.'inc'.DS.'header.php'); ?>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="text-center p-5 bg-white shadow rounded">
            <h1 class="mb-4">Bienvenu Dans Le Systeme De Vote</h1>
            <p class="mb-4">Veuillez vous inscrire ou vous connecter pour participer au vote</p>
            <a href="<?php url('auth/index')?>" class="btn btn-primary">Se connecter</a>
            <a href="<?php url('auth/signup')?>" class="btn btn-primary mr-4">S'inscrire</a>
        </div>
    </div>

    <?php  include(VIEWS.'inc'.DS.'footer.php'); ?>