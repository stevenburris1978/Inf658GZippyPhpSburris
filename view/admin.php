<?php include 'view/headerThree.php'; ?>

<h3 style=" padding-left: 10%">Select Vehicles:</h3>

<!-- Dropdown Filters -->
<form action="admin" method="get" style="padding-left: 10%">
    <input type="hidden" name="action" value="list_vehicles">

    <!-- Make Dropdown -->
    <select name="make_id" style="width: 10rem; text-align: center;">
        <option value="">View All Makes</option>
        <?php foreach ($makes as $make) : ?>
            <option value="<?= $make['make_ID']; ?>"
                <?= ($make_id == $make['make_ID']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($make['Make']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- Type Dropdown -->
    <select name="type_id" style="width: 10rem; text-align: center; margin-top: .5rem;">
        <option value="">View All Types</option>
        <?php foreach ($types as $type) : ?>
            <option value="<?= $type['type_ID']; ?>"
                <?= ($type_id == $type['type_ID']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($type['Type']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- Class Dropdown -->
    <select name="class_id" style="width: 10rem; text-align: center; margin-top: .5rem;">
        <option value="">View All Classes</option>
        <?php foreach ($classes as $class) : ?>
            <option value="<?= $class['class_ID']; ?>"
                <?= ($class_id == $class['class_ID']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($class['Class']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- Sort Dropdown -->
    <select name="sort" style="width: 10rem; text-align: center; margin-top: .5rem;">
        <option value="">Sort By</option>
        <option value="year" <?= (isset($_GET['sort']) && $_GET['sort'] == 'year') ? 'selected' : ''; ?>>Sort by: Year</option>
        <option value="price" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price') ? 'selected' : ''; ?>>Sort by: Price</option>
    </select><br>

    <input type="submit" value="Submit" style="width: 10rem; text-align: center; margin-top: .5rem;">
</form>

<!-- Vehicles Table -->
<div style="overflow-x: auto; width: 80%; margin: auto; padding: 1rem; max-height: 8rem; margin-top: .5rem;">
    <table style="min-width: 50rem; border: 1px solid blue; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid blue;">Year</th>
                <th style="border: 1px solid blue;">Make</th>
                <th style="border: 1px solid blue;">Model</th>
                <th style="border: 1px solid blue;">Type</th>
                <th style="border: 1px solid blue;">Class</th>
                <th style="border: 1px solid blue;">Price</th>
                <th style="border: 1px solid blue;"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td style="border: 1px solid blue;"><?= htmlspecialchars($vehicle['Year']); ?></td>
                    <td style="border: 1px solid blue;"><?= htmlspecialchars($vehicle['Make']); ?></td>
                    <td style="border: 1px solid blue;"><?= htmlspecialchars($vehicle['Model']); ?></td>
                    <td style="border: 1px solid blue;"><?= htmlspecialchars($vehicle['Type']); ?></td>
                    <td style="border: 1px solid blue;"><?= htmlspecialchars($vehicle['Class']); ?></td>
                    <td style="border: 1px solid blue;">$<?= number_format($vehicle['Price']); ?></td>
                    <td style="border: 1px solid blue;">
                        <form action="admin_controller.php" method="post" style="margin: 0;">
                            <input type="hidden" name="action" value="delete_vehicle">
                            <input type="hidden" name="vehicle_id" value="<?= $vehicle['AutoNum']; ?>">
                            <input type="submit" value="Remove" style="height: 1.5rem; padding: 0; width: 4rem;">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div style="padding-left: 10%; margin-top: 2rem;">
    <a href="view/add_vehicle_form.php" style="text-decoration: none; color:black; display: block; height: 20px; width: 10rem; text-align: center;">Add Vehicle</a><br>
    <a href="view/make_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Makes</a><br>
    <a href="view/type_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Types</a><br>
    <a href="view/class_list.php" style="text-decoration: none; color:black; display: block; width: 10rem; height: 20px; text-align: center; margin-top: -.75rem;">View/Edit Classes</a>
</div>
<?php include 'view/footer.php'; ?>
