<?php 
include('../Database.php'); 
include('../Blog.php');

$db = new Database();
$blog = new Blog($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    // Check if image file is uploaded
    if(isset($_FILES['image'])){
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"../images/".$file_name);
    }
    if ($blog->addBlog($title, $description, $file_name)) {
        header("Location: ../index.php"); // Redirect to home page
        exit;
    } else {
        echo "Error: Unable to add blog.";
    }
}
include('../header.php');
?>
    <h1>Add New Blog</h1>
    <form method="post" enctype="multipart/form-data">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>
        <label>Image:</label><br>
        <input type="file" name="image" required><br><br>
        <input type="submit" value="Submit">
    </form>
<?php include('../footer.php'); ?>
