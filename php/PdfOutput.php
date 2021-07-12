<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/lib/fpdf.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/php/CharacterClass.php';

class PDF extends FPDF{
    function Footer()
    {
        $this->SetY(-10);
        $this->SetFont('Arial', 'I', 6);
        $this->SetTextColor(200);
        $this->Cell( 0, 9, 'Character created using retroDUD.eu!', 0, 0, 'R');
    }
}

$imagick = new Imagick();
$pdf = new PDF();

$pdf->AddPage();

//Set Name
$pdf->SetFont('Arial', '', 16);
$pdf->Image($_SERVER['DOCUMENT_ROOT'].'/lib/CharacterSheet.jpg', 0, 0, 210, 297);

$pdf->SetXY(15, 25);
$pdf->Cell(70, 4, $_SESSION['name']);

//Set Base info
$pdf->SetFont('', '', 12);

$pdf->SetXY(91, 19);
$pdf->Cell(70, 4, $_SESSION['class']." 1");
$pdf->SetXY(128, 19);
$pdf->Cell(70, 4, $_SESSION['background']);
$pdf->SetXY(168, 19);
//$pdf->Cell(70, 4, htmlspecialchars($_SESSION["username"]));

$pdf->SetXY(91, 29);
$pdf->Cell(70, 4, $_SESSION['race']);
$pdf->SetXY(128, 29);
$pdf->Cell(70, 4, $_SESSION['alignment']);
$pdf->SetXY(168, 29);
$pdf->Cell(70, 4, '0');

//Set Attributes
$pdf->SetFont('', '', 16);
$pdf->SetXY(12, 62);
$pdf->Cell(15, 4, $_SESSION['attributes']['strenght'], 0, 0, 'C');
$pdf->SetXY(12, 89);
$pdf->Cell(15, 4, $_SESSION['attributes']['dexterity'], 0, 0, 'C');
$pdf->SetXY(12, 116);
$pdf->Cell(15, 4, $_SESSION['attributes']['constitution'], 0, 0, 'C');
$pdf->SetXY(12, 143);
$pdf->Cell(15, 4, $_SESSION['attributes']['inteligence'], 0, 0, 'C');
$pdf->SetXY(12, 170);
$pdf->Cell(15, 4, $_SESSION['attributes']['wisdom'], 0, 0, 'C');
$pdf->SetXY(12, 197);
$pdf->Cell(15, 4, $_SESSION['attributes']['charisma'], 0, 0, 'C');

//Set Perception and other proficiencies and languages
$pdf->SetFont('', '', 10);
$pdf->SetXY(7, 222);
$pdf->Cell(15, 4, $_SESSION['perception'], 0, 0, 'C');

$pdf->SetXY(10, 235);
$pdf->Multicell(56, 4, arrayToString($_SESSION['proficienciesAndLanguages']), 0 , 1);

//Set Inspiration, proficiency bonus, Saving Throws and Skills
$pdf->SetFont('', '', 8);
$pdf->SetXY(30, 50);
$pdf->Cell(15, 4, '0', 0, 0, 'C');
$pdf->SetXY(30, 64);
$pdf->Cell(15, 4, $_SESSION['proficiency'], 0, 0, 'C');

$pdf->SetXY(33, 77);
$pdf->Cell(15, 4, $_SESSION['savingThrows']['strenght'], 0, 0, 'C');
$pdf->SetXY(33, 82);
$pdf->Cell(15, 4, $_SESSION['savingThrows']['dexterity'], 0, 0, 'C');
$pdf->SetXY(33, 87);
$pdf->Cell(15, 4, $_SESSION['savingThrows']['constitution'], 0, 0, 'C');
$pdf->SetXY(33, 92);
$pdf->Cell(15, 4, $_SESSION['savingThrows']['inteligence'], 0, 0, 'C');
$pdf->SetXY(33, 97);
$pdf->Cell(15, 4, $_SESSION['savingThrows']['wisdom'], 0, 0, 'C');
$pdf->SetXY(33,102);
$pdf->Cell(15, 4, $_SESSION['savingThrows']['charisma'], 0, 0, 'C');

