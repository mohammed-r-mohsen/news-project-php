<?PHP 
include 'DataBase.php';
class NewsDB 

{
    private static $newsDB = null ;  
    private $TableName = "news";
    
   public static function GetnewsDB()
   {
       if(self::$newsDB ==null)
       {
           self::$newsDB = new NewsDB();
       }
       return self::$newsDB;
   }



    public function setTable(string  $table)
    {
        $this->TableName = $table;
    }
    
    public function getTable()
    {
        return $this->TableName;
    }


     public function CreateNews(news $news)
     {
        $newsTitle = $news->gettitle();
        $newsbody = $news->getbody();
        $newscategory = $news->getactegory();
        $newsimg = $news->getimg();


        try {
             DataBase::getDBoperation()->connect();
            
            $dbsql='USE '.DataBase::getDBoperation()->getdbName();
            $sql = "INSERT INTO news  (category,author,title,body,img) VALUES ('$newscategory','admin','$newsTitle','$newsbody','$newsimg');";
    
            DataBase::getDBoperation()->GetConn()->exec($dbsql);
            DataBase::getDBoperation()->GetConn()->exec($sql);
            
             return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/news-list.php");
             DataBase::getDBoperation()->disconnect();
        } catch (PDOException $th) {
            return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/add-News.php");

        }
     }
   
     public function Deletenews($newstitle)
     {
         try {
             DataBase::getDBoperation()->connect();
             $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
             
             $sql = "DELETE FROM news WHERE news.title ='$newstitle';";
             
             DataBase::getDBoperation()->GetConn()->exec($dbsql);
             DataBase::getDBoperation()->GetConn()->exec($sql);
             
              
              DataBase::getDBoperation()->disconnect();
              return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/news-list.php");

         
         
            } catch (PDOException $TH) {
                return header("Location:http://localhost/news-project/sufee-admin-dashboard-master/news-list.php");

         }
     }
    
 
     public function GetRowData($newstitle)
     {
        try {
            DataBase::getDBoperation()->connect();

            $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
            $sql = "SELECT * FROM news WHERE title = '$newstitle'";
            DataBase::getDBoperation()->GetConn()->exec($dbsql);
            $result =  DataBase::getDBoperation()->GetConn()->prepare($sql);
            $result->execute();
            $DATA =[];
            if($result)
            {
                $new = $result->fetchAll();
                
            }
            return $new ;    
           
             
        } catch (PDOException $th) {
            return "cannot get the data causse $th" ; 
        }
     }
 
     public function UpdateNew($newstitle , news $news)
     {
         $title = $news->gettitle();
         $body = $news->getbody();
         $img = $news->getimg();
         
        try {
            DataBase::getDBoperation()->connect();
            $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
            $sql = "UPDATE `news` SET `title` = '$title', `body` = '$body' , `img` = '$img' WHERE `news`.`title` = '$newstitle';";
            DataBase::getDBoperation()->GetConn()->exec($dbsql);
            DataBase::getDBoperation()->GetConn()->exec($sql);
            
             return 'update record ';
             DataBase::getDBoperation()->disconnect();
           } catch (PDOException $TH) {
            return $TH->getMessage();
        }
        
     }
      
   
      public function GetnewsData()
      {
          try {
              DataBase::getDBoperation()->connect();

              $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
              $sql = "SELECT * FROM news;";
              DataBase::getDBoperation()->GetConn()->exec($dbsql);
              $result =  DataBase::getDBoperation()->GetConn()->prepare($sql);
              $result->execute();
              $DATA =[];
              if($result)
              {
                  $new = $result->fetchAll();
                  
              }
              return $new ;    
             
               
          } catch (PDOException $th) {
              return "cannot get the data causse $th" ; 
          }
      }


      public function GetlastData($limit)
      {
          try {
              DataBase::getDBoperation()->connect();

              $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
              $sql = "SELECT * FROM news order by news.id DESC LIMIT $limit ;";
              DataBase::getDBoperation()->GetConn()->exec($dbsql);
              $result =  DataBase::getDBoperation()->GetConn()->prepare($sql);
              $result->execute();
              $DATA =[];
              if($result)
              {
                  $new = $result->fetchAll();
                  
              }
              return $new ;    
             
               
          } catch (PDOException $th) {
              return "cannot get the data causse $th" ; 
          }
      }


      public function Getfirstata($limit)
      {
          try {
              DataBase::getDBoperation()->connect();

              $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
              $sql = "SELECT * FROM news order by news.id  LIMIT $limit ;";
              DataBase::getDBoperation()->GetConn()->exec($dbsql);
              $result =  DataBase::getDBoperation()->GetConn()->prepare($sql);
              $result->execute();
              $DATA =[];
              if($result)
              {
                  $new = $result->fetchAll();
                  
              }
              return $new ;    
             
               
          } catch (PDOException $th) {
              return "cannot get the data causse $th" ; 
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


      public function GetCategorynews($categoryname)
      {
          try {
              DataBase::getDBoperation()->connect();

              $dbsql = 'USE '.DataBase::getDBoperation()->getdbName();
              $sql = "SELECT * FROM `news` WHERE news.category = '$categoryname'";
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


