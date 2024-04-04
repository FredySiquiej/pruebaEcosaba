<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = "admin"; $nombreBaseDatos = "pasteleria";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);

//Pastel*********************************************************************************************************
//***************************************************************************************************************
// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar"])){
    $sqlPastel = mysqli_query($conexionBD,"SELECT * FROM pastel WHERE id_pastel=".$_GET["consultar"]);
    if(mysqli_num_rows($sqlPastel) > 0){
        $pastel = mysqli_fetch_all($sqlPastel,MYSQLI_ASSOC);
        echo json_encode($pastel);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

if (isset($_GET["consultar_all"])){
    $sqlPastel = mysqli_query($conexionBD,"SELECT * FROM pastel ");
    if(mysqli_num_rows($sqlPastel) > 0){
        $pastel = mysqli_fetch_all($sqlPastel,MYSQLI_ASSOC);
        echo json_encode($pastel);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar"])){
    $sqlPastel = mysqli_query($conexionBD,"DELETE FROM pastel WHERE id_pastel=".$_GET["borrar"]);
    if($sqlPastel){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos de nombre y correo
if(isset($_GET["insertar"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre = $data->nombre;
    $descripcion = $data->descripcion;
    $preparado_por = $data->preparado_por;
    $fecha_creacion = $data->fecha_creacion;
    $fecha_vencimiento = $data->fecha_vencimiento;
    
    if(($nombre != "") && ($descripcion != "") && ($preparado_por != "") && ($fecha_creacion != "") && ($fecha_vencimiento != "")){
        $sqlPasteles = mysqli_query($conexionBD, "INSERT INTO pastel(nombre, descripcion, preparado_por, fecha_creacion, fecha_vencimiento) VALUES('$nombre', '$descripcion', '$preparado_por', '$fecha_creacion', '$fecha_vencimiento')");
        echo json_encode(["success" => 1]);
    } else {
        echo json_encode(["success" => 0, "message" => "Falta uno o más campos requeridos."]);
    }
    exit();
}


// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización

if(isset($_GET["actualizar"])){
    $data = json_decode(file_get_contents("php://input"));

    $id = (isset($data->id)) ? $data->id : $_GET["actualizar"];
    $nombre = $data->nombre;
    $descripcion = $data->descripcion;
    $preparado_por = $data->preparado_por;
    $fecha_creacion = $data->fecha_creacion;
    $fecha_vencimiento = $data->fecha_vencimiento;

    $sqlPasteles = mysqli_query($conexionBD, "UPDATE pastel SET nombre='$nombre', descripcion='$descripcion', preparado_por='$preparado_por', fecha_creacion='$fecha_creacion', fecha_vencimiento='$fecha_vencimiento' WHERE id_pastel='$id'");
    echo json_encode(["success" => 1]);
    exit();
}


//Ingrediente***************************************************************************************************
//*************************************************************************************************************

// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar_ing"])){
    $sqlIngrediente = mysqli_query($conexionBD,"SELECT * FROM ingrediente WHERE id_ingrediente=".$_GET["consultar_ing"]);
    if(mysqli_num_rows($sqlIngrediente) > 0){
        $ingrediente = mysqli_fetch_all($sqlIngrediente,MYSQLI_ASSOC);
        echo json_encode($ingrediente);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

if (isset($_GET["consultar_ing_all"])){
    $sqlIngrediente = mysqli_query($conexionBD,"SELECT * FROM ingrediente ");
    if(mysqli_num_rows($sqlIngrediente) > 0){
        $ingrediente = mysqli_fetch_all($sqlIngrediente,MYSQLI_ASSOC);
        echo json_encode($ingrediente);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar_ing"])){
    $sqlIngrediente = mysqli_query($conexionBD,"DELETE FROM ingrediente WHERE id_ingrediente=".$_GET["borrar_ing"]);
    if($sqlIngrediente){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos de nombre y correo

if(isset($_GET["insertar_ing"])){
    $data = json_decode(file_get_contents("php://input"));
    $nombre = $data->nombre;
    $descripcion = $data->descripcion;
    $fecha_ingreso = $data->fecha_ingreso;
    $fecha_vencimiento = $data->fecha_vencimiento;
    
    if(($nombre != "") && ($descripcion != "") && ($fecha_ingreso != "") && ($fecha_vencimiento != "")){
        $sqlInsertar = mysqli_query($conexionBD, "INSERT INTO ingrediente(nombre, descripcion, fecha_ingreso, fecha_vencimiento) VALUES('$nombre', '$descripcion', '$fecha_ingreso', '$fecha_vencimiento')");
        if ($sqlInsertar) {
            echo json_encode(["success" => 1]);
        } else {
            echo json_encode(["success" => 0, "message" => "Error al insertar el ingrediente."]);
        }
    } else {
        echo json_encode(["success" => 0, "message" => "Falta uno o más campos requeridos."]);
    }
    exit();
}



// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización

if(isset($_GET["actualizar_ing"])){
    $data = json_decode(file_get_contents("php://input"));

    $id = (isset($data->id)) ? $data->id : $_GET["actualizar_ing"];
    $nombre = $data->nombre;
    $descripcion = $data->descripcion;
    $fecha_ingreso = $data->fecha_ingreso;
    $fecha_vencimiento = $data->fecha_vencimiento;

    $sqlActualizar = mysqli_query($conexionBD, "UPDATE ingrediente SET nombre='$nombre', descripcion='$descripcion', fecha_ingreso='$fecha_ingreso', fecha_vencimiento='$fecha_vencimiento' WHERE id_ingrediente='$id'");
    if ($sqlActualizar) {
        echo json_encode(["success" => 1]);
    } else {
        echo json_encode(["success" => 0, "message" => "Error al actualizar el ingrediente."]);
    }
    exit();
}

//Pastel_Ingredientes **********************************************************************************************
//*******************************************************************************************************************



// Consulta datos y recepciona una clave para consultar dichos datos con dicha clave
if (isset($_GET["consultar_pi"])){
    $sqlpastelIngrediente = mysqli_query($conexionBD,"SELECT * FROM pastel_ingredientes WHERE id_pastel_ingrediente=".$_GET["consultar_pi"]);
    if(mysqli_num_rows($sqlpastelIngrediente) > 0){
        $pastelIngrediente = mysqli_fetch_all($sqlpastelIngrediente,MYSQLI_ASSOC);
        echo json_encode($pastelIngrediente);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

if (isset($_GET["consultar_pi_all"])){
    $sqlpastelIngrediente = mysqli_query($conexionBD,"SELECT * FROM pastel_ingredientes ");
    if(mysqli_num_rows($sqlpastelIngrediente) > 0){
        $pastelIngrediente = mysqli_fetch_all($sqlpastelIngrediente,MYSQLI_ASSOC);
        echo json_encode($pastelIngrediente);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}

//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar_pi"])){
    $pastelIngrediente = mysqli_query($conexionBD,"DELETE FROM pastel_ingredientes WHERE id_pastel_ingrediente=".$_GET["borrar_pi"]);
    if($pastelIngrediente){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
//Inserta un nuevo registro y recepciona en método post los datos de nombre y correo

if(isset($_GET["insertar_pi"])){
    $data = json_decode(file_get_contents("php://input"));
    $id_pastel = $data->id_pastel;
    $id_ingrediente = $data->id_ingrediente;
  
    
    if(($id_pastel != "") && ($id_ingrediente != "") ){
        $sqlInsertar = mysqli_query($conexionBD, "INSERT INTO pastel_ingredientes(id_pastel, id_ingrediente) VALUES('$id_pastel', '$id_ingrediente')");
        if ($sqlInsertar) {
            echo json_encode(["success" => 1]);
        } else {
            echo json_encode(["success" => 0, "message" => "Error al insertar el ingrediente."]);
        }
    } else {
        echo json_encode(["success" => 0, "message" => "Falta uno o más campos requeridos."]);
    }
    exit();
}



// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización


if(isset($_GET["actualizar_pi"])){
    $data = json_decode(file_get_contents("php://input"));

    $id = (isset($data->id)) ? $data->id : $_GET["actualizar_pi"];
    $id_pastel = $data->id_pastel;
    $id_ingrediente = $data->id_ingrediente;

    $sqlActualizar = mysqli_query($conexionBD, "UPDATE pastel_ingredientes SET id_pastel='$id_pastel', id_ingrediente='$id_ingrediente' WHERE id_pastel_ingrediente='$id'");
    if ($sqlActualizar) {
        echo json_encode(["success" => 1]);
    } else {
        echo json_encode(["success" => 0, "message" => "Error al actualizar el ingrediente."]);
    }
    exit();
}


?>
