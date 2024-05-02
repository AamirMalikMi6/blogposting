<?php
include('Database.php');
include('Blog.php');

$db = new Database();
$blog = new Blog($db);

$blogs = $blog->getAllBlogs();
include('header.php');
include('views/dashboard.view.php');

include('footer.php');
