<?php
    class Facturas extends Conectar{
        //funcion para OBTENER DATOS
        public function get_facturas(){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas_cliente";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //funcion para obtener datos por medio del ID
        public function get_factura($ID){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="SELECT * FROM ma_facturas_cliente WHERE ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //funcion para insertar facturas
        public function insert_facturas($numerofactura, $idsocio, $fechafactura, $detalle, $subtotal, $totalisv, $total, $fechavencimiento, $estado){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="INSERT INTO ma_facturas_cliente(id, numero_factura, id_socio, fecha_factura, detalle, sub_total, total_isv, total, fecha_vencimiento, estado)
            VALUES (null,?,?,?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$numerofactura);
            $sql->bindValue(2,$idsocio);
            $sql->bindValue(3,$fechafactura);
            $sql->bindValue(4,$detalle);
            $sql->bindValue(5,$subtotal);
            $sql->bindValue(6,$totalisv);
            $sql->bindValue(7,$total);
            $sql->bindValue(8,$fechavencimiento);
            $sql->bindValue(9,$estado);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //funcion para actualizar facturas
        public function update_facturas($id,$numerofactura, $idsocio, $fechafactura, $detalle, $subtotal, $totalisv, $total, $fechavencimiento, $estado){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="UPDATE ma_facturas_cliente SET numero_factura=?, id_socio=?, fecha_factura=?, detalle=?, sub_total=?, total_isv=?, total=?, fecha_vencimiento=?, estado=? WHERE id=?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$numerofactura);
            $sql->bindValue(2,$idsocio);
            $sql->bindValue(3,$fechafactura);
            $sql->bindValue(4,$detalle);
            $sql->bindValue(5,$subtotal);
            $sql->bindValue(6,$totalisv);
            $sql->bindValue(7,$total);
            $sql->bindValue(8,$fechavencimiento);
            $sql->bindValue(9,$estado);
            $sql->bindValue(10,$id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        //funcion para eliminar facturas
        public function delete_facturas($ID){
            $conectar= parent::Conexion();
            parent::set_names();
            $sql="DELETE FROM ma_facturas_cliente where ID=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$ID);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>