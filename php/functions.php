<?php

//GET COENXION
$conexion = generateConexion('localhost',null,'demo','root','');
//GET CRUD
$result = generateCrud("SELECT * FROM clientes WHERE id_cliente = 1",$conexion,'read','');

//GENERATE CONEXION
function generateConexion($host, $port, $db, $root, $pass){
  $checkConexion = mysqli_connect($host,$root,$pass,$db,$port);
  if(!$checkConexion){
      echo 'Message error: '.mysqli_connect_error();
  }else{
      return $checkConexion;
  }
}

//GENERATE CRUD
function generateCrud($sql, $link,$typecrud,$message){
    if($typecrud == 'create'){
        $search = mysqli_query($link, $sql);
        if($search){
            if($result = mysqli_affected_rows($link)){
                return $message;
            }
        }else{
            return 'Message error: '.mysqli_error($link);
        }
    }
    if($typecrud == 'read'){
        $search = mysqli_query($link, $sql);
        if($search){
            if(mysqli_num_rows($search)> 0){
                return  $message.$search;
            }else{
                return 'Message error: Data not exists';
            }
        }else{
            return 'Message error: '.mysqli_error($link);
        }
    }
    if($typecrud == 'update'){
        $search = mysqli_query($link, $sql);
        if($search){
            if($result = mysqli_affected_rows($link)){
                return $message;
            }else{
                if($result == 0){
                    return 'Message: Data Update before';
                }else{
                    return 'Message error: '.mysqli_error($link);
                }
            }
        }else{
            return 'Message error: '.mysqli_error($link);
        }
    }
    if($typecrud == 'delete'){
        $search = mysqli_query($link, $sql);
        if($search){
            if($result = mysqli_affected_rows($link)){
                return $message;
            }else{
                if($result == 0){
                    return 'Message: Data Delete before';
                }else{
                    return 'Message error: '.mysqli_error($link);
                }
            }
        }else{
            return 'Message error: '.mysqli_error($link);
        }
    }
}

function generateAddFiles($file,$routeFile,$message){
    $dataFile = $file;
    $dataFileStatus = move_uploaded_file($dataFile["tmp_name"], $routeFile);
    if($dataFileStatus == 1){
        return $message;
    }else{
        return 'Message error: File Not Updated';
    }
}

function generateDate($message){
    return $message.date("Y-m-d");
}
function generateFullDate($message){
    return $message.date("F j, Y, g:i a");
}
function generateHours($message){
    return date("H:i:s"); 
}
?>
