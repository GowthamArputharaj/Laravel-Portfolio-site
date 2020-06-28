<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Order;
use Illuminate\Support\Facades\Mail;

use App\Http\Requests;

use Illuminate\Support\Facades\Storage;



class RoleController extends Controller
{
      public function sendEmail()
      {
      $user = auth()->user();
      Mail::to($user)->send(new OrderShipped($user));

      if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
      }else{
            return response()->success('Great! Successfully send in your mail');
         }
      }

      public function mail(){
         $user = 'gow1999th@gmail.com';
         Mail::to($user)->send(new SendMailable($trainer, $trainee));
      }

      public function forms(Request $request) {
         //Retrieve the name input field
         $name = $request->input('name');
         echo 'Name: '.$name;
         echo '<br>';
         
         //Retrieve the username input field
         $username = $request->username;
         echo 'Username: '.$username;
         echo '<br>';
         
         //Retrieve the password input field
         $password = $request->password;
         echo 'Password: '.$password;
      }

      public function upl(Request $request){
        /*
         print_r("
                  <form method='get' action='upl' enctype='multipart/form-data'>  
                     <div><input type='file' name='image'> </div><br/>  
                     <div><button type='submit'>Upload </button></div>  
                  </form>  
               ");
         if($files=$request->file('image')){  
            $name=$files->getClientOriginalName();  
            $files->move('fileFolder',$name);  
            $data->path=$name;  
            $data->save(); 

         }  */
         print_r('
                  <form method="post" action="/account/verification/submit/1" enctype="multipart/form-data">
                     <input type="file" style="display: none;" name="note" id="note">
                  </form>
                  ');

         return $request->file("note")->storeAs("\fileFolder", "_note", "local");

      }

      public function downl() {
        /* GETS THIS PATH "C:\xampp\htdocs\Study\storage\app"  */
        $pa = storage_path('app');
        $input_txt = 'hello this is input lets try it another way';
        echo '<hr>Storage path $pa is '.$pa;

        /* READS THE CONTENT OF FILE  */
        $cont = Storage::get('fileFolder\testing.txt');
        print_r('<hr></br>content of file testing.txt is '.$cont);

        /* CREATES THE FILE */
        Storage::disk('local')->put('testt.txt', $input_txt);

        /* READS THE CONTENT OF FILE  */
        $content = Storage::get('test.txt');
        print_r('<hr></br>Content of file is test.txt </br>'.'content is </br>'.$content);

        /* FORM TO CREATE DOWNLOAD BUTTON */
         print_r("   
                     <form action='downl' method='get'>
                        <input type='submit' name='btn' value='Download By Clicking Here'>
                     </form>
                  ");

         /* CHECKS WHETHER BUTTON IS SET ; RETURNS 1 WHEN BTN IS CLICKED ELSE 0 */
         if(isset($_GET['btn']))
         return response()->download($pa.'\fileFolder\sample.pdf', 'sample'.time().'.pdf', ['header' => 'Gowtham s sample pdf file']);
         #return Storage::download('test.txt', 'Gowtham.txt', ['header' => 'This is Gowtham']);

     }
}
