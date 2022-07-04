<?php
include './news.php'; 
include './NewsDB.php';
if(isset($_POST['updatenew']))
{
    try {
      $new = new news($_POST['title'] , $_POST['textarea-input'] , $_POST['category'] , $_POST['img']);
      NewsDB::GetnewsDB()->UpdateNew($_GET['title'] , $new);
      return header("Location:http://localhost/news-project/news-project/sufee-admin-dashboard-master/news-list.php");

       
    } catch (Throwable $e) {
      
       // echo $e->getMessage();
        return header("Location:http://localhost/news-project/news-project/sufee-admin-dashboard-master/news-list.php");

        
    }
}