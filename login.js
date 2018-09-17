function validate() { 
    
   
    if( document.myForm.username.value == "" )
   {
      alert( "Please provide your Username!!" );
      document.myForm.username.focus() ;
      return false;
   }
    if( document.myForm.password.value == "" )
   {
      alert( "Please provide your Password!!" );
      document.myForm.password.focus() ;
      return false;
   }


}
// End of registration form validation...