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
if(!isset($_SESSION['hitDice'])){
    $_SESSION['hitDice'] = "1d10";
}
?><!DOCTYPE html>
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
    <?php
    $_SESSION['folder'] = "tmp/";
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/topBar.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/PdfOutput.php';

    echo "
    <div class=\"text header\">All done!</div>
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col center\">
        ";
            if(file_exists($_SERVER['DOCUMENT_ROOT']."/tmp/".$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes'].".jpg")){
                echo "<img src=\"tmp/".$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes'].".jpg\">";
            }elseif(file_exists($_SERVER['DOCUMENT_ROOT']."/tmp/".$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes']."-0.jpg")){
                echo "<img src=\"tmp/".$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes']."-0.jpg\">";
            }else{
                echo "<img src=\"tmp/".$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes']."-0-0.jpg\">";
            }
    echo "    
            </div>
        </div>
    </div>
    "; ?>
    <form id="characterCreated" action="./php/ioHandler.php" method="POST">
        <div class="buttonContainerCol">
            <div class="innerContainer">
                <input name="uploadC" form="characterCreated" type="submit" class="submit buttoninner" onclick="saved = true;" value="Upload character to server">
                <div class="text inner">Allow other people to access my character?
                    <div style="height: 5px;"></div>
                    <div class="check">
                        Yes<input name="isPublic" form="characterCreated" type="radio" value="1" checked>
                    </div>
                    <div class="check">
                        No<input name="isPublic" form="characterCreated" type="radio" value="0">
                    </div>
                    <div style="height: 10px;"></div>
                </div>
            </div>
            <div class="row">
                <input name="downloadFile" form="characterCreated" type="submit" class="submit button" value="Save character locally">
            </div>
            <div class="row">
                <input name="downloadPdf" form="characterCreated" type="submit" class="submit button" value="Download PDF">
            </div>
        </div> 
    </form>
<div class="submitContainer"><input class="submitAll" type="button" form="createNew" value="HOME" onclick="location.href='index.php'"></div>
</body>
</html>