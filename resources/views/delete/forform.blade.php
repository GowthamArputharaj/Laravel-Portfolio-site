<html>

   <head>
      <title>Form Example</title>
   </head>

   <body>

      

      <a href=<?php echo route('lets.return', ['one' => 'Gow']); ?>>Go Back </a>
      <a href=<?php echo URL::temporarySignedRoute('lets.return',now()->addSeconds(10), ['one' => 'Gow']); ?>>Go Back with Sign </a>
      <form action = "form" method = "get">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
      
         <table>
            <tr>
               <td>Name</td>
               <td><input type = "text" name = "name" /></td>
            </tr>
            <tr>
               <td>Username</td>
               <td><input type = "text" name = "username" /></td>
            </tr>
            <tr>
               <td>Password</td>
               <td><input type = "password" name = "password" /></td>
            </tr>
            <tr>
               <td colspan = "2">
                  <input type = "submit" value = "Register" />
               </td>
            </tr>
         </table>
      </form>

   </body>
</html>