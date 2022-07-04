<?php 
class Admin 
{
    private $name ; 
    private $email ; 
    private $password ; 
    public function __construct($name , $email , $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setemail($email)
    {
        $this->email = $email;
    }
    public function getemail()
    {
      return $this->email;
    }


    public function setpasssword($password)
    {
        $this->password=$password;
    }
    public function getpassssword()
    {
        return $this->password;
    }
}




?>