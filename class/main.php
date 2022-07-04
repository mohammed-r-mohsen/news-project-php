<?php 
include './autoloader.php';
              

// add the new category 

 if(isset($_POST['categorySubmit']))
 {
   
     
    try {
        
        $category = new category($_POST['Category']);
        categoryDB::GetCategoryDB()->CreateCategory($category);
       
       
    } catch (Throwable $e) {
      
        echo $e->getFile();
        echo $e->getLine();
        echo $e->getMessage();
        
    }
   
   
}
elseif (isset($_POST['AdminAdd'])) {
try {
    $admin = new Admin($_POST['username'] , $_POST['email'] , $_POST['password']);
    AdminDB::GetAdminDB()->CreateAdmin($admin);
    
} catch (Throwable $e) {
    echo $e->getMessage();
}
   
}
elseif (isset($_POST['login'])) {

login::loginMethod($_POST['username'] ,  $_POST['pass']);

}elseif (isset($_POST['addnew'])) {
    
    $filename = time() . "_" . $_FILES['img']['name'] ;
    $target =  "testimg/" . $filename ; 
   echo move_uploaded_file($_FILES['img']['tmp_name'] , $target);

      NewsDB::GetnewsDB()->CreateNews(new news($_POST['title'] , $_POST['textarea-input'] , $_POST['category'] , $filename));


}