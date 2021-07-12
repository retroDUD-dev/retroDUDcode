<?php

    $noSpace = " \n\r\t\v\0";

    function typing($string){
        for ($i=0; $i < strlen($string); $i++) { 
            echo $string[$i];
            if(ctype_space($string[$i])){
                usleep(70000);
            }else{
                usleep(50000);
            }
            usleep(10000);
        }
    }

    function validateString($string){
        $arguments = func_get_args();
        array_shift($arguments);
        $string = htmlspecialchars($string);
        $string = trim($string, implode("", $arguments));
        $string = stripslashes($string);
        return $string;
    }

    function arrayToString(array $arr, bool $html = FALSE, bool $noKey = false, string $r = ""){        
        if($noKey){
            if($html){
                for ($i=0; $i < count($arr); $i++) {
                    if(gettype($arr[$i]) === "array"){
                        $r .= arrayToString($arr[$i], $html, true);
                    }else{
                        if($i + 1 < count($arr)){
                            $r .= $arr[$i].", ";                            
                        }else{
                            $r .= $arr[$i].";<br>";
                        }
                    }
                }
            }else{
                for ($i=0; $i < count($arr); $i++) {
                    if(gettype($arr[$i]) === "array"){
                        $r .= arrayToString($arr[$i], $html, true);
                    }else{
                        if($i + 1 < count($arr)){
                            $r .= $arr[$i].", ";                            
                        }else{
                            $r .= $arr[$i].";\n";
                        }
                    }
                }
            }
            return $r;
        }

        $arrKeys = array_keys($arr);
        $arrValues = array();
        $i = 0;
        foreach ($arr as $value) { 
            $arrValues[$i++] = $value;
        }
        if($html){
            for ($i=0; $i < count($arrValues); $i++) {
                if(gettype($arrValues[$i]) === "array"){
                    $r .= arrayToString($arrValues[$i], $html);
                }else{
                    $r .= "\"".$arrKeys[$i]."\": ".$arrValues[$i].",<br>";
                }
            }
        }else{
            for ($i=0; $i < count($arrValues); $i++) {
                if(gettype($arrValues[$i]) === "array"){
                    $r .= arrayToString($arrValues[$i], $html);
                }else{ 
                    $r .= "\"".$arrKeys[$i]."\": ".$arrValues[$i].", \n";
                }
            }
        }
        return $r;
    }

    function stringToArray(string $str){
        $tmp = preg_split("./[\s,]+/", $str);
        $r = array();
        for($i = 0; $i < count($tmp); $i += 2){
            $tmp[$i] = substr($tmp[$i], 1, -2);
            $r[$tmp[$i]] = $tmp[$i+1];
        }
        return $r;
    }

    function fileOutput(string $str, string $fileName){
//        $txt = openssl_encrypt($str, 'aes-256-ctr', 'NiceKey-MyDude');
        $fileName = trim($fileName.".chr");
        $handle = fopen($fileName, "w");
        $r = fwrite($handle, $str, strlen($str));
        fclose($handle);
        return $r;
    }

    function fileInput(string $file){
        $end = substr($file, strlen($file) - 4);
        $file = substr($file, 0, -4);
        if($end === '.chr'){
            $lenght = filesize($file);
            $handle = fopen($file, "r");
            $r = fread($handle,$lenght);
            fclose($handle);
            if($r){
//                return openssl_decrypt($r, 'aes-256-ctr', 'NiceKey-MyDude');
                return $r;
            }else{
                return $r;
            }
        }else{
            return false;
        }
    }

    function search(){
        include_once $_SERVER['DOCUMENT_ROOT'].'/php/config.php';

        // Check connection
        if ($mysqli->connect_error) {
          die("Connection failed: " . $mysqli->connect_error);
        }
        $sql = "SELECT name, class, level, race, user, isPublic, file FROM Characters where (isPublic = '1' or user = '".$_SESSION['username']."')";
        if(isset($_REQUEST['searchByUser']) && $_REQUEST['searchByUser'] !== ""){
            $sql .= " and user = '".$_REQUEST['searchByUser']."'";
        }
        if(isset($_REQUEST['searchByClass']) && $_REQUEST['searchByClass'] !== ""){
            $sql .= " and class = '".$_REQUEST['searchByClass']."'";
        }
        if(isset($_REQUEST['searchByLevel']) && $_REQUEST['searchByLevel'] > 0){
            $sql .= " and level = '".$_REQUEST['searchByLevel']."'";
        }
        if(isset($_REQUEST['searchByName']) && $_REQUEST['searchByName'] !== ""){
            $sql .= " and name = '".$_REQUEST['searchByName']."'";
        }
        $result = $mysqli->query($sql);
        
        if ($result->num_rows > 0) {
            $_SESSION['files'] = 0;
            $rowCount = 0;
            // output data of each row
            echo "<form id='downloadCh' action='php/ioHandler.php' method='post'>";
            if(isset($_REQUEST['searchMine']) && $_REQUEST['searchMine']){
                while($row = $result->fetch_assoc()) {
                    if($row['isPublic'] === "1" && $row['user'] === $_SESSION['username']){
                        echo "<div class='text innerContainer' style='height: 50px; vertical-align: middle; padding-top:25px; padding-left: 10px; padding-right: 10px; margin: 0px;'>".$row['name'].", "." level ".$row['level']." ".$row['race']." ".$row['class']."; created publicly by <b>you.</b><label for='downloadC' class ='submit button'>Download pdf<input style='display: none;' id='downloadC' type='submit' form='downloadCh' name='downloadChar' value='".substr($row['file'], 0, -4).".pdf'></label><label for='deleteC' class='submit button'>delete<input style='display: none;' id='deleteC' type='submit' form='downloadCh' name='deleteChar' value='".$row['file']."'></label></div><br>";
                    }elseif($row['user'] === $_SESSION['username']){
                        echo "<div class='text innerContainer' style='height: 50px; vertical-align: middle; padding-top:25px; padding-left: 10px; padding-right: 10px; margin: 0px;'>".$row['name'].", "." level ".$row['level']." ".$row['race']." ".$row['class']."; created privately by <b>you.</b><label for='downloadC' class ='submit button'>Download pdf<input style='display: none;' id='downloadC' type='submit' form='downloadCh' name='downloadChar' value='".substr($row['file'], 0, -4).".pdf'></label><label for='deleteC' class='submit button'>delete<input style='display: none;' id='deleteC' type='submit' form='downloadCh' name='deleteChar' value='".$row['file']."'></label></div><br>";
                    }
                    $rowCount++;
                }
            }else{
                while($row = $result->fetch_assoc()) {
                    if($row['isPublic'] === "1" && $row['user'] === $_SESSION['username']){
                        echo "<div class='text innerContainer' style='height: 50px; vertical-align: middle; padding-top:25px; padding-left: 10px; padding-right: 10px; margin: 0px;'>".$row['name'].", "." level ".$row['level']." ".$row['race']." ".$row['class']."; created publicly by <b>you.</b><label for='downloadC' class ='submit button'>Download pdf<input style='display: none;' id='downloadC' type='submit' form='downloadCh' name='downloadChar' value='".substr($row['file'], 0, -4).".pdf'></label><label for='deleteC' class='submit button'>delete<input style='display: none;' id='deleteC' type='submit' form='downloadCh' name='deleteChar' value='".$row['file']."'></label></div><br>";
                    }elseif($row['user'] === $_SESSION['username']){
                        echo "<div class='text innerContainer' style='height: 50px; vertical-align: middle; padding-top:25px; padding-left: 10px; padding-right: 10px; margin: 0px;'>".$row['name'].", "." level ".$row['level']." ".$row['race']." ".$row['class']."; created privately by <b>you.</b><label for='downloadC' class ='submit button'>Download pdf<input style='display: none;' id='downloadC' type='submit' form='downloadCh' name='downloadChar' value='".substr($row['file'], 0, -4).".pdf'></label><label for='deleteC' class='submit button'>delete<input style='display: none;' id='deleteC' type='submit' form='downloadCh' name='deleteChar' value='".$row['file']."'></label></div><br>";
                    }else{
                        echo "<div class='text innerContainer' style='height: 50px; vertical-align: middle; padding-top:25px; padding-left: 10px; padding-right: 10px; margin: 0px;'>".$row['name'].", "." level ".$row['level']." ".$row['race']." ".$row['class']."; created publicly by <b>".$row['user']."</b><label for='downloadC' class ='submit button'>Download pdf<input style='display: none;' id='downloadC' type='submit' form='downloadCh' name='downloadChar' value='".substr($row['file'], 0, -4).".pdf'></label></div><br>";
                    }
                    $rowCount++;
                }
            }
            echo "</form>";
        } else {
          echo "<div class='text'>0 results</div>";
        }
        $mysqli->close();
        $_SESSION['files'] = $rowCount;
        $rowCount = null;
        unset($rowCount);
    }