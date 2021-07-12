<?php

    class Dice{
        protected $number, $sides;
        
        function __construct(int $number = 0, int $sides = 0){
            $this->number = $number;
            $this->sides = $sides;
        }

        function setNumber(int $number){
            $this->number = $number;
        }

        function getNumber(){
            return $this->number;
        }

        function setSides(int $sides){
            $this->sides = $sides;
        }

        function getSides(){
            return $this->sides;
        }

        function roll(){
            $r = 0;
            for ($i=0; $i < $this->number; $i++) { 
                $r += rand(1,$this->sides);
            }
            return $r;
        }

        function toString(){
            return $this->number."d".$this->sides;
        }
    }

    class Attack{
        protected $name, $bonus, $numberOfDice, $sidesOfDice, $type, $comment;

        function __construct(string $name = "", int $bonus = 0, int $numberOfDice = 0, int $sidesOfDice = 0, string $type = "", string $comment = ""){
            $this->name = $name;
            $this->bonus = $bonus;
            $this->numberOfDice = $numberOfDice;
            $this->sidesOfDice = $sidesOfDice;
            $this->type = $type;
            $this->comment = $comment;    
            
        }

        function setName(string $name){
            $this->name = $name;
        }

        function getName(){
            return $this->name;
        }

        function setBonus(int $bonus){
            $this->bonus = $bonus;
        }

        function getBonus(){
            return $this->bonus;
        }

        function setDice(Dice $dice){
            $this->dice = $dice;
        }

        function getDice(){
            return $this->dice->toString();
        }

        function setType(string $type){
            $this->type = $type;
        }

        function getType(){
            return $this->type;
        }

        function setComment(string $comment){
            $this->comment = $comment;
        }

        function getComment(){
            return $this->comment;
        }

        function toString(){
            return "Name: ".$this->name."\nBonus: ".$this->bonus."\nDice/type: ".$this->dice->toString()." + ".$this->type."\nComment: ".$this->comment;
        }
    }