$pdf->SetXY(33, 120);
$pdf->Cell(15, 4, $_SESSION['skills']['acrobatics'], 0, 0, 'C');
$pdf->SetXY(33, 125);
$pdf->Cell(15, 4, $_SESSION['skills']['animalHandling'], 0, 0, 'C');
$pdf->SetXY(33, 130);
$pdf->Cell(15, 4, $_SESSION['skills']['arcana'], 0, 0, 'C');
$pdf->SetXY(33, 135);
$pdf->Cell(15, 4, $_SESSION['skills']['athletics'], 0, 0, 'C');
$pdf->SetXY(33, 140);
$pdf->Cell(15, 4, $_SESSION['skills']['deception'], 0, 0, 'C');
$pdf->SetXY(33, 145);
$pdf->Cell(15, 4, $_SESSION['skills']['history'], 0, 0, 'C');
$pdf->SetXY(33, 150);
$pdf->Cell(15, 4, $_SESSION['skills']['insight'], 0, 0, 'C');
$pdf->SetXY(33, 155);
$pdf->Cell(15, 4, $_SESSION['skills']['intimidation'], 0, 0, 'C');
$pdf->SetXY(33, 160);
$pdf->Cell(15, 4, $_SESSION['skills']['investigation'], 0, 0, 'C');
$pdf->SetXY(33, 165);
$pdf->Cell(15, 4, $_SESSION['skills']['medicine'], 0, 0, 'C');
$pdf->SetXY(33, 170);
$pdf->Cell(15, 4, $_SESSION['skills']['nature'], 0, 0, 'C');
$pdf->SetXY(33, 175);
$pdf->Cell(15, 4, $_SESSION['skills']['perception'], 0, 0, 'C');
$pdf->SetXY(33, 180);
$pdf->Cell(15, 4, $_SESSION['skills']['performance'], 0, 0, 'C');
$pdf->SetXY(33, 185);
$pdf->Cell(15, 4, $_SESSION['skills']['persuasion'], 0, 0, 'C');
$pdf->SetXY(33, 190);
$pdf->Cell(15, 4, $_SESSION['skills']['religion'], 0, 0, 'C');
$pdf->SetXY(33, 195);
$pdf->Cell(15, 4, $_SESSION['skills']['sleightOfHand'], 0, 0, 'C');
$pdf->SetXY(33, 200);
$pdf->Cell(15, 4, $_SESSION['skills']['stealth'], 0, 0, 'C');
$pdf->SetXY(33, 205);
$pdf->Cell(15, 4, $_SESSION['skills']['survival'], 0, 0, 'C');

//Set Armor, initiative, speed, HP, HitDice, attacks and equipment
$pdf->SetFont('', '', 14);
$pdf->SetXY(78, 56);
$pdf->Cell(15, 4, $_SESSION['armor'], 0, 0, 'C');
$pdf->SetXY(97, 56);
$pdf->Cell(15, 4, $_SESSION['initiative'], 0, 0, 'C');
$pdf->SetXY(117, 56);
$pdf->Cell(15, 4, $_SESSION['speed'], 0, 0, 'C');

$pdf->SetFont('', '', 10);
$pdf->SetXY(99, 73);
$pdf->Cell(15, 4, $_SESSION['hitPoints']);

$pdf->SetFont('', '', 14);
$pdf->SetXY(86, 126);
$pdf->Cell(15, 4, $_SESSION['hitDice'], 0, 0, 'C');

