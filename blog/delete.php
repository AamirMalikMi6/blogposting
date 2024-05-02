<?php 
include('../Database.php'); 
include('../Blog.php');

$db = new Database();
$blog = new Blog($db);

$id = $_GET['id'];
if ($blog->deleteBlog($id)) {
    header("Location: ../dashboard.php"); // Redirect to home page
    exit;
} else {
    echo "Error: Unable to delete blog.";
}
?>
