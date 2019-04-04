<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Finish</title>
</head>
<body>
    <?php
    /**
 * Created by PhpStorm.
 * User: Andrew Harrington
 * Date: 4/4/2019
 * Time: 12:44 PM
 */
    $flavors = $_POST['flavors'];
    //verification
        //name
        if($_POST['name'] == ""){
            echo 'ERROR_1';
        }
        //check for unintended values
        if(sizeof($flavors) > 7){
            echo 'ERROR_2';
        }
        //one check box
        $valid = false;
        foreach ($flavors as $key => $value){
            if(isset($key)){
                $valid = true;
            }
        }
        if($valid == false){
            echo 'ERROR_3';
        }


    ?>
</body>
</html>

