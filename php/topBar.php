<div class="topBar">
    <a href="./index.php">
        <div class="logo text inner"><b>retro</b><img src="./favicon.ico" class="DUD"></div>
    </a>
    <a href="./AboutMe.php">
        <div class="AboutMe text inner"><b>AboutMe</b></div>
    </a>
    <?php
        if(isset($_SESSION['cleanFolder']) && $_SESSION['cleanFolder']){
            array_map('unlink', glob("tmp/*.*"));
            $_SESSION['cleanFolder'] = null;
            unset($_SESSION['cleanFolder']);
        }

        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            echo "
                <a href=\"./welcome.php\">
                    <div class=\"topButton text\">My Account</div>
                </a>
            ";
        }else{
            echo "
                <a href=\"./login.php\">
                    <div class=\"topButton text\">Log In</div>
                </a>
            ";
        }
    ?>
</div>
<div class="spacer"></div>