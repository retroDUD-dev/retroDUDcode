<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

if(!isset($_SESSION['equipment'])){
    $_SESSION['equipment'] = array();
}

if(isset($_REQUEST['itemNameInput']) && isset($_REQUEST['itemQuantityInput']) && $_REQUEST['itemNameInput'] != ""){
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
    
    <script>
        i = 0;
    </script>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/topBar.php'; ?>
<form id="features" method="post" action="SetFeatureses.php">
    <div class="text header">Add Features!</div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="text name">Feature name: <input class="input" name ="featureNameInput" type="text" form="features" value="" autocomplete="off" autofocus></div>
                <div class="text name">Feature description: <textarea class="input" name ="featureDescriptionInput" type="text" form="features" value="" autocomplete="off"></textarea></div>
            </div>
        </div>
    </div>
    <div class="submitContainer"><input class="submit" type="submit" form="features" value="ADD FEATURE"></div>
    <div class="outputContainer">
        <div class="row"></div>
        <input class="submitAll" type="submit" form="features" formaction="Summary.php" value="Continue">
    </div>
</form>
<?php /*
if($_REQUEST['itemNameInput'] != ""){
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