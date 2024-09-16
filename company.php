<?php
require_once 'config.php';
require_once 'WebsiteBuilder.php';

if (!isset($_GET['id'])) {
    die("No website ID provided");
}

$builder = new WebsiteBuilder($pdo);
$website = $builder->getWebsite($_GET['id']);

if (!$website) {
    die("Website not found");
}

function isImageUrlValid($url)
{
    $headers = @get_headers($url);
    return $headers && strpos($headers[0], '200') !== false;
}

function getImageUrl($url)
{
    return isImageUrlValid($url) ? $url : 'https://via.placeholder.com/300x200?text=Image+Not+Found';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($website['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#<?php echo $website['type']; ?>"><?php echo ucfirst($website['type']); ?></a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <section id="home" style="background-image: url('<?php echo getImageUrl($website['cover_image_url']); ?>');">
        <h1><?php echo htmlspecialchars($website['title']); ?></h1>
        <h2><?php echo htmlspecialchars($website['subtitle']); ?></h2>
    </section>

    <section id="about">
        <h2>About Us</h2>
        <p><?php echo htmlspecialchars($website['description']); ?></p>
        <p>Phone: <?php echo htmlspecialchars($website['telephone']); ?></p>
        <p>Location: <?php echo htmlspecialchars($website['location']); ?></p>
    </section>

    <section id="<?php echo $website['type']; ?>">
        <h2>Our <?php echo ucfirst($website['type']); ?></h2>
        <div class="items">
            <div class="item">
                <img src="<?php echo getImageUrl($website['item1_url']); ?>" alt="Item 1">
                <p><?php echo htmlspecialchars($website['item1_description']); ?></p>
            </div>
            <div class="item">
                <img src="<?php echo getImageUrl($website['item2_url']); ?>" alt="Item 2">
                <p><?php echo htmlspecialchars($website['item2_description']); ?></p>
            </div>
            <div class="item">
                <img src="<?php echo getImageUrl($website['item3_url']); ?>" alt="Item 3">
                <p><?php echo htmlspecialchars($website['item3_description']); ?></p>
            </div>
        </div>
    </section>

    <section id="contact">
        <h2>Contact Us</h2>
        <p><?php echo htmlspecialchars($website['contact_description']); ?></p>
        <form>
            <input type="text" placeholder="Name" required>
            <input type="email" placeholder="Email" required>
            <textarea placeholder="Message" required></textarea>
            <button type="submit">Send</button>
        </form>
    </section>

    <footer>
        <a href="<?php echo htmlspecialchars($website['linkedin']); ?>" target="_blank">LinkedIn</a>
        <a href="<?php echo htmlspecialchars($website['facebook']); ?>" target="_blank">Facebook</a>
        <a href="<?php echo htmlspecialchars($website['twitter']); ?>" target="_blank">Twitter</a>
        <a href="<?php echo htmlspecialchars($website['instagram']); ?>" target="_blank">Instagram</a>
    </footer>

    <script>
    </script>
</body>

</html>