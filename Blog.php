<?php
class Blog {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllBlogs() {
        $conn = $this->db->getConnection();
        $query = "SELECT * FROM blogs";
        $result = mysqli_query($conn, $query);
        $blogs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $blogs[] = $row;
        }
        return $blogs;
    }

    public function addBlog($title, $description, $image) {
        $conn = $this->db->getConnection();
        $query = "INSERT INTO blogs (title, description, image) VALUES ('$title', '$description', '$image')";
        if (mysqli_query($conn, $query)) {
            return true;
        } else {
            return false;
        }
    }

    public function editBlog($id, $title, $description, $image) {
        $conn = $this->db->getConnection();
        $query = "UPDATE blogs SET title='$title', description='$description'";
        if ($image !== "") {
            $query .= ", image='$image'";
        }
        $query .= " WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBlog($id) {
        $conn = $this->db->getConnection();
        $query = "DELETE FROM blogs WHERE id=$id";
        if (mysqli_query($conn, $query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getBlog($id) {
        $conn = $this->db->getConnection(); 
        $query = "SELECT * FROM blogs WHERE id = $id";
        $result = mysqli_query($conn, $query);
        return mysqli_fetch_assoc($result);
      }
}
