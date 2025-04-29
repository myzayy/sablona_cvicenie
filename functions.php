<?php
include 'config.php';  // connect to db

// Create new user
function createUser($name, $email, $password) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    if ($stmt->rowCount() > 0) {
        return 'User with this mail is currently exist.';
    }

    // password hash
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword]);
    return 'User was added succesfully!';
}

// Read all users
function getAllUsers() {
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM users');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Read one user by id
function getUserById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Update user
function updateUser($id, $name, $email, $password = null) {
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $stmt->execute(['id' => $id]);
    if ($stmt->rowCount() == 0) {
        return 'User not found.';
    }

    $sql = 'UPDATE users SET name = :name, email = :email';
    
    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql .= ', password = :password';
    }
    
    $sql .= ' WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    
    if ($password) {
        $stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashedPassword, 'id' => $id]);
    } else {
        $stmt->execute(['name' => $name, 'email' => $email, 'id' => $id]);
    }

    return 'Information of this user was succesfully updated!';
}

// Delete user
function deleteUser($id) {
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $stmt->execute(['id' => $id]);
    if ($stmt->rowCount() == 0) {
        return 'User not found.';
    }

    $stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
    $stmt->execute(['id' => $id]);

    return 'User was deleted!';
}
?>
