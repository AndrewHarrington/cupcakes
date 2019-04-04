<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errorFound = false;
    $flavors = $_POST['flavors'];
//verification
    //name
    if($_POST['name'] == ""){
        $errorFound = true;
        echo 'ERROR: Missing Name<br>';
    }
    //check for unintended values
    if(sizeof($flavors) > 7){
        $errorFound = true;
        echo 'ERROR: Too Many Flavors<br>';
    }
    //one check box
    $valid = false;
    foreach ($flavors as $key => $value){
        if(isset($key)){
            $valid = true;
        }
    }
    if($valid == false){
        $errorFound = true;
        echo 'ERROR: Pick a Flavor<br>';
    }
    if(!$errorFound){

    }
}
/**
 * Created by PhpStorm.
 * User: Andrew Harrington
 * Date: 4/4/2019
 * Time: 12:44 PM
 */



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cupcake Fundraiser</title>
</head>
<body>
    <form action="finish.php" method="POST">
        <h1>Cupcake Fundraiser</h1>
        <p>Your Name:</p>
        <input type="text" placeholder="Please input your name" name="name">
        <p>Cupcake Flavors:</p>
        <ul>
            <?php
                /**
                 * Created by PhpStorm.
                 * User: Andrew Harrington
                 * Date: 4/4/2019
                 * Time: 11:14 AM
                 */
                $flavors = array('grasshopper' => 'The Grasshopper',
                                    'maple' => 'Whiskey Maple Bacon',
                                    'carrot' => 'Carrot Walnut',
                                    'caramel' => 'Salted Caramel Cupcake',
                                    'velvet' => 'Red Velvet',
                                    'lemon' => 'Lemon Drop',
                                    'tiramisu' => 'Tiramisu');
                foreach ($flavors as $key => $value) {
                    echo "<li>
                        <input type=\"checkbox\" name=\"flavors[]\" id=\"$key\" value=\"$key\">
                        <label for=\"$key\">$value</label>
                      </li>";
                }
            ?>
        </ul>
        <button type="submit">Order</button>
    </form>
</body>
</html>


