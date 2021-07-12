<?php
    include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

    if(isset($_REQUEST['uploadC']) || (isset($_SESSION['uploadWaiting']) && $_SESSION['uploadWaiting'])){
        unset($_REQUEST['uploadC']);
        if(isset($_REQUEST['isPublic'])){
            $_SESSION['isPublic'] = $_REQUEST['isPublic'];
        }else{
            $_SESSION['isPublic'] = 1;
        }
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            $_SESSION['uploadWaiting'] = false;
            $deathSaves = array("successes" => 3, "failures" => 3);

            if(!isset($_SESSION['features'])){
                $_SESSION['features'] = array();
            }

            if(isset($_REQUEST['featureNameInput']) || isset($_REQUEST['featureDescriptionInput'])){
                array_push($_SESSION['features'], array($_REQUEST['featureNameInput'], $_REQUEST['featureDescriptionInput']));
                $_REQUEST['featureNameInput'] = null;
                $_REQUEST['featureDescriptionInput'] = null;
            }

            include_once $_SERVER['DOCUMENT_ROOT'].'/php/config.php';

            if($mysqli->connect_error){
                die("Connection failed: ".$mysqli->connect_error."\nPlease refresh the page.");
            }

            $_SESSION['folder'] = "file/";
            $tmpChar = new Character($_SESSION['name'], $_SESSION['class'], 1, $_SESSION['background'], $_SESSION['race'], $_SESSION['alignment'], 0, $_SESSION['attributes'], 0, $_SESSION['proficiency'], $_SESSION['savingThrows'], $_SESSION['skills'], $_SESSION['perception'], $_SESSION['proficienciesAndLanguages'], $_SESSION['money'], $_SESSION['armor'], $_SESSION['initiative'], $_SESSION['speed'], $_SESSION['hitPoints'], $_SESSION['hitPoints'], 1, 10, array("Successes" => 3, "Failures" => 3), $_SESSION['attacks'], $_SESSION['equipment'], $_SESSION['personalityTraits'], $_SESSION['ideals'], $_SESSION['bonds'], $_SESSION['flaws'], $_SESSION['features']);
            $file = trim($_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$tmpChar->getName()."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes']);
            $tmpChar->toFile($file);
            $file = trim($file.".pdf");
            include $_SERVER['DOCUMENT_ROOT'].'/php/PdfOutput.php';
            $_SESSION['folder'] = null;
            unset($_SESSION['folder']);

            $sql = "INSERT INTO Characters (name, class, level, background, race, alignment, experiencePoints, attributes, inspiration, proficiency, savingThrows, skills, perception, proficienciesAndLanguages, money, armor, initiative, speed, currentHitPoints, temporaryHitPoints, numberOfDice, sidesOfdice, deathSaves, attacks, equipment, personalityTraits, ideals, bonds, flaws, features, user, isPublic, file) 
            VALUES (
            '".str_replace("'", "&#8216;", $_SESSION['name'])."',
            '".str_replace("'", "&#8216;", $_SESSION['class'])."',
            '1',
            '".str_replace("'", "&#8216;", $_SESSION['background'])."',
            '".str_replace("'", "&#8216;", $_SESSION['race'])."',
            '".str_replace("'", "&#8216;", $_SESSION['alignment'])."',
            '0',
            '".str_replace("'", "&#8216;", json_encode($_SESSION['attributes']))."',
            '0',
            '".$_SESSION['proficiency']."',
            '".str_replace("'", "&#8216;", json_encode($_SESSION['savingThrows']))."',
            '".str_replace("'", "&#8216;", json_encode($_SESSION['skills']))."',
            '".$_SESSION['perception']."',
            '".str_replace("'", "&#8216;", json_encode($_SESSION['proficienciesAndLanguages']))."',
            '".str_replace("'", "&#8216;", json_encode($_SESSION['money']))."',
            '".$_SESSION['armor']."',
            '".$_SESSION['initiative']."',
            '".$_SESSION['speed']."',
            '".$_SESSION['hitPoints']."',
            '".$_SESSION['hitPoints']."',
            '".$_SESSION['hitNumberOfDice']."',
            '".$_SESSION['hitSidesOfDice']."',
            '".str_replace("'", "&#8216;", json_encode($deathSaves))."',
            '".str_replace("'", "&#8216;", json_encode($_SESSION['attacks']))."',
            '".str_replace("'", "&#8216;", json_encode($_SESSION['equipment']))."',
            '".str_replace("'", "&#8216;", $_SESSION['personalityTraits'])."',
            '".str_replace("'", "&#8216;", $_SESSION['ideals'])."',
            '".str_replace("'", "&#8216;", $_SESSION['bonds'])."',
            '".str_replace("'", "&#8216;", $_SESSION['flaws'])."',
            '".json_encode("..working on it..")."',
            '".$_SESSION['username']."',
            '".$_SESSION['isPublic']."',
            '".$file."'
            )";

            if(!$mysqli->query($sql)){
                die("Error: $mysqli->error");
            }

            $mysqli->close();

            $_SESSION['uploadComplete'] = true;
            header("location: /welcome.php");
            exit;
        }else{
            $_SESSION['uploadWaiting'] = true;
            header("location: /login.php");
            exit;
        }
    }

    if(isset($_FILES['uploadF'])){
        if(isset($_REQUEST['isPublic'])){
            $_SESSION['isPublic'] = $_REQUEST['isPublic'];
        }else{
            $_SESSION['isPublic'] = 1;
        }
        $tmpChar = new Character();

        $tmpChar->fromFile($_FILES['uploadF']['tmp_name'].".chr");
        $file = substr($_FILES['uploadF']['name'], 0, -4);

        $_SESSION['name'] = $tmpChar->getName();
        $_SESSION['class'] = $tmpChar->getClass();
        $_SESSION['level'] = $tmpChar->getLevel();
        $_SESSION['background'] = $tmpChar->getBackground();
        $_SESSION['race'] = $tmpChar->getRace();
        $_SESSION['alignment'] = $tmpChar->getAlignment();
        $_SESSION['experiencePoints'] = $tmpChar->getExperiencePoints();
        $_SESSION['attributes'] = $tmpChar->getAttributes();
        $_SESSION['inspiration'] = $tmpChar->getInspiration();
        $_SESSION['proficiency'] = $tmpChar->getProficiency();
        $_SESSION['savingThrows'] = $tmpChar->getSavingThrows();
        $_SESSION['skills'] = $tmpChar->getSkills();
        $_SESSION['perception'] = $tmpChar->getPerception();
        $_SESSION['proficienciesAndLanguages'] = $tmpChar->getProficienciesAndLanguages();
        $_SESSION['money'] = $tmpChar->getMoney();
        $_SESSION['armor'] = $tmpChar->getArmor();
        $_SESSION['initiative'] = $tmpChar->getInitiative();
        $_SESSION['speed'] = $tmpChar->getSpeed();
        $_SESSION['hitPoints'] = $tmpChar->getCurrentHitPoints();
        $_SESSION['hitDice'] = $tmpChar->hitDiceToString();
        $_SESSION['deathSaves'] = $tmpChar->getDeathSaves();
        $_SESSION['attacks'] = $tmpChar->getAttacks();
        $_SESSION['equipment'] = $tmpChar->getEquipment();
        $_SESSION['personalityTraits'] = $tmpChar->getPersonalityTraits();
        $_SESSION['ideals'] = $tmpChar->getIdeals();
        $_SESSION['bonds'] = $tmpChar->getBonds();
        $_SESSION['flaws'] = $tmpChar->getFlaws();
        $_SESSION['features'] = $tmpChar->getFeatures();
        
        if(!isset($_SESSION['features'])){
            $_SESSION['features'] = array();
        }

        if(isset($_REQUEST['featureNameInput']) || isset($_REQUEST['featureDescriptionInput'])){
            array_push($_SESSION['features'], array($_REQUEST['featureNameInput'], $_REQUEST['featureDescriptionInput']));
            $_REQUEST['featureNameInput'] = null;
            $_REQUEST['featureDescriptionInput'] = null;
        }

        include_once $_SERVER['DOCUMENT_ROOT'].'/php/config.php';

        if($mysqli->connect_error){
            die("Connection failed: ".$mysqli->connect_error."\nPlease refresh the page.");
        }

        $_SESSION['folder'] = "file/";
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'];
        $file = $_FILES['uploadF']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['uploadF']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
        move_uploaded_file($temp_name,$path_filename_ext);

        $file = trim($_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$file);
        include $_SERVER['DOCUMENT_ROOT'].'/php/PdfOutput.php';
        $_SESSION['folder'] = null;
        unset($_SESSION['folder']);

        $sql = "INSERT INTO Characters (name, class, level, background, race, alignment, experiencePoints, attributes, inspiration, proficiency, savingThrows, skills, perception, proficienciesAndLanguages, money, armor, initiative, speed, currentHitPoints, temporaryHitPoints, numberOfDice, sidesOfdice, deathSaves, attacks, equipment, personalityTraits, ideals, bonds, flaws, features, user, isPublic, file) 
        VALUES (
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getName()))."',
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getClass()))."',
        '".$tmpChar->getLevel()."',
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getBackground()))."',
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getRace()))."',
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getAlignment()))."',
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getExperiencePoints()))."',
        '".str_replace("'", "&#8216;", json_encode($tmpChar->getAttributes()))."',
        '0',
        '".$tmpChar->getProficiency()."',
        '".str_replace("'", "&#8216;", json_encode($tmpChar->getSavingThrows()))."',
        '".str_replace("'", "&#8216;", json_encode($tmpChar->getSkills()))."',
        '".$tmpChar->getPerception()."',
        '".str_replace("'", "&#8216;", json_encode($tmpChar->getProficienciesAndLanguages()))."',
        '".str_replace("'", "&#8216;", json_encode($tmpChar->getMoney()))."',
        '".$tmpChar->getArmor()."',
        '".$tmpChar->getInitiative()."',
        '".$tmpChar->getSpeed()."',
        '".$tmpChar->getCurrentHitPoints()."',
        '".$tmpChar->getTemporaryHitPoints()."',
        '".$tmpChar->getHitDice()->getNumber()."',
        '".$tmpChar->getHitDice()->getSides()."',
        '".str_replace("'", "&#8216;", json_encode($tmpChar->getDeathSaves()))."',
        '".str_replace("'", "&#8216;", json_encode($tmpChar->getAttacks()))."',
        '".str_replace("'", "&#8216;", json_encode($tmpChar->getEquipment()))."',
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getPersonalityTraits()))."',
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getIdeals()))."',
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getBonds()))."',
        '".validateString(str_replace("'", "&#8216;", $tmpChar->getFlaws()))."',
        '".json_encode("..working on it..")."',
        '".$_SESSION['username']."',
        '".$_SESSION['isPublic']."',
        '".$file."'
        )";

        if(!$mysqli->query($sql)){
            die("Error: $mysqli->error");
        }

        $mysqli->close();

        $_SESSION['uploadComplete'] = true;
        header("location: /welcome.php");
        exit;
    }

    if(isset($_REQUEST['downloadFile'])){
        unset($_REQUEST['downloadFile']);
        $tmpChar = new Character($_SESSION['name'], $_SESSION['class'], 1, $_SESSION['background'], $_SESSION['race'], $_SESSION['alignment'], 0, $_SESSION['attributes'], 0, $_SESSION['proficiency'], $_SESSION['savingThrows'], $_SESSION['skills'], $_SESSION['perception'], $_SESSION['proficienciesAndLanguages'], $_SESSION['money'], $_SESSION['armor'], $_SESSION['initiative'], $_SESSION['speed'], $_SESSION['hitPoints'], $_SESSION['hitPoints'], 1, 10, array("Successes" => 3, "Failures" => 3), $_SESSION['attacks'], $_SESSION['equipment'], $_SESSION['personalityTraits'], $_SESSION['ideals'], $_SESSION['bonds'], $_SESSION['flaws'], $_SESSION['features']);
        $file = trim($_SERVER['DOCUMENT_ROOT']."/tmp/".$tmpChar->getName()."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes']);
        $tmpChar->toFile($file);
        $file = trim($file.".chr");
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }

    if(isset($_REQUEST['downloadPdf'])){
        unset($_REQUEST['downloadPdf']);
        $file = $_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes'].".pdf";
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        $test = filesize($file);
        readfile($_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes'].".pdf");
        exit;
    }

    if(isset($_REQUEST['downloadChar'])){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($_REQUEST['downloadChar']).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($_REQUEST['downloadChar']));
        readfile($_REQUEST['downloadChar']);
        $_REQUEST['downloadChar'] = null;
        unset($_REQUEST['downloadChar']);
        exit;
    }

    if(isset($_REQUEST['deleteChar'])){
        include_once $_SERVER['DOCUMENT_ROOT'].'/php/config.php';

        // Check connection
        if ($mysqli->connect_error) {
          die("Connection failed: " . $mysqli->connect_error);
        }
        
        $sql = "DELETE FROM Characters WHERE file = '".$_REQUEST['deleteChar']."'";
        $result = $mysqli->query($sql);

        $mysqli->close();
        unlink($_REQUEST['deleteChar']);
        unlink(substr($_REQUEST['deleteChar'], 0, -4)."*.jpg");
        unlink(substr($_REQUEST['deleteChar'], 0, -4).".pdf");
        $_REQUEST['deleteChar'] = null;
        header("location: /CharacterSearch.php");
        exit;
    }
    echo "nope.";