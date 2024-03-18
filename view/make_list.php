<?php 

include '../model/make_db.php';
$makes = get_makes();

include 'headerTwo.php'; ?>

<h2 style="padding-left: 10%">Vehicle Makes</h2>

<div style="overflow-x: auto; margin: auto; padding: 1rem; padding-left: 10%;">
    <table style="min-width: 15rem; border: 1px solid blue; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid blue;">Make</th>
                <th style="border: 1px solid blue;"></th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($makes as $make) : ?>
                <tr>
                    <td style="border: 1px solid blue;"><?= htmlspecialchars($make['Make']); ?></td>
                    <td style="border: 1px solid blue;">
                        <!-- Form for removing make -->
                        <form action="../admin_controller.php" method="post" style="margin: 0;">
                            <input type="hidden" name="action" value="delete_make">
                            <input type="hidden" name="make_id" value="<?= $make['make_ID']; ?>">
                            <input type="submit" value="Remove" style="height: 1.5rem; padding: 0; width: 4rem;">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<form action="../admin_controller.php" method="post" style="padding-left: 10%;">
    <input type="hidden" name="action" value="add_make">
    <input type="text" name="make_name" placeholder="Enter New Make" required>
    <input type="submit" value="Add Make">
</form>

<?php include 'footerAdmin.php'; ?>
