<a href="index.php">Home</a>
<h1>Dashboard</h1>
<a href="blog/add.php">Add New Blog</a>
<h2>All Blogs</h2>
<ul>
    <?php
    foreach ($blogs as $row) {
        echo "<li>" . htmlspecialchars($row['title']) . " - <a href='blog/edit.php?id=" . htmlspecialchars($row['id']) . "'>Edit</a> | <a href='blog/delete.php?id=" . htmlspecialchars($row['id']) . "'>Delete</a></li>";
    }

    ?>
</ul>