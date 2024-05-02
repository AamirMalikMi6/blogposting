<?php
session_start();
include('Database.php');
include('Blog.php');

$db = new Database();
$blog = new Blog($db);

// Check if blog ID is provided in the URL
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // Increment views for the blog
    $blog->trackView($id);
    // Retrieve the blog details
    $blogDetails = $blog->getBlog($id);
    include('header.php');
?>
    <h1><?php echo htmlspecialchars($blogDetails['title']); ?></h1>
    <p>Views: <?php echo $blogDetails['views']; ?></p>
    <img src='images/<?php echo htmlspecialchars($blogDetails['image']); ?>' alt=''>
    <p><?php echo htmlspecialchars($blogDetails['description']); ?></p>
<?php
    include('footer.php');
} else {
    // Redirect if blog ID is not provided
    header("Location: dashboard.php");
    exit;
}
?>
