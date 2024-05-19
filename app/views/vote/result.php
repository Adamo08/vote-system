

<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

<div class="container">
    <h1>Results Vote</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Table Head</th>
                <th>Table Head</th>
                <th>Table Head</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Data 1-1</td>
                <td>Data 1-2</td>
                <td>Data 1-3</td>
                <td>
                    <input type="checkbox" name="vote">
                </td>
            </tr>
            <tr>
                <td>Data 2-1</td>
                <td>Data 2-2</td>
                <td>Data 2-3</td>
                <td>
                    <input type="checkbox" name="vote">
                </td>
            </tr>
            <tr>
                <td>Data 3-1</td>
                <td>Data 3-2</td>
                <td>Data 3-3</td>
                <td>
                    <input type="checkbox" name="vote">
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>