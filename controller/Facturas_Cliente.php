<?php
//CONFIGURACIONES FIJAS
if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/facturas_cliente.php");
    $facturas = new Facturas();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        //caso para mostrar los datos sin parametro especifico
        case "GetFacturas":
            $datos=$facturas->get_facturas();
            echo json_encode($datos);
        break;
        //caso para mostrar los datos con parametro especifico
        case "GetFactura":
            $datos=$facturas->get_factura($body["ID"]);
            echo json_encode($datos);
        break;
        //caso para insertar facturas
        case "InsertFactura":
            $datos=$facturas->insert_facturas($body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
            echo json_encode("Factura CLiente Agregada");
        break;
        //caso para actualizar facturas
        case "UpdateFactura":
            $datos=$facturas->update_facturas($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
            echo json_encode("Factura Cliente Actualizada");
        break;
        //caso para eliminar facturas
        case "DeleteFactura":
            $datos=$facturas->delete_facturas($body["ID"]);
            echo json_encode("Factura Cliente Eliminada");
        break;
    }   
?>