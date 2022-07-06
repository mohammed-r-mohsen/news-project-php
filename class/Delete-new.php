<?php 
include '../class/NewsDB.php';

try{
    NewsDB::GetnewsDB()->Deletenews($_GET['name']);

}catch(PDOException $e)
{
    return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/category-list.php");

}