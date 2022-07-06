<?php 

session_start();
unset($_SESSION["lastpage"]);
unset($_SESSION['errors']);
session_destroy();
return header("Location:http://localhost/news-project/news-website-templates/index.php");
