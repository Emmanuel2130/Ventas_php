<?php
require_once "conexion.php";
class ModeloProductos
{
    // MOSTRAR PRODUCTOS

    static public function mdlMostrarProductos($tabla, $item, $valor)
    {
        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return  $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return  $stmt->fetchAll();
        }
        $stmt->close();
        $stmt = null;
    }

    static public function mdlCrearProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla VALUES(:codigo,:nombre,:stock,:valor,:referencia,:peso,:categoria,:fecha_creacion)");
        $stmt->bindParam(":codigo", $datos['codigo'], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos['stock'], PDO::PARAM_INT);
        $stmt->bindParam(":valor", $datos['valor'], PDO::PARAM_INT);
        $stmt->bindParam(":referencia", $datos['referencia'], PDO::PARAM_STR);
        $stmt->bindParam(":peso", $datos['peso'], PDO::PARAM_INT);
        $stmt->bindParam(":categoria", $datos['categoria'], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_creacion", $datos['fecha_creacion'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return $stmt->errorInfo();
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlEditarProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, stock = :stock, valor = :valor,referencia=:referencia,peso=:peso,categoria=:categoria,fecha_creacion=:fecha_creacion WHERE codigo = :codigo");
        $stmt->bindParam(":codigo", $datos['codigo'], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":stock", $datos['stock'], PDO::PARAM_INT);
        $stmt->bindParam(":valor", $datos['valor'], PDO::PARAM_INT);
        $stmt->bindParam(":referencia", $datos['referencia'], PDO::PARAM_STR);
        $stmt->bindParam(":peso", $datos['peso'], PDO::PARAM_INT);
        $stmt->bindParam(":categoria", $datos['categoria'], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_creacion", $datos['fecha_creacion'], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return $stmt->errorInfo();
        }

        $stmt->close();
        $stmt = null;
    }

    static public function mdlBorrarProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE codigo = :codigo");
        

        $stmt->bindParam(":codigo", $datos, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}
