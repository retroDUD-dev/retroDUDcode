<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

if(!isset($_SESSION['equipment'])){
    $_SESSION['equipment'] = array();
}

if(isset($_REQUEST['itemNameInput'])  && $_REQUEST['itemNameInput'] != ""){
    array_push($_SESSION['equipment'], [$_REQUEST['itemNameInput'], $_REQUEST['itemQuantityInput']]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>retroDUD</title>

    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="./js/scripts.js"></script>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/topBar.php'; ?>
<form id="equipment" method="post" action="SetEquipments.php">
    <div class="text header">Add equipment!</div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text name">Item name: <input class="input" name ="itemNameInput" type="text" form="equipment" value="" autocomplete="off" autofocus> Item quantity: <input class="input dice" name ="itemQuantityInput" type="number" form="equipment" value="1" autocomplete="off"></div>
            </div>
        </div>
    </div>
    <div class="submitContainer"><input class="submit" type="submit" form="equipment" value="ADD ITEM"></div>
    <div class="outputContainer">
        <div class="row"></div>
        <input class="submitAll" type="submit" form="equipment" formaction="SetFeatures.php" value="Continue">
    </div>
</form>
<?php /*
if($_REQUEST['itemNameInput'] && isset($_SESSION['equipment'][0])){
    echo "
        <script type='text/javascript'>
            txt = ".$_SESSION['equipment'][count($_SESSION['equipment']) - 1][0]." added!\";
            skip = false;
            i = 0;
        </script>
        <div class=\"outputContainer\">
            <div id=\"output\" class=\"text\"></div>
        </div>
        <img src onerror='typing()'>
    ";
}*/
?>
</body>
</html>