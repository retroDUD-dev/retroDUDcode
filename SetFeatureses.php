<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

if(!isset($_SESSION['features'])){
    $_SESSION['features'] = array();
}

if(isset($_SESSION['features']['isAlive'])){
    array_shift($_SESSION['features']);
}

if(isset($_REQUEST['featureNameInput']) && isset($_REQUEST['featureDescriptionInput']) && $_REQUEST['featureNameInput'] != ""){
    $_SESSION['features'][$_REQUEST['featureNameInput']] = $_REQUEST['featureDescriptionInput'];
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
<form id="features" action="SetFeatureses.php" method="post">
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
<?php
if($_REQUEST['featureNameInput'] != ""){
    echo "
        <script type='text/javascript'>
            txt = \"Feature ".$_REQUEST['featureNameInput']." added!\";
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