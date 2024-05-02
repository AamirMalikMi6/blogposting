<a href="dashboard.php">Dashboard</a>
<h1>Blog List</h1>
<?php foreach ($blogs as $row): ?>
    <div class='row'>
        <h2><?php echo htmlspecialchars($row['title']); ?></h2>
        <?php if (isset($row['views'])): ?>
            <p>Views: <?php echo $row['views']; ?></p>
        <?php else: ?>
            <p>Views: 0</p> <!-- Or any default value you prefer -->
        <?php endif; ?>
        <img src='images/<?php echo htmlspecialchars($row['image']); ?>' alt=''>
        <p><?php echo htmlspecialchars($row['description']); ?></p>
    </div>
<?php endforeach; ?>
