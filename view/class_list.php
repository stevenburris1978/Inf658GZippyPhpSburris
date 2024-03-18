<?php 

include '../model/class_db.php';
$classes = get_classes();

include 'headerTwo.php'; ?>

<h2 style="padding-left: 10%">Vehicle Classes</h2>

<div style="overflow-x: auto; margin: auto; padding: 1rem; padding-left: 10%;">
    <table style="min-width: 15rem; border: 1px solid blue; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid blue;">Class</th>
                <th style="border: 1px solid blue;"></th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classes as $class) : ?>
                <tr>
                    <td style="border: 1px solid blue;"><?= htmlspecialchars($class['Class']); ?></td>
                    <td style="border: 1px solid blue;">
                        <!-- Form for removing class -->
                        <form action="../admin_controller.php" method="post" style="margin: 0;">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="class_id" value="<?= $class['class_ID']; ?>">
                            <input type="submit" value="Remove" style="height: 1.5rem; padding: 0; width: 4rem;">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<form action="../admin_controller.php" method="post" style="padding-left: 10%;">
    <input type="hidden" name="action" value="add_class">
    <input type="text" name="class_name" placeholder="Enter New Class" required>
    <input type="submit" value="Add Class">
</form>

<div style="padding-left: 10%; margin-top: 2rem;">

    <a href="add_vehicle_form.php" style="text-decoration: none; color:black; display: block; height: 20px; width: 10rem; text-align: center;">Add Vehicle</a><br>
    <a href="make_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Makes</a><br>
    <a href="type_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Types</a><br>
    <a href="../admin" style="text-decoration: none; color: black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">Back To Admin</a>
</div>

<?php include 'footer.php'; ?>
