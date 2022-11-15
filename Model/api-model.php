<?php
class apiModel
{
    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_catalogo;charset=utf8', 'root', '');
    }
    public function obtenerOfertas(){
        $query = $this->db->prepare('SELECT * FROM producto');
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    function obtenerProducto_id($id){
        $query = $this->db->prepare('SELECT * FROM producto WHERE id_producto=?');
        $query->execute([$id]);
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }
    public function borrarProducto($id){
        $query =  $this->db->prepare('DELETE FROM `producto` WHERE id_producto=?');
        $query->execute([$id]);
    }
    public function agregarProducto($nombre, $descripcion, $descuento){
        $query = $this->db->prepare('INSERT INTO producto(nombre,descripcion,descuento) VALUES (?,?,?)');
        $query->execute([$nombre, $descripcion, $descuento]);
    }
    public function actualizarProducto($nombre, $descripcion, $descuento, $id){
        $query = $this->db->prepare("UPDATE producto SET nombre= ? ,descripcion= ? ,descuento=?WHERE id_producto=?");
        $query->execute([$nombre, $descripcion, $descuento, $id]);
    }
    function obetnerOfertasXdescuento($orden = null){
        $query = "SELECT * FROM producto";
        if ($orden == 'asc') {
            $query .= " ORDER BY descuento ASC";
        } else {
            $query .= " ORDER BY descuento DESC";
        }
        $sentencia = $this->db->prepare($query);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
