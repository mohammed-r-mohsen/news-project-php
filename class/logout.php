<?php 

session_start();
unset($_SESSION["lastpage"]);
session_destroy();
return header("Location:http://localhost/news-project/news-website-templates/index.php");
