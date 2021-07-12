<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

if(!isset($_SESSION['attacks'])){
    $_SESSION['attacks'] = array();
}

if(isset($_REQUEST['attackNameInput']) && isset($_REQUEST['attackBonusInput']) && isset($_REQUEST['attackNumberOfDiceInput']) && isset($_REQUEST['attackSidesOfDiceInput']) && isset($_REQUEST['attackTypeInput']) && isset($_REQUEST['commentInput']) && $_REQUEST['attackNameInput'] != ""){
    array_push($_SESSION['attacks'], [$_REQUEST['attackNameInput'], $_REQUEST['attackBonusInput'], $_REQUEST['attackNumberOfDiceInput'], $_REQUEST['attackSidesOfDiceInput'], $_REQUEST['attackTypeInput'], $_REQUEST['commentInput']]);
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
<form id="attacks" method="post" action="SetAttacks.php">
    <div class="text header">Add attacks!</div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text name">Attack name: <input class="input" name ="attackNameInput" type="text" form="attacks" value="" autocomplete="off" autofocus></div>
                <div class="text name">Attack bonus: <input class="input" name ="attackBonusInput" type="number" form="attacks" value="0" autocomplete="off"></div>
                <div class="text name">Attack dice: <input class="input dice" name ="attackNumberOfDiceInput" type="number" form="attacks" value="0" autocomplete="off"> d<input class="input dice" name="attackSidesOfDiceInput" type="number" form="attacks" value="0" autocomplete="off"></div>
                <div class="text name">Attack type: <input class="input" name ="attackTypeInput" type="text" form="attacks" value="" autocomplete="off"></div>
                <div class="text name">Additional comments: <input class="input" name ="commentInput" type="text" form="attacks" value="" autocomplete="off"></div>
            </div>
        </div>
    </div>
    <div class="submitContainer"><input class="submit" type="submit" form="attacks" value="ADD ATTACK"></div>
    <div class="outputContainer">
        <div class="row"></div>
        <input class="submitAll" type="submit" form="attacks" formaction="SetEquipment.php" value="Continue">
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
</div>
</body>
</html>