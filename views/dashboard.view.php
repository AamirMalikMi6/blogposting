<a href="index.php">Home</a>
<a href="logout.php">Logout</a>
<h1>Dashboard</h1>
<a href="blog/add.php">Add New Blog</a>
<h2>All Blogs</h2>
<ul>
    <?php foreach ($blogs as $row): ?>
        <li><?php echo htmlspecialchars($row['title']); ?> - <a href='blog/edit.php?id=<?php echo htmlspecialchars($row['id']); ?>'>Edit</a> | <a href='blog/delete.php?id=<?php echo htmlspecialchars($row['id']); ?>'>Delete</a></li>
    <?php endforeach; ?>
</ul>
