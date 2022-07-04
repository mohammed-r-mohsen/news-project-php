<?php 
class news
{
    private $title ; 
    private $body ; 
    private $category ; 
    private $img ; 

    public function __construct($title  , $body , $category , $img) {
        $this->title = $title;
        $this->body = $body;
        $this->category = $category;
        $this->img = $img;
    }

    public function settitle($title)
    {
        $this->title = $title;
    }
    public function gettitle()
    {
        return $this->title;
    }


    public function setbody($body)
    {
        $this->body = $body;
    }
    public function getbody()
    {
        return $this->body;
    }




    public function setcategory($category)
    {
        $this->category = $category;
    }
    public function getactegory()
    {
        return $this->category;
    }



    public function setimg($img)
    {
        $this->img = $img;
    }
    public function getimg()
    {
        return $this->img;
    }
}