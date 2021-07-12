<?php
session_start();
$_SESSION['date'] = getdate();

$_SESSION['name'] = null;
$_SESSION['class'] = null;
$_SESSION['background'] = null;
$_SESSION['race'] = null;
$_SESSION['alignment'] = null;
$_SESSION['proficiency'] = null;
$_SESSION['attributes'] = null;
$_SESSION['savingThrows'] = null;
$_SESSION['skills'] = null;
$_SESSION['perception'] = null;
$_SESSION['proficienciesAndLanguages'] = null;
$_SESSION['money'] = null;
$_SESSION['armor'] = null;
$_SESSION['initiative'] = null;
$_SESSION['speed'] = null;
$_SESSION['hitPoints'] = null;
$_SESSION['personalityTraits'] = null;
$_SESSION['ideals'] = null;
$_SESSION['bonds'] = null;
$_SESSION['flaws'] = null;
$_SESSION['attacks'] = null;
$_SESSION['equipment'] = null;
$_SESSION['features'] = null;

unset($_SESSION['name']);
unset($_SESSION['class']);
unset($_SESSION['background']);
unset($_SESSION['race']);
unset($_SESSION['alignment']);
unset($_SESSION['proficiency']);
unset($_SESSION['attributes']);
unset($_SESSION['savingThrows']);
unset($_SESSION['skills']);
unset($_SESSION['perception']);
unset($_SESSION['proficienciesAndLanguages']);
unset($_SESSION['money']);
unset($_SESSION['armor']);
unset($_SESSION['initiative']);
unset($_SESSION['speed']);
unset($_SESSION['hitPoints']);
unset($_SESSION['personalityTraits']);
unset($_SESSION['ideals']);
unset($_SESSION['bonds']);
unset($_SESSION['flaws']);
unset($_SESSION['attacks']);
unset($_SESSION['equipment']);
unset($_SESSION['features']);

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
        txt = "Welcome to my page!\n\nAs part of my introduction to PHP, I decided to create a website that allows you to create and store DnD characters.\nYou should have the option to save your character localy, print out a character sheet, or save it online.\n\nPlease do keep in mind that this is a work in progress and that I only just begun my journey into PHP so not everything may work as expected.\n\nAlright, so how would you like to proceed?";
        i = 0;
    </script>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/topBar.php'; ?>
