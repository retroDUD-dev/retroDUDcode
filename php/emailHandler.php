<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

if(isset($_REQUEST['email'])){
    mail('info@retroDUD.eu', "New message from ".$_REQUEST['firstname']." ".$_REQUEST['lasttname'], $_REQUEST['subject'], "from: ".$_REQUEST['email']);
    header("location: /AboutMe.php");
    exit;
}