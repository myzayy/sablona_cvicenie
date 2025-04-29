<?php
include 'functions.php';

// Creating new user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_user'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo createUser($name, $email, $password);
}

// get all users
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['get_all_users'])) {
    $users = getAllUsers();
    echo json_encode($users);
}

// Status update
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'] ?? null;
    echo updateUser($id, $name, $email, $password);
}

// deleting user
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_user'])) {
    $id = $_POST['id'];
    echo deleteUser($id);
}
?>
