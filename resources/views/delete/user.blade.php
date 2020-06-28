<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user.php</title>
    <style>
        body {
            background-color: grey;
        }

        h2 {
            font-size: 6rem !important;
            text-shadow: 0 0 7px red;
            left: 50%;
            top: 45%;

        }
    
    </style>
</head>
<body>
    <h1> 
        <?php echo $_SERVER['PHP_SELF']; ?> 
    </h1>
    <div>
        <form action="print" method="post">
            @csrf
            <label for="num">Table number</label>
            <input type="text" name="num" id="num"></br>

            <label for="max">Maximum number</label>
            <input type="text" name="max" id="max"></br>

            <input type="submit" value="GENERATE" name='gen'></br>

            <button type="button" value="Next">


        </form>
        

    </div>

    <?php 

        function gen(){
            
                global $num;
                global $max;

                if($_POST['num'] < 1){
                    $_POST['num']=(int)10;
                }

                if($_POST['max'] < 1){
                    $_POST['max']=(int)20;
                }

                $max = rand((int)1, (int)$_POST['max']);
                $num = $_POST['num'];
                print('<h2>'.$num. ' * '. $max. ' is </h2>' );
                #sleep(8);
                if(isset($_POST['sub'])){
                    print($num. ' * '. $max. ' is ' .$max * $num);
                }

               

            

            

        }

        

        if(isset($_POST['gen'])){
            gen();
        }

        #header("refresh: 4"); 

    ?>

    <!--?php print_r("username is ". $user . " password is ". $pass); ?-->
    

</body>
</html>
