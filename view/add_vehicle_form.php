<?php 

require('../model/database.php');
require('../model/make_db.php');
require('../model/type_db.php');
require('../model/class_db.php');

$makes = get_makes();
$types = get_types();
$classes = get_classes();

include 'headerTwo.php'; ?>

<div style="padding-left: 10%">
    <h2>Add New Vehicle</h2>

    <form action="../admin_controller.php" method="post">
        <input type="hidden" name="action" value="add_vehicle">

        <label for="make_id"></label>
        <select name="make_id" id="make_id">
            <option value="">Select Make</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?= $make['make_ID']; ?>"><?= htmlspecialchars($make['Make']); ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="type_id"></label>
        <select name="type_id" id="type_id">
            <option value="">Select Type</option>
            <?php foreach ($types as $type) : ?>
                <option value="<?= $type['type_ID']; ?>"><?= htmlspecialchars($type['Type']); ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="class_id"></label>
        <select name="class_id" id="class_id">
            <option value="">Select Class</option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?= $class['class_ID']; ?>"><?= htmlspecialchars($class['Class']); ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="year">Year:</label>
        <input type="text" placeholder="Please input the year" name="year" id="year"><br>

        <label for="model">Model:</label>
        <input type="text" placeholder="Please input the model" name="model" id="model"><br>

        <label for="price">Price:</label>
        <input type="text" placeholder="Please input the price"  name="price" id="price"><br>

        <input type="submit" value="Add Vehicle">
    </form>

</div>

<?php include 'footerAdmin.php'; ?>
