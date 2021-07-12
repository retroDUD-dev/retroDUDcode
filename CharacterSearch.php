<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

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
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/topBar.php';
    echo "<div class='header text'>This page is not finished yet!<br>You can view all the characters you have permission to, but you may only dowload (or delete - if you are permitted to) the top most character.<br>To get around this, you may use the filters to select the desired character.</div>"; ?>
    <form id="search" action="CharacterSearch.php" method="post">
        <div class="innerContainer text">
            <div style="text-align: center; text-transform: uppercase;" >search by:</div>
            <div class="buttonContainer" style="padding-top: 20px;">
                <div class="name">Name:<input name="searchByName" type="text" form="search" class="input" value=""></div>
                <div class="name">Class:<input name="searchByClass" type="text" form="search" class="input" value=""></div>
                <div class="name">Level:<input name="searchByLevel" type="number" form="search" class="input" value="0"></div>
                <div class="name">Created by:<input name="searchByUser" type="text" form="search" class="input" value=""></div>
                <div class="name">Only show my characters<input name="searchMine" type="checkbox" form="search"></div>
                <input type="submit" form="search" class="submit" value="search">
            </div>
        </div>
    </form>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/topBar.php';
    search();
    if(isset($_REQUEST['downloadChar'])){
        unset($_REQUEST['downloadChar']);
    }
    if(isset($_REQUEST['downloadC'])){
        unset($_REQUEST['downloadC']);
    }
    ?>
</body>
</html>