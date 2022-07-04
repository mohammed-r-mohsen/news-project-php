<?php 
include '../class/AdminDB.php';

try{
    AdminDB::GetAdminDB()->DeleteAdmin($_GET['name']);
}catch(PDOException $e)
{
    return header("Location:http://localhost/news-project/news-project/sufee-admin-dashboard-master/admin-list.php");

}