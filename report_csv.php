<?php
require_once 'database.php';
header('Content-Type: text/csv');
header('Content-Disposition:attachment; filename=report.csv;');

$since = $_POST['sinceDate'];
$cutOfDate = $_POST['cutOfDate'];

$since = cleanVariable($since);
$isValidSince = validateDate($since);

$cutOfDate = cleanVariable($cutOfDate);
$isValidCutOfDate = validateDate($cutOfDate);

try{
    if( $isValidSince == true && $isValidCutOfDate == true ){
        $db = DbConnect::getInstance();
        $con = $db->connection();
        $sql = "SELECT FECHA, CORRIENTE, TEMPERATURA, IRRADIANCIA, VOLTAJE_BATT AS VOLTAJE_BATERIA, SLEEP_MODE
                    FROM testdb.data WHERE FECHA BETWEEN  '$since 00:00' AND '$cutOfDate 23:59'";
        $result = $con->query($sql);
        
        $data =  'Fecha y hora;Corriente;Temperatura;Irradiancia;Voltaje de bateria'."\n";
        while( $row = $result->fetch(PDO::FETCH_ASSOC)){
            $data .= $row["FECHA"].";" .$row["CORRIENTE"].";".$row["TEMPERATURA"].";".$row["IRRADIANCIA"].";".$row["VOLTAJE_BATERIA"]."\n";
        }
        echo $data;

    } else{
        echo 'Tuvimos problemas con las fechas que ingresaste, verifica que sean las correctas. Si es un error nuestro comunicate con nosotros.'; 
    }
    
}catch(Exception $e){
    echo 'No hay datos que mostrar';
}

$con = null;

function validateDate( $cleanDate ){
    $dateRegex = "/^(19|20)(((([02468][048])|([13579][26]))-02-29)|(\d{2})-((02-((0[1-9])|1\d|2[0-8]))|((((0[13456789])|1[012]))-((0[1-9])|((1|2)\d)|30))|(((0[13578])|(1[02]))-31)))$/";
    try{    
        if( preg_match( $dateRegex, $cleanDate, $matchDate ) ){
            return true;
        }
        return false;
    }catch(Exception $error){
        return false;
    }
}

function cleanVariable($parameter){
    $parameter = trim($parameter);
    $parameter = stripslashes($parameter);
    $pattern = '/(DROP TABLE|SELECT \* FROM|TRUNCATE TABLE|SHOW TABLES|\<|==|\s|\<?php|\?|\/|--|\:|\;|script|\>|\^|\[|\]|DELETE FROM|INSERT INTO|DROP DATABASE|SHOW DATABASE)/i';
    return str_ireplace($pattern, "", $parameter);
}
