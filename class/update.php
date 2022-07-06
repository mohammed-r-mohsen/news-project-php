<?php
include './categoryDB.php'; 

if(isset($_POST['updatesubmit']))
{
    try {
        
      categoryDB::GetCategoryDB()->UpdateCategory($_GET['name'] , $_POST['UpdateCategory']);
      return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/category-list.php");

       
    } catch (Throwable $e) {
      
        return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/category-list.php");

        
    }
}