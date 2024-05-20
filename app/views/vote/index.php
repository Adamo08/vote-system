

<?php  include(VIEWS.'inc'.DS.'header.php'); ?>
<?php
    session_start();
    $user = $_SESSION['user'];
    $condidat = new Condidat();
    $condidats = $condidat->getAllCondidats();
    $i = 0;
?>
    <div class="container mt-5">
        <?php if(isset($error)):?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?=$error?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif;?>
        <h1 class="text-center mb-4">List des condidats</h1>
        <div class="table-responsive">
            <form action="addVote/<?=$user['id']?>" method="POST">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Voter</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0; foreach($condidats as $condidat): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= htmlspecialchars($condidat['name']) ?></td>
                                <td><?= htmlspecialchars($condidat['description']) ?></td>
                                <td class="text-center">
                                    <input 
                                        type="checkbox" 
                                        name="Votedcondidats[]" 
                                        value="<?= htmlspecialchars($condidat['id']) ?>"
                                        class="form-check-input"
                                    >
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary mb-5">Submit Votes</button>
                </div>
            </form>
        </div>
    </div>



    <script>
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const maxChecked = 3;

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                if (checkedCheckboxes.length > maxChecked) {
                    this.checked = false;
                } 
            });
        });
</script>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>