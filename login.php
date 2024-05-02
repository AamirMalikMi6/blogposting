<?php
session_start();

if(isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}

include('Database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $conn = $db->getConnection();
    
    $query = "SELECT * FROM loginuser WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $_SESSION['user'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}

include('header.php');
?>
<a href="index.php">Home</a>
<h1>Login</h1>
<form method="post">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>
<?php if(isset($error)) echo "<p>$error</p>"; ?>
<?php include('footer.php'); ?>
