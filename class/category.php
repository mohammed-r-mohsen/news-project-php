<?php 
class category 
{
    
    private $name; 

    public function __construct($name)
    {
        $this->name = $name ; 
    }
     
  public function setname($name)
  {
      $this->name = $name;
  }

  public function getname()
  {
      return $this->name;
  }

    
    
    
}
