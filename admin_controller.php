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
        $action = 'list_vehicles';
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
            include('view/admin.php');
        } catch (Exception $e) {
            $error = "Error: " . $e’s->getMessage();
            include('view/errorAdmin.php');
        }
        break;

    default:
        $error = "Unknown admin action: " . $action;
        include('view/errorAdmin.php');
        break;

    case 'delete_vehicle':
        $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
        if ($vehicle_id) {
            delete_vehicle($vehicle_id);
        }
        header("Location: admin_controller.php?action=list_vehicles");
        break;

    case 'delete_make': 
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        if ($make_id) {
            delete_make($make_id); 
        }
        header("Location: view/make_list.php"); 
        break;

    case 'delete_type': 
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        if ($type_id) {
            delete_type($type_id); 
        }
        header("Location: view/type_list.php"); 
        break;

    case 'delete_class': 
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        if ($class_id) {
            delete_class($class_id); 
        }
        header("Location: view/class_list.php"); 
        break;

    case 'add_make':
        $make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
        if ($make_name) {
            add_make($make_name);
        }
        header("Location: view/make_list.php");
        break;

    case 'add_type':
        $type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
        if ($type_name) {
            add_type($type_name);
        }
        header("Location: view/type_list.php");
        break;

    case 'add_class':
        $class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);
        if ($class_name) {
            add_class($class_name);
        }
        header("Location: view/class_list.php");
        break;

    case 'add_vehicle':
        $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
        $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
        $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
        $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    
        if (!$make_id || !$type_id || !$class_id || !$year || !$model || !$price) {
            $error = "Please fill in all fields.";
            include('view/errorAdmin.php');
            exit();
        }
    
        $success = add_vehicle($make_id, $type_id, $class_id, $year, $model, $price);
    
        if ($success) {
            header("Location: admin");
            exit(); 
        } else {
            $error = "Failed to add the vehicle. Please try again.";
            include('view/errorAdmin.php');
            exit(); 
        }
        break;
    
}

?>
