<?php
class WebsiteBuilder
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createWebsite($data)
    {
        $sql = "INSERT INTO websites (cover_image_url, title, subtitle, description, telephone, location, type, item1_url, item1_description, item2_url, item2_description, item3_url, item3_description, contact_description, linkedin, facebook, twitter, instagram) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array_values($data));
        return $this->pdo->lastInsertId();
    }

    public function getWebsite($id)
    {
        $sql = "SELECT * FROM websites WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
