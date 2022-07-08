<?PHP 
include 'DataBase.php';
class AdminDB 

{
    private static $ADMINDB = null ;  
    private $TableName = "admin";
    
   public static function GetAdminDB()
   {
       if(self::$ADMINDB ==null)
       {
           self::$ADMINDB = new AdminDB();
       }
       return self::$ADMINDB;
   }



    public function setTable(string  $table)
    {
        $this->TableName = $table;
    }
    
    public function getTable()
    {
        return $this->TableName;
    }


     public function CreateAdmin(Admin $admin)
     {
        $AdminName=$admin->getname();
        $AdminEmail= $admin->getemail();
        $Password=$admin->getpassssword();
        $AdminPassword = password_hash($Password , PASSWORD_DEFAULT);
        
        
        try {
             DataBase::getDBoperation()->connect();
            
            $dbsql='USE '.DataBase::getDBoperation()->getdbName();
            $sql = "INSERT INTO admin (username,email,password,numOfNews,isActive) VALUES ('$AdminName','$AdminEmail','$AdminPassword',0,1);";
    
            DataBase::getDBoperation()->GetConn()->exec($dbsql);
            DataBase::getDBoperation()->GetConn()->exec($sql);
            
            
            
            return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/admin-list.php");
            
            DataBase::getDBoperation()->disconnect();
        } catch (PDOException $th) {
            return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/add-admin.php");

        }
     }
   
     public function DeleteAdmin($adminname )
     {
         try {
             DataBase::getDBoperation()->connect();
             $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
             
             $sql = "DELETE FROM admin WHERE admin.username ='$adminname';";
             
             DataBase::getDBoperation()->GetConn()->exec($dbsql);
             DataBase::getDBoperation()->GetConn()->exec($sql);
             
              
              DataBase::getDBoperation()->disconnect();
              return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/admin-list.php");

         
         
            } catch (PDOException $TH) {
                return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/admin-list.php");

         }
     }
    
 
     public function GetRowData($adminName)
     {
        try {
            DataBase::getDBoperation()->connect();

            $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
            $sql = "SELECT * FROM admin WHERE username = '$adminName'";
            DataBase::getDBoperation()->GetConn()->exec($dbsql);
            $result =  DataBase::getDBoperation()->GetConn()->prepare($sql);
            $result->execute();
            $DATA =[];
            if($result)
            {
                $admin = $result->fetchAll();
                
            }
            return $admin ;    
           
             
        } catch (PDOException $th) {
            return "cannot get the data causse $th" ; 
        }
     }
 
     public function UpdateAdmin($adminName , Admin $admin)
     {
         $username = $admin->getName();
         $email = $admin->getemail();
         $password = $admin->getpassssword();
         $AdminPassword = password_hash($password , PASSWORD_DEFAULT);
        try {
            DataBase::getDBoperation()->connect();
            $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
            $sql = "UPDATE `admin` SET `username` ='$username', `email` = '$email', `password` = '$AdminPassword' WHERE `admin`.`username` = '$adminName';";
            DataBase::getDBoperation()->GetConn()->exec($dbsql);
            DataBase::getDBoperation()->GetConn()->exec($sql);
            
             return 'update record ';
             DataBase::getDBoperation()->disconnect();
           } catch (PDOException $TH) {
            return $TH->getMessage();
        }
        
     }
      
   
      public function GetAdminData()
      {
          try {
              DataBase::getDBoperation()->connect();

              $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
              $sql = "SELECT * FROM admin;";
              DataBase::getDBoperation()->GetConn()->exec($dbsql);
              $result =  DataBase::getDBoperation()->GetConn()->prepare($sql);
              $result->execute();
              $DATA =[];
              if($result)
              {
                  $admin = $result->fetchAll();
                  
              }
              return $admin ;    
             
               
          } catch (PDOException $th) {
              return "cannot get the data causse $th" ; 
          }
      }

 
    



}
