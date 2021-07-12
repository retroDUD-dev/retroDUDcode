<?php
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT']."/php/functions.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/php/utility.php";

    class Character{
        protected $name, $class, $level, $background, $race, $alignment, $experiencePoints, $attributes, $inspiration, $proficiency, $savingThrows, $skills, $perception, $proficienciesAndLanguages, $money, $armor, $initiative, $speed, $currentHitPoints, $temporaryHitPoints, $hitDice, $deathSaves, $attacks, $equipment, $personalityTraits, $ideals, $bonds, $flaws, $features;

        function __construct(string $name = "Bob",string $class = "Wangel",int $level = 0,string $background = "Stroller",string $race = "Duno",string $alignment = "Neutral",int $experiencePoints = 0,array $attributes = array("strenght" => 0, "dexterity" => 0, "constitution" => 0, "inteligence" => 0, "wisdom" => 0, "charisma" => 0),bool $inspiration = FALSE,int $proficiency = 0,array $savingThrows = array("strenght" => 0, "dexterity" => 0, "constitution" => 0, "inteligence" => 0, "wisdom" => 0, "charisma" => 0),array $skills = array("acrobatics" => 0, "animalHandling" => 0, "arcana" => 0, "athletics" => 0, "deception" => 0, "history" => 0, "insight" => 0, "intimidation" => 0, "investigation" => 0, "medicine" => 0, "nature" => 0, "performance" => 0, "persuasion" => 0, "religion" => 0, "sleightOfHand" => 0, "stealth" => 0, "survival" => 0),int $perception = 0,array $proficienciesAndLanguages = array("proficiencies" => "None", "languages" => "Barely any"), array $money = array('CP' => 0, 'SP' => 0, 'EP' => 0, 'GP' => 0, 'PP' => 0),int $armor = 0,int $initiative = 0,int $speed = 0,int $currentHitPoints = 0,int $temporaryHitPoints = 0, int $numberOfDice = 0, int $sidesOfDice = 0,array $deathSaves = array("successes" => 3, "failures" => 3),array $attacks = array(),array $equipment = array(),string $personalityTraits = "Barely any",string $ideals = "None",string $bonds = "Free man",string $flaws = "Many",array $features = array('Bob' => 'is Bob')){
            
            $this->name = $name;
            $this->class = $class;
            $this->level = $level;
            $this->background = $background;
            $this->race = $race;
            $this->alignment = $alignment;
            $this->experiencePoints = $experiencePoints;
            $this->attributes = $attributes;
            $this->inspiration = $inspiration;
            $this->proficiency = $proficiency;
            $this->savingThrows = $savingThrows;
            $this->skills = $skills;
            $this->perception = $perception;
            $this->proficienciesAndLanguages = $proficienciesAndLanguages;
            $this->money = $money;
            $this->armor = $armor;
            $this->initiative = $initiative;
            $this->speed = $speed;
            $this->currentHitPoints = $currentHitPoints;
            $this->temporaryHitPoints = $temporaryHitPoints;
            $this->hitDice = new Dice($numberOfDice, $sidesOfDice);
            $this->deathSaves = $deathSaves;
            $this->attacks = $attacks;
            $this->equipment = $equipment;
            $this->personalityTraits = $personalityTraits;
            $this->ideals = $ideals;
            $this->bonds = $bonds;
            $this->flaws = $flaws;
            $this->features = $features;
        }

        function setClass(string $class){
            $this->class = $class;
        }

        function getClass(){
            return $this->class;
        }

        function setLevel(int $level){
            $this->level = $level;
        }

        function getLevel(){
            return $this->level;
        }

        function setBackground(string $background){
            $this->background = $background;
        }

        function getBackground(){
            return $this->background;
        }

        function setName(string $name){
            $this->name = $name;
        }

        function getName(){
            return $this->name;
        }

        function setRace(string $race){
            $this->race = $race;
        }

        function getRace(){
            return $this->race;
        }

        function setAlignment(string $alignment){
            $this->alignment = $alignment;
        }

        function getAlignment(){
            return $this->alignment;
        }

        function setExperiencePoints(int $experiencePoints){
            $this->experiencePoints = $experiencePoints;
        }

        function getExperiencePoints(){
            return $this->experiencePoints;
        }

        function setAttributes(array $attributes){
            $this->attributes = $attributes;
        }

        function getAttributes(){
            return $this->attributes;
        }

        function setInspiration(bool $inspiration){
            $this->inspiration = $inspiration;
        }

        function getInspiration(){
            return $this->inspiration;
        }

        function setProficiency(int $proficiency){
            $this->proficiency = $proficiency;
        }

        function getProficiency(){
            return $this->proficiency;
        }

        function setSavingThrows(array $savingThrows){
            $this->savingThrows = $savingThrows;
        }

        function getSavingThrows(){
            return $this->savingThrows;
        }

        function setSkills(array $skills){
            $this->skills = $skills;
        }

        function getSkills(){
            return $this->skills;
        }

        function setPerception(int $perception){
            $this->perception = $perception;
        }

        function getPerception(){
            return $this->perception;
        }

        function setProficienciesAndLanguages(array $proficienciesAndLanguages){
            $this->proficienciesAndLanguages = $proficienciesAndLanguages;
        }

        function getProficienciesAndLanguages(bool $html = FALSE){
            return $this->proficienciesAndLanguages;
        }

        function setMoney(array $money){
            $this->money = $money;
        }

        function getMoney(bool $html = FALSE){
            return $this->money;
        }

        function setArmor(int $armor){
            $this->armor = $armor;
        }

        function getArmor(){
            return $this->armor;
        }

        function setInitiative(int $initiative){
            $this->initiative = $initiative;
        }

        function getInitiative(){
            return $this->initiative;
        }

        function setSpeed(int $speed){
            $this->speed = $speed;
        }

        function getSpeed(){
            return $this->speed;
        }

        function setCurrentHitPoints(int $currentHitPoints){
            $this->currentHitPoints = $currentHitPoints;
        }

        function getCurrentHitPoints(){
            return $this->currentHitPoints;
        }

        function setTemporaryHitPoints(int $temporaryHitPoints){
            $this->temporaryHitPoints = $temporaryHitPoints;
        }

        function getTemporaryHitPoints(){
            return $this->temporaryHitPoints;
        }

        function setHitDice(Dice $hitDice){
            $this->hitDice = $hitDice;
        }

        function getHitDice(){
            return $this->hitDice;
        }

        function setDeathSaves(array $deathSaves){
            $this->deathSaves = $deathSaves;
        }

        function getDeathSaves(){
            return $this->deathSaves;
        }

        function setAttacks(array $attacks){
            $this->attacks = $attacks;
        }

        function getAttacks(){
            return $this->attacks;
        }

        function setEquipment(array $equipment){
            $this->equipment = $equipment;
        }

        function getEquipment(){
            return $this->equipment;
        }

        function setPersonalityTraits(string $personalityTraits){
            $this->personalityTraits = $personalityTraits;
        }

        function getPersonalityTraits(){
            return $this->personalityTraits;
        }

        function setIdeals(string $ideals){
            $this->ideals = $ideals;
        }

        function getIdeals(){
            return $this->ideals;
        }

        function setBonds(string $bonds){
            $this->bonds = $bonds;
        }

        function getBonds(){
            return $this->bonds;
        }

        function setFlaws(string $flaws){
            $this->flaws = $flaws;
        }

        function getFlaws(){
            return $this->flaws;
        }

        function setFeatures(array $features){
            $this->features = $features;
        }

        function getFeatures(){
            return $this->features;
        }

        function toString(bool $html = FALSE){
            if($html){
                return "<br>Name: ".$this->name.
                        "<br>Class: ".$this->class.
                        "<br>Level: ".$this->level.
                        "<br>Race: ".$this->race.
                        "<br>Background: ".$this->background.
                        "<br>Alignment: ".$this->alignment.
                        "<br>Experience points: ".$this->experiencePoints.
                        "<br><br>Attributes:<br>".arrayToString($this->attributes, $html).
                        "<br><br>Has inspiration: ".$this->inspiration.
                        "<br>Proficiency: ".$this->proficiency.
                        "<br><br>Saving throws:<br>".arrayToString($this->savingThrows, $html).
                        "<br><br>Skills:<br>".arrayToString($this->skills, $html).
                        "<br><br>Perception: ".$this->perception.
                        "<br><br>Proficiencies and Languages:<br>".arrayToString($this->proficienciesAndLanguages, $html).
                        "<br><br>Money:<br>".arrayToString($this->money, $html).
                        "<br>Armor: ".$this->armor.
                        "<br>Initiative: ".$this->initiative.
                        "<br>Speed: ".$this->speed.
                        "<br>Current hit points: ".$this->currentHitPoints.
                        "<br>Temporary hit points: ".$this->temporaryHitPoints.
                        "<br>Hit dice: ".$this->hitDice->toString().
                        "<br><br>Death saves:<br>".arrayToString($this->deathSaves, $html).
                        "<br><br>Personality traits: ".$this->personalityTraits.
                        "<br>Ideals: ".$this->ideals.
                        "<br>Bonds: ".$this->bonds.
                        "<br>Flaws: ".$this->flaws.
                        "<br><br>Attacks:<br>".arrayToString($this->attacks, $html, true).
                        "<br><br>Equipment:<br>".arrayToString($this->equipment, $html, true).
                        "<br><br>Fetures:<br>".arrayToString($this->features, $html).
                        "<br>";
            }else{
                return "\nName: ".$this->name.
                        "\nClass: ".$this->class.
                        "\nLevel: ".$this->level.
                        "\nRace: ".$this->race.
                        "\nBackground: ".$this->background.
                        "\nAlignment: ".$this->alignment.
                        "\nExperience points: ".$this->experiencePoints.
                        "\n\nAttributes:\n".arrayToString($this->attributes, $html).
                        "\n\nHas inspiration: ".$this->inspiration.
                        "\nProficiency: ".$this->proficiency.
                        "\n\nSaving throws:\n".arrayToString($this->savingThrows, $html).
                        "\n\nSkills:\n".arrayToString($this->skills, $html).
                        "\n\nPerception: ".$this->perception.
                        "\n\nProficiencies and Languages:\n".arrayToString($this->proficienciesAndLanguages, $html).
                        "\n\nMoney:\n".arrayToString($this->money, $html).
                        "\nArmor: ".$this->armor.
                        "\nInitiative: ".$this->initiative.
                        "\nSpeed: ".$this->speed.
                        "\nCurrent hit points: ".$this->currentHitPoints.
                        "\nTemporary hit points: ".$this->temporaryHitPoints.
                        "\nHit dice: ".$this->hitDice->toString().
                        "\n\nDeath saves:\n".arrayToString($this->deathSaves, $html).
                        "\n\nPersonality traits: ".$this->personalityTraits.
                        "\nIdeals: ".$this->ideals.
                        "\nBonds: ".$this->bonds.
                        "\nFlaws: ".$this->flaws.
                        "\n\nAttacks:\n".arrayToString($this->attacks, $html, true).
                        "\n\nEquipment:\n".arrayToString($this->equipment, $html, true).
                        "\n\nFetures:\n".arrayToString($this->features, $html).
                        "\n";
            }
        }

        function hitDiceToString(){
            return $this->hitDice->toString();
        }

        function toFile($fileName){
            $arr = array($this->name, $this->class , $this->level , $this->background, $this->race, $this->alignment, $this->experiencePoints, $this->attributes, $this->inspiration, $this->proficiency, $this->savingThrows, $this->skills, $this->perception, $this->proficienciesAndLanguages, $this->money , $this->armor , $this->initiative, $this->speed, $this->currentHitPoints, $this->temporaryHitPoints, array($this->hitDice->getNumber(), $this->hitDice->getSides()), $this->deathSaves, $this->attacks, $this->equipment, $this->personalityTraits, $this->ideals, $this->bonds , $this->flaws , $this->features);
            return fileOutput(json_encode($arr), $fileName);
        }

        function fromFile($file){
            $arr = json_decode(fileInput($file), true);
            $this->name = $arr[0];
            $this->class = $arr[1];
            $this->level = $arr[2];
            $this->background = $arr[3];
            $this->race = $arr[4];
            $this->alignment = $arr[5];
            $this->experiencePoints = $arr[6];
            $this->attributes = $arr[7];
            $this->inspiration = $arr[8];
            $this->proficiency = $arr[9];
            $this->savingThrows = $arr[10];
            $this->skills = $arr[11];
            $this->perception = $arr[12];
            $this->proficienciesAndLanguages = $arr[13];
            $this->money = $arr[14];
            $this->armor = $arr[15];
            $this->initiative = $arr[16];
            $this->speed = $arr[17];
            $this->currentHitPoints = $arr[18];
            $this->temporaryHitPoints = $arr[19];
            $this->hitDice = new Dice($arr[20][0], $arr[20][1]);
            $this->deathSaves = $arr[21];
            $this->attacks = $arr[22];
            $this->equipment = $arr[23];
            $this->personalityTraits = $arr[24];
            $this->ideals = $arr[25];
            $this->bonds = $arr[26];
            $this->flaws = $arr[27];
            $this->features = $arr[28];
        }

        function checkLvlUp(){
            $lvl_increase = 0;
            $exp_increase = 0;

            for ($i = 1; TRUE; $i++) {
                $exp_increase += $i * 1000;

                if ($this->experiencePoints < $exp_increase) {
                    $lvl_increase = $i;
                    break;
                }
            }

            if($lvl_increase > $this->level){
                $this->level = $lvl_increase;
                return TRUE;
            }else{
                return FALSE;
            }
        }

        function gainExp($experience){
            $this->experiencePoints += $experience;
            if($this->checkLvlUp()){
                return "You gained ".$experience." experience points.\nYou leveled up to level ".$this->level."!";
            }else{
                return "You gained ".$experience." experience points.";
            }
        }

        function addAttack(Attack $attack){
            array_push($this->attacks, $attack);
        }

        function advanceSkill(string $skill, int $advanceBy = 1){
            if(!array_key_exists($skill, $this->skills)){
                return FALSE;
            }else{
                $this->skills[$skill] += $advanceBy;
                return TRUE;
            }
        }

        function addToInventory(string $item, int $quantity){
            if(array_key_exists($item, $this->equipment)){
                $this->equipment[$item] += $quantity;
            }else{
                $this->equipment[$item] = $quantity;
            }
        }

        function addFeature(string $feature, string $description){
            if(array_key_exists($feature, $this->features)){
                return FALSE;
            }else{
                $this->features[$feature] = $description;
                return TRUE;
            }
        }

        function editFeature(string $feature, string $description){
            if(array_key_exists($feature, $this->features)){
                $this->features[$feature] = $description;
                return TRUE;
            }else{
                return FALSE;
            }
        }

        function advanceAttribute(string $attribute, $advanceBy = 1){
            if(!array_key_exists($attribute, $this->attributes)){
                return FALSE;
            }else{
                $this->attributes[$attribute] += $advanceBy;
                return TRUE;
            }       
        }
        
        function editProficienciesAndLanguages(string $proficiencyOrLanguag, string $description){
            if(array_key_exists($proficiencyOrLanguag, $this->proficienciesAndLanguages)){
                $this->proficienciesAndLanguages[$proficiencyOrLanguag] = $description;
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }