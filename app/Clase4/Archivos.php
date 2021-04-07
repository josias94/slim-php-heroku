<?php  

function EscribirArchivoJSON($file_name, $Obj){
    $pudo = 0;    
    if (!file_exists($file_name) || filesize($file_name) == 0){
        $file = fopen($file_name, "w");
        $array[0] = $Obj;
        $pudo = fwrite($file, json_encode($array));
        fclose($file);
    }
    else{
        $file = fopen($file_name, "c");
        fseek($file, filesize($file_name)-1);        
        $pudo = fwrite($file, ",".json_encode($Obj)."]");        
        fclose($file);
    }
    return $pudo;
}

function LeerArchivoJSON($file_name){
    $array = [];    
    if (file_exists($file_name) && filesize($file_name) > 0){
        $file = fopen($file_name, "r");
        $contenido = fread($file, filesize($file_name));
        $array = json_decode($contenido);
        fclose($file);
    }    
    return $array;
}


function EscribirArchivoTxt($file_name, $msg){    
    $pudo = 0;
    if (!file_exists($file_name) || filesize($file_name) == 0){
        $file = fopen($file_name, "w");
        $pudo = fwrite($file, $msg);
        fclose($file);
    }
    else{
        $file = fopen($file_name, "a");        
        $pudo = fwrite($file, "\n".$msg);
        fclose($file);
    }
    return $pudo;
}

function LeerArchivoTxt($file_name){
    $array = [];
    if (file_exists($file_name) && filesize($file_name) > 0){
        $file = fopen($file_name, "r");
        $contenido = fread($file, filesize($file_name));
        $array = explode("\n",$contenido);
        fclose($file);
    }    
    return $array;
}

function MoveFile($file, $destino, $backup){
    $tipo = explode(".",$file["name"]);
    $destino .= ".".$tipo[1];    
    $backup .= date("d-m-Y-H-i-s").".".$tipo[1];

    if(file_exists($destino)){        
        rename($destino, $backup);
    }    
    move_uploaded_file($file["tmp_name"], $destino);
}

?>