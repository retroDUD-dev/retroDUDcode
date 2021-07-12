<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

$_SESSION['name'] = $_REQUEST['nameInput'];
$_SESSION['class'] = $_REQUEST['classInput'];
$_SESSION['background'] = $_REQUEST['backgroundInput'];
$_SESSION['race'] = $_REQUEST['raceInput'];
$_SESSION['hitNumberOfDice'] = $_REQUEST['hitNumberOfDiceInput'];
$_SESSION['hitSidesOfDice'] = $_REQUEST['hitSidesOfDiceInput'];
$_SESSION['hitDice'] = $_SESSION['hitNumberOfDice']." d".$_SESSION['hitSidesOfDice'];
$_SESSION['alignment'] = $_REQUEST['alignmentInput'];
$_SESSION['proficiency'] = $_REQUEST['proficiencyInput'];
$_SESSION['attributes'] = array(
    'strenght' => $_REQUEST['strenghtInput'],
    'dexterity' => $_REQUEST['dexterityInput'],
    'constitution' => $_REQUEST['constitutionInput'],
    'inteligence' => $_REQUEST['inteligenceInput'],
    'wisdom' => $_REQUEST['wisdomInput'],
    'charisma' => $_REQUEST['charismaInput'],
);
$_SESSION['savingThrows'] = array(
    'strenght' => $_REQUEST['strenghtSTInput'],
    'dexterity' => $_REQUEST['dexteritySTInput'],
    'constitution' => $_REQUEST['constitutionSTInput'],
    'inteligence' => $_REQUEST['inteligenceSTInput'],
    'wisdom' => $_REQUEST['wisdomSTInput'],
    'charisma' => $_REQUEST['charismaSTInput'],
);
$_SESSION['skills'] = array(
    'acrobatics' => $_REQUEST['acrobaticsInput'],
    'animalHandling' => $_REQUEST['animalHandlingInput'],
    'arcana' => $_REQUEST['arcanaInput'],
    'athletics' => $_REQUEST['athleticsInput'],
    'deception' => $_REQUEST['deceptionInput'],
    'history' => $_REQUEST['historyInput'],
    'insight' => $_REQUEST['insightInput'],
    'intimidation' => $_REQUEST['intimidationInput'],
    'investigation' => $_REQUEST['investigationInput'],
    'medicine' => $_REQUEST['medicineInput'],
    'nature' => $_REQUEST['natureInput'],
    'perception' => $_REQUEST['perceptionInput'],
    'performance' => $_REQUEST['performanceInput'],
    'persuasion' => $_REQUEST['persuasionInput'],
    'religion' => $_REQUEST['religionInput'],
    'sleightOfHand' => $_REQUEST['sleightOfHandInput'],
    'stealth' => $_REQUEST['stealthInput'],
    'survival' => $_REQUEST['survivalInput'],
);
$_SESSION['perception'] = $_REQUEST['perceptionInput'];
$_SESSION['proficienciesAndLanguages'] = array(
    'proficiencies' => $_REQUEST['proficienciesInput'],
    'languages' => $_REQUEST['languagesInput'],
);
$_SESSION['armor'] = $_REQUEST['armorInput'];
$_SESSION['initiative'] = $_REQUEST['initiativeInput'];
$_SESSION['speed'] = $_REQUEST['speedInput'];
$_SESSION['hitPoints'] = $_REQUEST['hitPointsInput'];
$_SESSION['personalityTraits'] = $_REQUEST['personalityTraitsInput'];
$_SESSION['ideals'] = $_REQUEST['idealsInput'];
$_SESSION['bonds'] = $_REQUEST['bondsInput'];
$_SESSION['flaws'] = $_REQUEST['flawsInput'];
$_SESSION['money'] = array(
    'CP' => $_REQUEST['CPInput'],
    'SP' => $_REQUEST['SPInput'],
    'EP' => $_REQUEST['EPInput'],
    'GP' => $_REQUEST['GPInput'],
    'PP' => $_REQUEST['PPInput'],
);

if(isset($_SESSION['name'])){
    $_SESSION['name'] = validateString($_SESSION['name'], $noSpace);
}
if(isset($_SESSION['class'])){
    $_SESSION['class'] = validateString($_SESSION['class'], $noSpace);
}
if(isset($_SESSION['background'])){
    $_SESSION['background'] = validateString($_SESSION['background'], $noSpace);
}
if(isset($_SESSION['alignment'])){
    $_SESSION['alignment'] = validateString($_SESSION['alignment'], $noSpace);
}
if(isset($_SESSION['personalityTraits'])){
    $_SESSION['personalityTraits'] = validateString($_SESSION['personalityTraits'], $noSpace);
}
if(isset($_SESSION['ideals'])){
    $_SESSION['ideals'] = validateString($_SESSION['ideals'], $noSpace);
}
if(isset($_SESSION['bonds'])){
    $_SESSION['bonds'] = validateString($_SESSION['bonds'], $noSpace);
}
if(isset($_SESSION['flaws'])){
    $_SESSION['flaws'] = validateString($_SESSION['flaws'], $noSpace);
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
</body>
</html>