$pdf->SetFont('', '', 10);
$pdf->SetXY(76, 148);
$pdf->Cell(15, 4, $_SESSION['attacks'][0][0]);
$pdf->SetXY(100, 148);
$pdf->Cell(15, 4, $_SESSION['attacks'][0][1]);
$pdf->SetXY(112, 148);
$pdf->Cell(15, 4, $_SESSION['attacks'][0][4]);
$tmpI = 1;
//Miltiple attack in 8u incriments
if(isset($_SESSION['attacks'][1])){
    $pdf->SetXY(76, 156);
    $pdf->Cell(15, 4, $_SESSION['attacks'][1][0]);
    $pdf->SetXY(100, 156);
    $pdf->Cell(15, 4, $_SESSION['attacks'][1][1]);
    $pdf->SetXY(112, 156);
    $pdf->Cell(15, 4, $_SESSION['attacks'][1][4]);
    $tmpI++;
}
if(isset($_SESSION['attacks'][2])){
    $pdf->SetXY(76, 164);
    $pdf->Cell(15, 4, $_SESSION['attacks'][2][0]);
    $pdf->SetXY(100, 164);
    $pdf->Cell(15, 4, $_SESSION['attacks'][2][1]);
    $pdf->SetXY(112, 164);
    $pdf->Cell(15, 4, $_SESSION['attacks'][2][4]);
    $pdf->SetFont('', '', 8);
    $tmpI ++;
}
$pdf->SetXY(75, 173);
$tmpTxt = "";
for($i = 0; $i < $tmpI; $i++){
    $tmpTxt .= $_SESSION['attacks'][$i][0]." comment: ".$_SESSION['attacks'][$i][5]."\n";
}
$pdf->Multicell(56, 4, $tmpTxt, 0, 2);
unset($tmpI);
unset($tmpTxt);

$pdf->SetFont('', '', 14);
$pdf->SetXY(76, 226);
$pdf->Cell(15, 4, $_SESSION['money']['CP'], 0, 0, 'C');
$pdf->SetXY(76, 236);
$pdf->Cell(15, 4, $_SESSION['money']['SP'], 0, 0, 'C');
$pdf->SetXY(76, 246);
$pdf->Cell(15, 4, $_SESSION['money']['EP'], 0, 0, 'C');
$pdf->SetXY(76, 255);
$pdf->Cell(15, 4, $_SESSION['money']['GP'], 0, 0, 'C');
$pdf->SetXY(76, 226);
$pdf->Cell(15, 4, $_SESSION['money']['CP'], 0, 0, 'C');
$pdf->SetXY(76, 236);
$pdf->Cell(15, 4, $_SESSION['money']['SP'], 0, 0, 'C');
$pdf->SetXY(76, 246);
$pdf->Cell(15, 4, $_SESSION['money']['EP'], 0, 0, 'C');
$pdf->SetXY(76, 255);
$pdf->Cell(15, 4, $_SESSION['money']['GP'], 0, 0, 'C');
$pdf->SetXY(76, 265);
$pdf->Cell(15, 4, $_SESSION['money']['PP'], 0, 0, 'C');

$pdf->SetFont('', '', 8);
$pdf->SetXY(92, 223);
$pdf->Multicell(48, 4, arrayToString($_SESSION['equipment'], false, true));

//Set Personality traits, ideals, bonds, flaws and features
$pdf->SetFont('', '', 10);
$pdf->SetXY(143, 52);
$pdf->Multicell(54, 4, $_SESSION['personalityTraits']);
$pdf->SetXY(143, 78);
$pdf->Multicell(54, 4, $_SESSION['ideals']);
$pdf->SetXY(143, 98);
$pdf->Multicell(54, 4, $_SESSION['bonds']);
$pdf->SetXY(143, 119);
$pdf->Multicell(54, 4, $_SESSION['flaws']);
$pdf->SetXY(141, 144);
$pdf->Multicell(56, 4, arrayToString($_SESSION['features']));

if(isset($file)){
    $pdf->Output('F', substr($file, 0, -4).".pdf");
    $imagick->readImage(substr($file, 0, -4).".pdf");
    $imagick->writeImages(substr($file, 0, -4).".jpg", false);
}elseif(isset($_SESSION['date'])){
    $pdf->Output('F', $_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes'].".pdf");
    $imagick->readImage($_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes'].".pdf");
    $imagick->writeImages($_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$_SESSION['name']."_".$_SESSION['date']['year']."-".$_SESSION['date']['mon']."-".$_SESSION['date']['mday']."_".$_SESSION['date']['hours']."-".$_SESSION['date']['minutes'].".jpg", false);
}else{
    $pdf->Output('F', $_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$_SESSION['name'].".pdf");
    $imagick->readImage($_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$_SESSION['name'].".pdf");
    $imagick->writeImages($_SERVER['DOCUMENT_ROOT']."/".$_SESSION['folder'].$_SESSION['name'].".jpg", false);
}