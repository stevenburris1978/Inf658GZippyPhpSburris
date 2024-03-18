<?php 

include '../model/type_db.php';
$types = get_types();

include 'headerTwo.php'; ?>

<h2 style="padding-left: 10%">Vehicle Types</h2>

<div style="overflow-x: auto; margin: auto; padding: 1rem; padding-left: 10%;">
    <table style="min-width: 15rem; border: 1px solid blue; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid blue;">Type</th>
                <th style="border: 1px solid blue;"></th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($types as $type) : ?>
                <tr>
                    <td style="border: 1px solid blue;"><?= htmlspecialchars($type['Type']); ?></td>
                    <td style="border: 1px solid blue;">
                        <!-- Form for removing type -->
                        <form action="../admin_controller.php" method="post" style="margin: 0;">
                            <input type="hidden" name="action" value="delete_type">
                            <input type="hidden" name="type_id" value="<?= $type['type_ID']; ?>">
                            <input type="submit" value="Remove" style="height: 1.5rem; padding: 0; width: 4rem;">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<form action="../admin_controller.php" method="post" style="padding-left: 10%;">
    <input type="hidden" name="action" value="add_type">
    <input type="text" name="type_name" placeholder="Enter New Type" required>
    <input type="submit" value="Add Type">
</form>

<div style="padding-left: 10%; margin-top: 2rem;">

    <a href="add_vehicle_form.php" style="text-decoration: none; color:black; display: block; height: 20px; width: 10rem; text-align: center;">Add Vehicle</a><br>
    <a href="make_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Makes</a><br>
    <a href="class_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Classes</a><br>
    <a href="../admin" style="text-decoration: none; color: black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">Back To Admin</a>
</div>

<?php include 'footer.php'; ?>
