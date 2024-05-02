<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

include('Database.php');
include('Blog.php');

$db = new Database();
$blog = new Blog($db);

if(isset($_GET['view'])) {
    $id = $_GET['view'];
    $blog->trackView($id);
}

$blogs = $blog->getAllBlogs();
include('header.php');

include('views/dashboard.view.php');

?>


<?php include('footer.php'); ?>
