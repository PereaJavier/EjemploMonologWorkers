<?php
    require './vendor/autoload.php';
    $log = new Monolog\Logger("LogTransportManagementDB");
    $log->pushHandler(new Monolog\Handler\StreamHandler("logs/TManagement.log",Monolog\Logger::INFO));

    //BBDD
    $db = parse_ini_file("conf/miConf.ini");
    $mysqli = new mysqli($db["host"],$db["user"],$db["pwd"],$db["db_name"]);
    if($mysqli->connect_errno){
        $log->error("No se ha podido conectar a la BBDD: " . $mysqli->connect_error);
    }else{
        //Aquí hará las operaciones correspondientes.
        $log->info("Se ha podido conectar a la BBDD");
        $sql_sentence = "INSERT INTO worker(dni,name_w,surname_w,salary,tlf) 
        VALUES('144a','juan','gonzález',20000,'1331221')";
        $resultado = $mysqli->query($sql_sentence);
        if($resultado){
            $log->info("Se ha producido la inserción del trabajador especificado");
        }else{
            $log->warning("No se ha producido la inserción del trabajador especificado");
        }
    }
?>