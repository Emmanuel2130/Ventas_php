<?php
require_once "conexion.php";
class ModeloReportes{

    static public function mdlProdcutoMasVendido(){
        $stmt = Conexion::conectar()->prepare("SELECT p.nombre, p.codigo, SUM(fp.cantidad) AS cantidad FROM tblproductos AS p INNER JOIN tblfacturaproductos AS fp  on p.codigo = fp.codProducto GROUP BY p.codigo ORDER by cantidad  DESC  limit 1");

        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlProdcutoMenosVendido(){
        $stmt = Conexion::conectar()->prepare("SELECT p.nombre, p.codigo, SUM(fp.cantidad) AS cantidad FROM tblproductos AS p INNER JOIN tblfacturaproductos AS fp  on p.codigo = fp.codProducto GROUP BY p.codigo ORDER by cantidad limit 1");

        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlClienteMasFrecuente(){
    $stmt = Conexion::conectar()->prepare("SELECT MAX(stock) FROM tblproductos GROUP BY nombre  ORDER BY `MAX(stock)` DESC");

    $stmt->execute();
    return $stmt->fetch();

    }

   
}