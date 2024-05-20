<?php include(VIEWS.'inc'.DS.'header.php'); ?>

<?php 
    session_start();
    $user = $_SESSION['user'];
    $userId = $user['id'];
?>

<div class="container mt-5 cnt d-none">
    <div id="loadingIndicator">
        <img src="<?= SITE_NAME.'assets/images/loading.gif' ?>" alt="Loading Indicator" width="40" height="40">
    </div>
    <div id="searchResults"></div>
    <div id="disappearMessage" class="mt-3 text-danger">
        The results will disappear in <span id="counter">10</span> seconds.
    </div>
</div>

<div class="container my-5">
    <h1 class="display-4 text-center mb-4">Results Vote</h1>
    <div class="container">
        <h2 class="h4 mb-4">Recapitulatif des candidats votés</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($votedCondidats as $votedCondidat): ?>
                    <tr>
                        <td><?= $votedCondidat['name'] ?></td>
                        <td><?= $votedCondidat['description'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mt-4">
            <button id="btnHover" class="btn btn-primary me-2">Consulter les resultats en temps réel</button>
            <a href="<?= url("home/generatePdf/$userId") ?>" class="btn btn-secondary">Reçu de vote PDF</a>
        </div>
    </div>

    <div class="container mt-5">
        <?php if(isset($success)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $success ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    const btnHover = document.getElementById('btnHover');
    const searchResults = document.getElementById('searchResults');
    const loadingIndicator = document.getElementById('loadingIndicator');
    const cnt = document.querySelector(".cnt");
    const counter = document.getElementById('counter');

    btnHover.addEventListener('click', function() {
        // Show loading indicator
        loadingIndicator.classList.remove('d-none');
        cnt.classList.remove('d-none');

        // AJAX request
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                // Hide loading indicator
                loadingIndicator.classList.add('d-none');

                if (xhr.status === 200) {
                    // Display search results
                    searchResults.innerHTML = xhr.responseText;
                } else {
                    searchResults.innerHTML = `<div class="alert alert-danger" role="alert">Failed to load data. Please try again.</div>`;
                }

                // Countdown from 4 to 0
                let countdown = 10;
                const countdownInterval = setInterval(() => {
                    countdown--;
                    counter.textContent = countdown;
                    if (countdown === 0) {
                        clearInterval(countdownInterval);
                        cnt.classList.add('d-none');
                    }
                }, 1000);
            }
        };

        xhr.open('GET', '<?= url("vote/showCondidat") ?>', true);
        xhr.send();
    });
</script>

<?php include(VIEWS.'inc'.DS.'footer.php'); ?>
