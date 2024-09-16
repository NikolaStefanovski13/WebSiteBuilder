<?php
// config.php
$db_host = 'localhost';
$db_name = 'dynamic_website_builder';
$db_user = 'root';
$db_pass = '';

try {
    $pdo = new PDO("mysql:host=$db_host", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name`");

    $pdo->exec("USE `$db_name`");

    echo "Connected successfully and database created/selected";
} catch (PDOException $e) {
    die("ERROR: Could not connect or create database. " . $e->getMessage());
}


$sql = "CREATE TABLE IF NOT EXISTS websites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cover_image_url VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    subtitle VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    location VARCHAR(255) NOT NULL,
    type ENUM('services', 'products') NOT NULL,
    item1_url VARCHAR(255) NOT NULL,
    item1_description TEXT NOT NULL,
    item2_url VARCHAR(255) NOT NULL,
    item2_description TEXT NOT NULL,
    item3_url VARCHAR(255) NOT NULL,
    item3_description TEXT NOT NULL,
    contact_description TEXT NOT NULL,
    linkedin VARCHAR(255) NOT NULL,
    facebook VARCHAR(255) NOT NULL,
    twitter VARCHAR(255) NOT NULL,
    instagram VARCHAR(255) NOT NULL
)";

$pdo->exec($sql);

echo "Database and table setup complete";
