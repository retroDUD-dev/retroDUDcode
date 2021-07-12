<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

if(!isset($_SESSION['attacks'])){
    $_SESSION['attacks'] = array();
}

if(!isset($_SESSION['features'])){
    $_SESSION['features'] = array();
}

if(isset($_REQUEST['attackNameInput']) && isset($_REQUEST['attackBonusInput']) && isset($_REQUEST['attackNumberOfDiceInput']) && isset($_REQUEST['attackSidesOfDiceInput']) && isset($_REQUEST['attackTypeInput']) && isset($_REQUEST['commentInput']) && $_REQUEST['attackNameInput'] != ""){
    array_push($_SESSION['attacks'], [$_REQUEST['attackNameInput'], $_REQUEST['attackBonusInput'], $_REQUEST['attackNumberOfDiceInput'], $_REQUEST['attackSidesOfDiceInput'], $_REQUEST['attackTypeInput'], $_REQUEST['commentInput']]);
}

if($_SESSION['attacks'] === array()){
    array_push($_SESSION['attacks'], ['Slap', 1, 1, 4, 'Blunt', 'Just slap.']);
}

if($_SESSION['features'] === array()){
    $_SESSION['features']['isAlive'] = 'At least you managed that.';
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
<?php
if(isset($_SESSION['attacks'][count($_SESSION['attacks']) - 1]) && $_REQUEST['attackNameInput'] != ""){
    echo "
        <script type='text/javascript'>
            txt = \"Attack ".$_SESSION['attacks'][count($_SESSION['attacks']) - 1][0]." added!\";
            skip = false;
            i = 0;
        </script>
        <div class=\"outputContainer\">
            <div id=\"output\" class=\"text\"></div>
        </div>
        <img src onerror='typing()'>
    ";
}
?>
</body>
</html>