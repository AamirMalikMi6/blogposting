<?php
class Blog {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllBlogs() {
        $query = "SELECT * FROM blogs";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBlog($title, $description, $image) {
        session_start();
        if (!isset($_SESSION['user'])) {
            return false; // User not authorized
        }

        $query = "INSERT INTO blogs (title, description, image) VALUES (:title, :description, :image)";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':image', $image);
        return $stmt->execute();
    }

    public function editBlog($id, $title, $description, $image) {
        session_start();
        if (!isset($_SESSION['user'])) {
            return false; // User not authorized
        }
    
        $query = "UPDATE blogs SET title=:title, description=:description";
        if ($image !== "") {
            $query .= ", image=:image";
        }
        $query .= " WHERE id=:id";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        if ($image !== "") { // Conditionally bind image parameter
            $stmt->bindParam(':image', $image);
        }
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
    

    public function deleteBlog($id) {
        session_start();
        if (!isset($_SESSION['user'])) {
            return false; // User not authorized
        }

        $query = "DELETE FROM blogs WHERE id=:id";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getBlog($id) {
        $query = "SELECT * FROM blogs WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function trackView($id) {
        $query = "UPDATE blogs SET views = views + 1 WHERE id = :id";
        $stmt = $this->db->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }    
    
}
