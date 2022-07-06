<?php 
include '../class/categoryDB.php';

try{
categoryDB::GetCategoryDB()->DeleteCategory($_GET['name']);
}catch(PDOException $e)
{
    return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/category-list.php");

}