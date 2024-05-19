

    <?php  include(VIEWS.'inc'.DS.'header.php'); ?>

    <div class="container">
        <h1>Hello From Home</h1>
        <form action="">
            <div class="form-div">
                <label for="fname" class="form-label">Prenom</label>
                <input type="text" id="fname" name="fname" placeholder="First Name ....">
            </div>
            <div class="form-div">
                <label for="" class="form-label">Nom</label>
                <input type="text" id="lname" name="lname" placeholder="Last Name ....">
            </div>
            <div class="form-div">
                <label for="mdp" class="form-label">Password</label>
                <input type="text" id="mdp" name="mdp" placeholder="Password ....">
            </div>
        </form>
    </div>

    <?php  include(VIEWS.'inc'.DS.'footer.php'); ?>