<?php include 'view/header.php'; ?>

<h3 style=" padding-left: 10%">Select Vehicles:</h3>

<!-- Dropdown Filters -->
<form action="." method="get" style="padding-left: 10%">
    <input type="hidden" name="action" value="list_vehicles">

    <!-- Make Dropdown -->
    <select name="make_id">
        <option value="">View All Makes</option>
        <?php foreach ($makes as $make) : ?>
            <option value="<?= $make['make_ID']; ?>"
                <?= ($make_id == $make['make_ID']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($make['Make']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- Type Dropdown -->
    <select name="type_id">
        <option value="">View All Types</option>
        <?php foreach ($types as $type) : ?>
            <option value="<?= $type['type_ID']; ?>"
                <?= ($type_id == $type['type_ID']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($type['Type']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- Class Dropdown -->
    <select name="class_id">
        <option value="">View All Classes</option>
        <?php foreach ($classes as $class) : ?>
            <option value="<?= $class['class_ID']; ?>"
                <?= ($class_id == $class['class_ID']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($class['Class']); ?>
            </option>
        <?php endforeach; ?>
    </select><br>

        <!-- Sort Dropdown -->
    <select name="sort">
        <option value="">Sort By</option>
        <option value="year" <?= (isset($_GET['sort']) && $_GET['sort'] == 'year') ? 'selected' : ''; ?>>Sort by: Year</option>
        <option value="price" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price') ? 'selected' : ''; ?>>Sort by: Price</option>
    </select><br>

    <input type="submit" value="Submit">
</form>

<!-- Vehicles Table -->
<div style="overflow-x: auto; width: 80%; margin: auto; padding: 1rem; max-height: 8rem;">
    <table style="min-width: 50rem; border: 1px solid blue; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid blue;">Year</th>
                <th style="border: 1px solid blue;">Make</th>
                <th style="border: 1px solid blue;">Model</th>
                <th style="border: 1px solid blue;">Type</th>
                <th style="border: 1px solid blue;">Class</th>
                <th style="border: 1px solid blue;">Price</th>
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
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php include 'view/footer.php'; ?>

