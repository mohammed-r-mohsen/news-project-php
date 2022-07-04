<?php
include './AdminDB.php'; 
include './Admin.php';
if(isset($_POST['AdminUpdate']))
{
    try {
        $admin = new Admin($_POST['username'] , $_POST['email'] , $_POST['password']);
        AdminDB::GetAdminDB()->UpdateAdmin($_GET['name'] , $admin);
      return header("Location:http://localhost/news-project/news-project/sufee-admin-dashboard-master/admin-list.php");

       
    } catch (Throwable $e) {
      
       // echo $e->getMessage();
        return header("Location:http://localhost/news-project/news-project/sufee-admin-dashboard-master/admin-list.php");

        
    }
}