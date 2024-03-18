<?php
require('model/database.php');
require('model/vehicle_db.php');
require('model/make_db.php');
require('model/type_db.php');
require('model/class_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action === NULL) {
        $action = 'list_vehicles';  // default action
    }
}

switch ($action) {
    case 'list_vehicles':
        try {
            $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
            $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
            $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
            $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
            $vehicles = get_vehicles($make_id, $type_id, $class_id, $sort);
            $makes = get_makes();
            $types = get_types();
            $classes = get_classes();
            include('view/vehicle_list.php');
        } catch (Exception $e) {
            $error = "Error: " . $e->getMessage();
            include('view/error.php');
        }
        break;
}

?>
