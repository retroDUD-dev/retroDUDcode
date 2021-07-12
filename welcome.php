<?php
// Initialize the session
session_start();
 
if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
    $_SESSION["loggedin"] = true;
    $_SESSION['username'] = $_REQUEST['username'];
    $_SESSION['password'] = $_REQUEST['password'];
}

if(isset($_SESSION['uploadWaiting']) && $_SESSION['uploadWaiting'] === true){
    header("location: php/ioHandler.php");
    exit;
}

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
    <div class="header text">Hello there, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</div>
    <div class="containerCol">
        <div class="row text">
            How would you like to proceed?
        </div>
        <div class="innerContainer">
            <div class="container">
                <div class="row">
                    <form id="createNew" action="./CreateNewCharacter.php" method="POST"><input form="createNew" type="submit" class="submit inner button" value="Create new Character"></form>
                    <form id="search" action="./CharacterSearch.php" method="POST"><input form="search" type="submit" class="submit inner button" value="view characters"></form>
                </div>
                <div class="row" style="border: 1px solid var(--border-color); width:33%;">
                    <form id="upload" enctype="multipart/form-data" action="./php/ioHandler.php" method="POST">
                        <div class="text">Upload local character:</div>
                        <input class="submit inner button" type="file" form="upload" name="uploadF" value="select character file" accept=".chr" required>
                        <div class="text inner">Allow other people to access my character?
                            <div style="height: 5px;"></div>
                            <div class="check">
                                Yes<input name="isPublic" form="upload" type="radio" value="1" checked>
                            </div>
                            <div class="check">
                                No<input name="isPublic" form="upload" type="radio" value="0">
                            </div>
                            <div style="height: 10px;"></div>
                        <input type="submit" form="upload" name="submit" value="upload" class="submit button" style="width: 10%;">
                        </div>
                    </form>
                </div>
                <div class="row">
                    <form id="resetPass" action="./resetPassword.php" method="POST"><input type="submit" form="resetPass" class="submit inner button" value="Reset Your Password"></form>
                    <form id="logOut" action="./php/logout.php" method="POST"><input type="submit" form="logOut" class="submit inner button" value="Sign Out"></form>
                </div>
            </div>
        </div>
    </div>
    <div class="submitContainer"></div>
<?php
if(isset($_SESSION['uploadComplete']) && $_SESSION['uploadComplete']){
    unset($_SESSION['uploadComplete']);
    echo "
        <div class=\"outputContainer\">
            <div class=\"row\">
                <div class=\"col center text\">".$_SESSION['name']." was successfully uploaded!</div>
            </div>
        </div>
        ";
}
?>
</body>
</html>