<?php
// form.php
require_once 'config.php';
require_once 'WebsiteBuilder.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $builder = new WebsiteBuilder($pdo);
    $id = $builder->createWebsite($_POST);
    header("Location: company.php?id=$id");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Builder Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>You are one step away from your webpage</h1>
        <form action="form.php" method="post">
            <input type="url" name="cover_image_url" required placeholder="Cover Image URL">
            <input type="text" name="title" required placeholder="Page Title">
            <input type="text" name="subtitle" required placeholder="Page Subtitle">
            <textarea name="description" required placeholder="Company Description"></textarea>
            <input type="tel" name="telephone" required placeholder="Telephone Number">
            <input type="text" name="location" required placeholder="Location">
            <select name="type" required>
                <option value="services">Services</option>
                <option value="products">Products</option>
            </select>
            <input type="url" name="item1_url" required placeholder="Item 1 URL">
            <textarea name="item1_description" required placeholder="Item 1 Description"></textarea>
            <input type="url" name="item2_url" required placeholder="Item 2 URL">
            <textarea name="item2_description" required placeholder="Item 2 Description"></textarea>
            <input type="url" name="item3_url" required placeholder="Item 3 URL">
            <textarea name="item3_description" required placeholder="Item 3 Description"></textarea>
            <textarea name="contact_description" required placeholder="Contact Form Description"></textarea>
            <input type="url" name="linkedin" required placeholder="LinkedIn URL">
            <input type="url" name="facebook" required placeholder="Facebook URL">
            <input type="url" name="twitter" required placeholder="Twitter URL">
            <input type="url" name="instagram" required placeholder="Instagram URL">
            <button type="submit">Create Website</button>
        </form>
    </div>
</body>

</html>