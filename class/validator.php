<?php



class validator 
{
    /**
     * name validator 
     * if the name too short 
     * if the name exist in the db 
     */

     /**
      * password validatoor 
      * if password too short 
      * if password not contins capt
      * if passswrd not contains lower case
      * if password not contains num
      * is password not contains the @# etc
      * is the password founded in db 
      */

      /**
       * category validator
       * does not exist in db 
       */

      /**
       * news validator
       * does not exist in db 
       */


private function __construct() {
    
}

   public static function Getinstance() : validator
   {
      return new validator();
   }


        private function ValidatePasswordRequest($password) : String
        {
                 
                 
                 switch ($password) :
                    case (Strlen($password)<8):
                        return 'password too short';
                        break;
                    case (Strlen($password)>20) :
                        return 'passsword too long';
                        break;
                    case (!preg_match("#[0-9]+#" , $password)) : 
                        return 'passsword must have at leat one number';
                        break;
                    case (!preg_match("#[a-z]+#" , $password)) :
                        return 'password must have at least one letter';
                        break;
                    case (!preg_match("#[A-Z]+#" , $password)) : 
                        return 'password must have at least one letter caps';
                        break;
                    case (!preg_match("#\W+#" , $password)) : 
                        return 'password must hasve at least one symbol';
                        break;
                    default:
                        return 'success';
                        break;
                    endswitch;
        
    
                }

        private function ValidateEmailRequest($Email) : String
        {
            return !filter_var($Email , FILTER_VALIDATE_EMAIL) ? 'error email please write another one ' : 'success';
        }

       

         public static  function ValidateCategory(category $category) : String
         {
            return ($category->getname()<5) ? 'too short category name' : 'success' ;
         }
         
         public   function ValidateNews(news $News) : String
         {
            
            return  (Strlen($News->gettitle()<10)) ? 'too short News title ' : 'success' ; 
         }


         public function ValidateAdmin(Admin $Admin) : String 
         {
            $errors = array();
            $errors =(Strlen($Admin->getName())<8) ? 'too short Admin length' : 'success' ; 
            $errors = $this->ValidateEmailRequest($Admin->getemail());             
            $errors = $this->ValidatePasswordRequest($Admin->getpassssword());             
            
            return $errors;
         }







}
