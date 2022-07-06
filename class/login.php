<?php 
include '../class/AdminDB.php';

class login 
{
  private static $isActive = false; 

 static function setisActive($isActive) 
 {
    self::$isActive = $isActive ; 
 }

 static function getIsActive()
 {
   return !self::$isActive;
 }

    public static function loginMethod($username , $password)
    {
       $row =  AdminDB::GetAdminDB()->GetAdminData();

      foreach ($row as $item) 
    {
           
            
             $verfiy = password_verify($password, $item['password'] );
          

          if(($item['username'] == $username) && $verfiy)
           {
              self::setisActive(true); 
            return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/Home.php");
           
          }
        
    }
    return header("Location:http://localhost/news-project/login-form-v3/Login_v3/index.php");

    }
}
