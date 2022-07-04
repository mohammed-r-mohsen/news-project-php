<?php 

class DataBase implements Countable 
{  
    private static $DB = null;
    private  $localhost='127.0.0.1';
    private  $username='root';
    private  $password = '';
    private  $DataBase='newsProject';
    private static $conn = null ;
     private $count=0;
    
    private  function __construct()
    {
        
        if(self::$conn == null )
        self::$conn = new PDO("mysql:host=$this->localhost;" , $this->username , $this->password);
        
    }
    
     public function count(): int
     {
         return ++$this->count;
     }
    public static function getDBoperation()
    {
        if (self::$DB==null) {
            self::$DB=new DataBase();
        }
        return self::$DB;
    }
     public function GetConn()
     {
         return self::$conn;
     }

    public function connect()
    {
        try {
            if(self::$conn == null )
            self::$conn = new PDO("mysql:host =$this->localhost ;dbname=" .$this->DataBase , $this->username , $this->password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            return ('SUSSECFUL CONNECTD ');
        } catch (PDOException $th) {
            print($th->getMessage());
        }
      return $this;
    }

    public function disconnect()
    {
        if(self::$conn != null )
           self::$conn=null;
          return ('sucesssfuly disconnected');
          return $this;
    }
   
     public function getdbName()
     {
         return $this->DataBase;
     }

}
