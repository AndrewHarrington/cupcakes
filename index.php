<?php
/**
 * Author: Andrew Harrington
 * Date: 4/4/2019
 * aharrington.greenriverdev.com/328/cupcakes/
 * Allows the user to order a cupcake
 */
$flavors = array('grasshopper' => 'The Grasshopper',
    'maple' => 'Whiskey Maple Bacon',
    'carrot' => 'Carrot Walnut',
    'caramel' => 'Salted Caramel Cupcake',
    'velvet' => 'Red Velvet',
    'lemon' => 'Lemon Drop',
    'tiramisu' => 'Tiramisu');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $errorFound = false;
    $checkedFlavors = $_POST['flavors'];
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

    //no errors found
    if(!$errorFound){
        echo '
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
        echo
        '<div id ="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
              aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content"">';
        echo "<p>Thank you, " . $_POST['name'] . ", for your Order!</p>";
        $total = number_format(count($checkedFlavors)* 3.50, 2, '.', '');
        echo '<p>Order Summary</p>';
        echo '<ul>';
        foreach ($checkedFlavors as $key => $value)
        {
            echo "<li>$flavors[$value]</li>";
        }
        echo '</ul>';
        echo "<p> Order Total: $". $total;

        echo
        '<div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>';
        echo '<script>$("#modal").modal("show");</script>';

    }
}
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
    <form action="index.php" method="POST">
        <h1>Cupcake Fundraiser</h1>
        <p>Your Name:</p>
        <input type="text" placeholder="Please input your name" name="name">
        <p>Cupcake Flavors:</p>
        <ul>
            <?php
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


