<?php 
include './autoloader.php';
              

// add the new category 





 function FoundError(array $array):bool
{
     $founded = false ; 
     foreach ($array as $key => $value) {
         if(!is_null($value))
          {
            $founded = true ; 
             break;
          }
     }
    return $founded ; 
}






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
    $error = array();
    $error =  validator::Getinstance()->ValidateAdmin($admin);
  session_start();
   $_SESSION['errors'] = $error;
   if(FoundError($error))
    AdminDB::GetAdminDB()->CreateAdmin($admin);
    else
        header("Location: http://localhost/news-project/sufee-admin-dashboard-master/add-admin.php");
         
    
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