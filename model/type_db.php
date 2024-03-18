<?php
require_once('database.php');
function get_types() {
    global $db;
    $query = 'SELECT * FROM type ORDER BY Type';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function get_type_name($type_id) {
    global $db;
    $query = 'SELECT * FROM type WHERE type_ID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $type = $statement->fetch();
    $statement->closeCursor();
    return $type['Type'];
}

function delete_type($type_id) {
    global $db;
    $query = 'DELETE FROM type WHERE type_ID = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($type_name) {
    global $db;
    $query = 'INSERT INTO type (Type) VALUES (:type_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_name', $type_name);
    $statement->execute();
    $statement->closeCursor();
}
?>
