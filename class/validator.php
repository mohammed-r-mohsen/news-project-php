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


private function __construct() 
{
    
}

   public static function Getinstance() : validator
   {
      return new validator();
   }


        private function ValidatePasswordRequest(Admin $Admin) : array
        {
           $errorpassword =  array();
           
         
           $password = $Admin->getpassssword();
        
        /**
         * this validator for passsword must have at leasst one uper case letter 
         * this function work correctly  
         *
         * 
         */
           if (!preg_match('(A-Z)', $password)) 
            {
                $errorpassword[] = 'the password must have at leats one upper case ';
            }

            /**
             * THIS IS VALIDATOR FOR PASSWORD MUST HAVE AT LEAT ON LOWER CASE 
             * THIS FUNCTION WORK CORRECTLY 
             */
        if (!preg_match('([a-z])', $password)) 
            {
                $errorpassword[] = 'the password must have at leats one lower case ';
            }
        /**
         * this is valiidator for the passwor dmust contains the number 
         * and this function is work corrrectly 
         *
         */
        if (!preg_match('/\d/', $password)) 
            {
                $errorpassword[] = 'the password must have at leats one number ';
            }

            /**
             * this is validator for the password must contais at leasst onnm symbol 
             * and this function is work correctly 
             * 
             */
        if (!preg_match('([@_!#$%^&*()<>?/\|}{~:])', $password)) 
            {
                $errorpassword[] = 'the password must have at leats one symbol ';
            }

        /*    $upercase =!() ? 'passwod mst have at least one upper case' : null ;
            $lowercase =!(preg_match('/a-z/', $Admin->getpassssword())) ? 'passwod mst have at least one lower case' : null ;
            $number =!(preg_match('/\d/', $Admin->getpassssword())) ? 'passwod mst have at least one nuumber' : null ;
            $sepcial =!(preg_match('', $Admin->getpassssword())) ? 'passwod mst have at least one symbol' : null ;
*/
/*
                 switch ($Admin->getpassssword()) :
                        
                    case ()) : 
                        $errorspassword[]= 'passsword must have at leat one LETTEER CAPS';
                        break;
                    case (!preg_match('/[a-z]/', $Admin->getpassssword() )) :
                        $errorspassword[] += 'password must have at least one small letter';
                        break;
                    case (!preg_match('/\d/', $Admin->getpassssword())) : 
                        $errorspassword[] += 'password must have at least one NUMBER';
                        break;
                    case (!preg_match('/[^\w]/', $Admin->getpassssword() )) : 
                        $errorspassword[] += 'password must hasve at least one symbol';
                        break;
                    endswitch;
                    return $errorspassword;
    
                */             
            return  $errorpassword;
            
            }

        private function ValidateEmailRequest($Email) 
        {
            return !filter_var($Email , FILTER_VALIDATE_EMAIL) ? 'error email please write another one ' : null;
        }

       

         public   function ValidateCategory(category $category) : String
         {
            return ($category->getname()<5) ? 'too short category name' : null ;
         }
         
         public   function ValidateNews(news $News) : String
         {
            return  (Strlen($News->gettitle()<10)) ? 'too short News title ' : null ; 
         }
         
         private function ValidatepasswordLenght($password) 
         {
            if(strlen($password)<8)
               return 'password too short' ;
            elseif(strlen($password)>20)
               return 'password too long';
         return null ; 
         }

         public function ValidateAdmin(Admin $Admin) : array 
         {
            $errors = array();
            
            $errors[] =(Strlen($Admin->getName())<8) ? 'too short Admin name length' :null ; 
            
            $errors[] = $this->ValidateEmailRequest($Admin->getemail());            
            
            $errors[] = $this->ValidatepasswordLenght($Admin->getpassssword());
            
            $errors[] =  $this->ValidatePasswordRequest($Admin);                        
            
            return $errors ;
         }







}
