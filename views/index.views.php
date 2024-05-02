<a href="dashboard.php">Dashboard</a>
    <h1>Blog List</h1>
    <?php
foreach ($blogs as $row) {
    echo "<div class='row'>";
    echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
    echo "<img src='images/" . htmlspecialchars($row['image']) . "' alt=''>";
    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
    echo "</div>";
}
    ?>