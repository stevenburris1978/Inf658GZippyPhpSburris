<?php
require_once('database.php');
function get_makes() {
    global $db;
    $query = 'SELECT * FROM make ORDER BY Make';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_make_name($make_id) {
    global $db;
    $query = 'SELECT * FROM make WHERE make_ID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    return $make['Make'];
}

function delete_make($make_id) {
    global $db;
    $query = 'DELETE FROM make WHERE make_ID = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make_name) {
    global $db;
    $query = 'INSERT INTO make (Make) VALUES (:make_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_name', $make_name);
    $statement->execute();
    $statement->closeCursor();
}

?>