<form id="createNew" method="post" action="SetAttack.php">
<div class="text header">Create a new character</div>
<div class="container">
    <div class="row">
        <div class="col left">
            <div class="text name">Name: <input class="input" name ="nameInput" type="text" form="createNew" value="" autocomplete="off"></div>
            <div class="text name">Class: <input class="input" name ="classInput" type="text" form="createNew" value="" autocomplete="off"></div>
            <div class="text name">Background: <input class="input" name ="backgroundInput" type="text" form="createNew" value="" autocomplete="off"></div>
            <div class="text name">Race: <input class="input" name ="raceInput" type="text" form="createNew" value="" autocomplete="off"></div>
            <div class="text name">Hit dice: <input class="input dice" name ="hitNumberOfDiceInput" type="number" form="createNew" value="1" autocomplete="off"> d<input class="input dice" name="hitSidesOfDiceInput" type="number" form="createNew" value="10" autocomplete="off"></div>
            <div class="innerContainer">
                <div class="inner"><div class="text name inner">Attributes</div></div>
                <div class="text name">Strenght: <input class="input" name ="strenghtInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Dexterity: <input class="input" name ="dexterityInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Constitution: <input class="input" name ="constitutionInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Inteligence: <input class="input" name ="inteligenceInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Wisdom: <input class="input" name ="wisdomInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Charisma: <input class="input" name ="charismaInput" type="number" form="createNew" value="0" autocomplete="off"></div>
            </div>
            <div class="innerContainer">
                <div class="inner"><div class="text name inner">Saving throws</div></div>
                <div class="text name">Strenght: <input class="input" name ="strenghtSTInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Dexterity: <input class="input" name ="dexteritySTInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Constitution: <input class="input" name ="constitutionSTInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Inteligence: <input class="input" name ="inteligenceSTInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Wisdom: <input class="input" name ="wisdomSTInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Charisma: <input class="input" name ="charismaSTInput" type="number" form="createNew" value="0" autocomplete="off"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col center">
            <div class="text name">Alignment: <input class="input" name ="alignmentInput" type="text" form="createNew" value="" autocomplete="off"></div>
            <div class="text name">Proficiency: <input class="input" name ="proficiencyInput" type="number" min="0" step="1" form="createNew" value="0" autocomplete="off"></div>
            <div class="text name">Armor: <input class="input" name ="armorInput" type="number" min="0" step="1" form="createNew" value="0" autocomplete="off"></div>
            <div class="text name">Initiative: <input class="input" name ="initiativeInput" type="number" min="0" step="1" form="createNew" value="0" autocomplete="off"></div>
            <div class="text name">Speed: <input class="input" name ="speedInput" type="number" min="0" step="1" form="createNew" value="0" autocomplete="off"></div>
            <div class="text name">Hit points: <input class="input" name ="hitPointsInput" type="number" min="0" step="1" form="createNew" value="0" autocomplete="off"></div>
            <div class="text name">Personality traits: <input class="input" name ="personalityTraitsInput" type="text" form="createNew" value="" autocomplete="off"></div>
            <div class="text name">Ideals: <input class="input" name ="idealsInput" type="text" form="createNew" value="" autocomplete="off"></div>
            <div class="text name">Bonds: <input class="input" name ="bondsInput" type="text" form="createNew" value="" autocomplete="off"></div>
            <div class="text name">Flaws: <input class="input" name ="flawsInput" type="text" form="createNew" value="" autocomplete="off"></div>
            <div class="text name">Proficiencies: <textarea class="input" name ="proficienciesInput" type="text" form="createNew" value="" autocomplete="off"></textarea></div>
            <div class="text name">Languages: <textarea class="input" name ="languagesInput" type="text" form="createNew" value="" autocomplete="off"></textarea></div>
            <div class="text name">Number of copper pieces: <input class="input dice" name ="CPInput" type="number" form="createNew" value="0" autocomplete="off"></div>
            <div class="text name">Number of silver pieces: <input class="input dice" name ="SPInput" type="number" form="createNew" value="0" autocomplete="off"></div>
            <div class="text name">Number of electrum pieces: <input class="input dice" name ="EPInput" type="number" form="createNew" value="0" autocomplete="off"></div>
            <div class="text name">Number of gold pieces: <input class="input dice" name ="GPInput" type="number" form="createNew" value="0" autocomplete="off"></div>
            <div class="text name">Number of platinum pieces: <input class="input dice" name ="PPInput" type="number" form="createNew" value="0" autocomplete="off"></div>
        </div>
    </div>
    <div class="row">
        <div class="col right">
            <div class="innerContainer">
                <div class="inner"><div class="text name inner">Skills</div></div>
                <div class="text name">Acrobatics: <input class="input" name ="acrobaticsInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Animal handling: <input class="input" name ="animalHandlingInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Arcana: <input class="input" name ="arcanaInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Athletics: <input class="input" name ="athleticsInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Deception: <input class="input" name ="deceptionInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">History: <input class="input" name ="historyInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Insight: <input class="input" name ="insightInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Intimidation: <input class="input" name ="intimidationInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Investigation: <input class="input" name ="investigationInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Medicine: <input class="input" name ="medicineInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Nature: <input class="input" name ="natureInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Perception: <input class="input" name ="perceptionInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Performance: <input class="input" name ="performanceInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Persuasion: <input class="input" name ="persuasionInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Religion: <input class="input" name ="religionInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Sleight of hand: <input class="input" name ="sleightOfHandInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Stealth: <input class="input" name ="stealthInput" type="number" form="createNew" value="0" autocomplete="off"></div>
                <div class="text name">Survival: <input class="input" name ="survivalInput" type="number" form="createNew" value="0" autocomplete="off"></div>
            </div>
        </div>
    </div>
</div>
<div class="submitContainer"><input class="submitAll" type="submit" form="createNew" value="CONTINUE"></div>
</form>
</body>
</html>