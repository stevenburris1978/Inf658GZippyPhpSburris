<?php
require_once('database.php');
function get_classes() {
    global $db;
    $query = 'SELECT * FROM class ORDER BY Class';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function get_class_name($class_id) {
    global $db;
    $query = 'SELECT * FROM class WHERE class_ID = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $class = $statement->fetch();
    $statement->closeCursor();
    return $class['Class'];
}

function delete_class($class_id) {
    global $db;
    $query = 'DELETE FROM class WHERE class_ID = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($class_name) {
    global $db;
    $query = 'INSERT INTO class (Class) VALUES (:class_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_name', $class_name);
    $statement->execute();
    $statement->closeCursor();
}

?>
