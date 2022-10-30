<?php

class ControladorReportes{

    static public function ctrProdcutoMasVendido(){

        $respuesta = ModeloReportes::mdlProdcutoMasVendido();
        return $respuesta;
    }

    static public function ctrProdcutoMenosVendido(){
        $respuesta = ModeloReportes::mdlProdcutoMenosVendido();
        return $respuesta;
    }
}