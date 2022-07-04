<?PHP 
include 'DataBase.php';
class categoryDB 

{
    private static $categoryDB = null ;  
    private $TableName = "category";
    
   public static function GetCategoryDB()
   {
       if(self::$categoryDB ==null)
       {
           self::$categoryDB = new categoryDB();
       }
       return self::$categoryDB;
   }



    public function setTable(string  $table)
    {
        $this->TableName = $table;
    }
    
    public function getTable()
    {
        return $this->TableName;
    }
     public function CreateCategory(category $category)
     {
        $CategoryName=$category->getname();
        
        try {
             DataBase::getDBoperation()->connect();
            
            $dbsql='USE '.DataBase::getDBoperation()->getdbName();
            $sql = "INSERT INTO category (name,numOfNews,isActive) VALUES ('$CategoryName',0,1);";
    
            DataBase::getDBoperation()->GetConn()->exec($dbsql);
            DataBase::getDBoperation()->GetConn()->exec($sql);
            
             return header("Location:http://localhost/news-project/news-project/sufee-admin-dashboard-master/category-list.php");
             DataBase::getDBoperation()->disconnect();
        } catch (PDOException $th) {
            return header("Location:http://localhost/news-project/news-project/sufee-admin-dashboard-master/category-list.php");

        }
     }
   
     public function DeleteCategory($CategoryName )
     {
         try {
             DataBase::getDBoperation()->connect();
             $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
             
             $sql = "DELETE FROM category WHERE category.name ='$CategoryName';";
             
             DataBase::getDBoperation()->GetConn()->exec($dbsql);
             DataBase::getDBoperation()->GetConn()->exec($sql);
             
              
              DataBase::getDBoperation()->disconnect();
              return header("Location:http://localhost/news-project/news-project/sufee-admin-dashboard-master/category-list.php");

         
         
            } catch (PDOException $TH) {
                return header("Location:http://localhost/news-project/news-project/sufee-admin-dashboard-master/category-list.php");

         }
     }
    
 
     public function GetRowData($CategoryName)
     {
        try {
            DataBase::getDBoperation()->connect();

            $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
            $sql = "SELECT * FROM category WHERE name = '$CategoryName'";
            DataBase::getDBoperation()->GetConn()->exec($dbsql);
            $result =  DataBase::getDBoperation()->GetConn()->prepare($sql);
            $result->execute();
            $DATA =[];
            if($result)
            {
                $category = $result->fetchAll();
                
            }
            return $category ;    
           
             
        } catch (PDOException $th) {
            return "cannot get the data causse $th" ; 
        }
     }
 
     public function UpdateCategory($CategoryName , $update)
     {
        try {
            DataBase::getDBoperation()->connect();
            $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
            $sql = "UPDATE `category` SET `name` ='$update' WHERE `category`.`name` = '$CategoryName';";
            DataBase::getDBoperation()->GetConn()->exec($dbsql);
            DataBase::getDBoperation()->GetConn()->exec($sql);
            
             return 'update record ';
             DataBase::getDBoperation()->disconnect();
           } catch (PDOException $TH) {
            return $TH->getMessage();
        }
        
     }
      
   
      public function GetCategoryData()
      {
          try {
              DataBase::getDBoperation()->connect();

              $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
              $sql = "SELECT * FROM category;";
              DataBase::getDBoperation()->GetConn()->exec($dbsql);
              $result =  DataBase::getDBoperation()->GetConn()->prepare($sql);
              $result->execute();
              $DATA =[];
              if($result)
              {
                  $category = $result->fetchAll();
                  
              }
              return $category ;    
             
               
          } catch (PDOException $th) {
              return "cannot get the data causse $th" ; 
          }
      }

 
    



}
