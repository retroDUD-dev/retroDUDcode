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
        txt = "Welcome to my page!\n\nAs part of my introduction to PHP, I decided to create a website that allows you to create and store DnD characters.\nYou should have the option to save your character localy, print out a character sheet, or save it online.\n\nPlease do keep in mind that this is a work in progress and that I only just begun my journey into PHP so not everything may work as expected.\n\nAlright, so how would you like to proceed?";
        i = 0;
        skip = false;
        document.addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                skip = true;
            }
        });
    </script>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/topBar.php'; ?>
    <div id="skip"><input type="button" class="submit skip" value="SKIP Intro" onclick="skip = true"></div>
    <div class="header text">Hello there, weary traveller!</div>
    <div class="container">
        <textarea id="output" class="text" style="width: 85%; text-align: center; resize: none; background-color: var(--background-color); border: 0px;" rows="1" disabled></textarea>
    </div>
    <div id="hidden" class="containerBottom">
        <div class="col left">
            <form id="createNew" method="POST" action="./CreateNewCharacter.php"><input type="submit" form="createNew" class="submit" value="Create a new character"></form>
        </div>
        <div class="col right">
            <form id="login" method="POST" action="./welcome.php"><input type="submit" form="login" class="submit" value="To my account"></form>
        </div>
    </div>
    <img src="" onerror="typing()">
</body>
</html>