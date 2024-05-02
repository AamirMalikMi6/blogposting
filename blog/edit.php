<?php 
include('../Database.php'); 
include('../Blog.php');

$db = new Database();
$blog = new Blog($db);
$row = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    // Check if image file is uploaded
    if(isset($_FILES['image'])){
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($file_tmp,"../images/".$file_name);
    }
    if ($blog->editBlog($id, $title, $description, $file_name)) {
        header("Location: ../index.php"); // Redirect to home page
        exit;
    } else {
        echo "Error: Unable to edit blog.";
    }
} else {
    $id = $_GET['id'];
    $row = $blog->getBlog($id);
}
include('../header.php');
?>
<h1>Edit Blog</h1>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Title:</label><br>
    <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br><br>
    <label>Description:</label><br>
    <textarea name="description" required><?php echo $row['description']; ?></textarea><br><br>
    <label>Current Image:</label><br>
    <img src="../images/<?php echo $row['image']; ?>" alt=""><br><br>
    <label>New Image:</label><br>
    <input type="file" name="image"><br><br>
    <input type="submit" value="Update">
</form>
<?php include('../footer.php'); ?>
