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
       $_SESSION['LoginStatues'] = 'error login please try again ' ;
       foreach ($row as $item) 
    {
           
      
             $verfiypassword = password_verify($password, $item['password'] );
             $verfiyusername = strcmp($item['username'] , $username)==0 ;
             
          if($verfiyusername && $verfiypassword) :  
              self::setisActive(true); 
              $_SESSION['LoginStatues'] = "welcome $username ";
            return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/Home.php");
          endif;
        
    }
    return header("Location:http://localhost/news-project/login-form-v3/Login_v3/index.php");

    }
}
