<?php
function get_vehicles($make_id = NULL, $type_id = NULL, $class_id = NULL, $sort = NULL) {
    global $db;
    $query = 'SELECT vehicles.*, make.Make, type.Type, class.Class 
              FROM vehicles 
              LEFT JOIN make ON vehicles.make_ID = make.make_ID 
              LEFT JOIN type ON vehicles.type_ID = type.type_ID 
              LEFT JOIN class ON vehicles.class_ID = class.class_ID';
    
    $whereClauses = [];
    if ($make_id != NULL) {
        $whereClauses[] = 'vehicles.make_ID = :make_id';
    }
    if ($type_id != NULL) {
        $whereClauses[] = 'vehicles.type_ID = :type_id';
    }
    if ($class_id != NULL) {
        $whereClauses[] = 'vehicles.class_ID = :class_id';
    }

    if (!empty($whereClauses)) {
        $query .= ' WHERE ' . implode(' AND ', $whereClauses);
    }

    if ($sort == 'year') {
        $query .= ' ORDER BY vehicles.Year DESC';
    } elseif ($sort == 'price') {
        $query .= ' ORDER BY vehicles.Price DESC';
    } else {
        $query .= ' ORDER BY Year DESC';
    }

    $statement = $db->prepare($query);

    if ($make_id != NULL) {
        $statement->bindValue(':make_id', $make_id);
    }
    if ($type_id != NULL) {
        $statement->bindValue(':type_id', $type_id);
    }
    if ($class_id != NULL) {
        $statement->bindValue(':class_id', $class_id);
    }

    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicle($vehicle_id) {
    global $db;
    $query = 'SELECT * FROM vehicles WHERE AutoNum = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $vehicle = $statement->fetch();
    $statement->closeCursor();
    return $vehicle;
}

function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles WHERE AutoNum = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($make_id, $type_id, $class_id, $year, $model, $price) {
    global $db;
    $query = "INSERT INTO vehicles (make_ID, type_ID, class_ID, Year, Model, Price)
              VALUES (:make_id, :type_id, :class_id, :year, :model, :price)";
    $statement = $db->prepare($query);
    $statement->bindParam(':make_id', $make_id);
    $statement->bindParam(':type_id', $type_id);
    $statement->bindParam(':class_id', $class_id);
    $statement->bindParam(':year', $year);
    $statement->bindParam(':model', $model);
    $statement->bindParam(':price', $price);
    $success = $statement->execute();
    $statement->closeCursor();
    return $success;
}


?>
