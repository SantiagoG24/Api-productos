<?php
require_once 'Model/api-model.php';
require_once 'View/api-view.php';
class apiController {
    private $apiModel;
    private $apiView;
    public function __construct(){
        $this -> apiModel =new apiModel();
        $this -> apiView =new apiView();
    }
    function obtenerOfertas(){
        if(isset($_GET['orden'])){
            $tareas = $this->apiModel->obtenerOfertas();
            $this->apiView->response($tareas, 200);
        }
    }  
    function agregarOferta($params = []){
        $body = $this -> obtenerData();
        if(!empty($body->nombre) && !empty($body->descripcion) && !empty($body->descuento)){
            try {
                $oferta = $this -> apiModel -> agregarProducto($body->nombre, $body->descripcion, $body->descuento);
                $this -> apiView -> response($oferta,201);
            } catch (\Throwable $th) {
                $this -> apiView -> response("error la insertar la oferta",400);
            }
        }else{
            $this -> apiView -> response("Falta ingresar datos",400);
        }
    } 
    function obtenerOferta($params = null){
        $id=$params[':ID'];
        $oferta= $this -> apiModel -> obtenerProducto_id($id);
        if($oferta){
            $this -> apiView -> response ($oferta,200);
        }else{
            $this -> apiView -> response ("no existe la Oferta con el id = {$id}",404);
        }
    }
    function borrarOferta($params=null){
        $id=$params[':ID'];
        $this -> Model -> borrarProducto($id);
    }  
    private function obtenerData(){
        return json_decode(file_get_contents("php://input"));
    }
}
