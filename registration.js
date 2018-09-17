      function validate() { 
          if( document.myForm.firstname.value == "" )
         {
            alert( "Please provie your First Name with letters only!!" );
            document.myForm.firstname.focus() ;
            return false;
         }
          if( document.myForm.lastname.value == "" )
         {
            alert( "Please provide your Last Name with letters only!!" );
            document.myForm.lastname.focus() ;
            return false;
         }
         
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

         if( document.myForm.password.value.length <8 )
         {
            alert( "Atleast 8 characters required for Password!!" );
            document.myForm.password.focus() ;
            return false;
         }

      }
      // End of registration form validation...