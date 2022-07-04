<?php 

session_start();
unset($_SESSION["lastpage"]);
session_destroy();
return header("Location:http://localhost/news-project/news-project/login-form-v3/Login_v3/index.php");
