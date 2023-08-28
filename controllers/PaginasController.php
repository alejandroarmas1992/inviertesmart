<?php

namespace Controllers;

use Model\Dia;
use Model\Hora;
use MVC\Router;
use Model\Evento;
use Model\Ponente;
use Model\Categoria;


class PaginasController {
    public static function index(Router $router) {

        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
            if($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            if($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }

        // Obtener el total de cada bloque
        $ponentes_total = Ponente::total();
        $conferencias_total = Evento::total('categoria_id', 1);
        $workshops_total = Evento::total('categoria_id', 2);

        // Obtener todos los ponentes
        $ponentes = Ponente::all();

        $router->render('paginas/sobrenosotros', [
            'titulo' => 'Inicio',
            'eventos' => $eventos_formateados,
            'ponentes_total' => $ponentes_total,
            'conferencias_total' => $conferencias_total,
            'workshops_total' => $workshops_total,
            'ponentes' => $ponentes
        ]);
    }
    public static function evento(Router $router) {

        $router->render('paginas/sobrenosotros', [
            'titulo' => 'Sobre Conferencias EPN'
        ]);
    }
  
    public static function inversioncorta(Router $router) {
       
        $texto1="Aquí aparecerá la información acerca de la empresa";
        $texto2="";
        $imagen="https://www.cotopaxi.com.ec/sites/default/files/2020-08/BLANCO%20760X440PX_0.png";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $principal = $_POST['principal'];
            $empresa=$_POST['opcion'];
            $dias_credito=$_POST['opcion2'];
            $fecha=$_POST['fecha'];
            $nueva_fecha=date('Y-m-d', strtotime($fecha . " +$dias_credito days"));
          
        if($empresa=="opcion2"){
            $tasa=6;
            $ganancia =$principal * $tasa/100 * ((float)$dias_credito / 365);
            $ganancia=number_format($ganancia,2);
            $total = $principal + $ganancia;
            $total=number_format($total,2);
            $nombre="NESTLÉ";
            $imagen="https://www.ret.ec/wp-content/uploads/2022/05/Nestle.png";
            $texto1="Empresa multinacional suiza líder mundial en el mercado alimenticio con un amplio portafolio de productos.";
            $texto2="La calificación de riesgo es una opinión profesional, fundada e independiente de la capacidad de que la compañía cumpla con sus obligaciones contractuales.";
        } elseif($empresa=="opcion3"){
            $tasa=8.75;
            $ganancia = $principal * $tasa/100 * ((float)$dias_credito / 365);
            $ganancia=number_format($ganancia,2);
            $total = $principal + $ganancia;
            $total=number_format($total,2);
            $nombre="AZZORTI";
            $imagen="https://dupree.co/wp-content/uploads/2021/09/Logo-Azzorti-1.png";
            $texto1="Compañía Multinacional con mas de 10 años de presencia en la compraventa, fabricación, importación y comercialización a través de sistemas de redes de venta directa, venta al detalle, o por la modalidad de venta por catálago de toda clase de mercancías para el hogar.";
            $texto2="La calificación de riesgo es una opinión profesional, fundada e independiente de la capacidad de que la compañía cumpla con sus obligaciones contractuales.";
        } elseif($empresa=="opcion4"){
            $tasa=7.25;
            $ganancia = $principal * $tasa/100 * ((float)$dias_credito / 365);
            $ganancia=number_format($ganancia,2);
            $total = $principal + $ganancia;
            $total=number_format($total,2);
            $nombre="PROFERMACO";
            $imagen="https://mljqfl57s0e9.i.optimole.com/w:1024/h:297/q:mauto/f:avif/https://profermaco.com.ec/wp-content/uploads/2019/11/Logotipo-Menu-Web.png";
            $texto1="Importación y comercialización de productos para el sector ferretero y construcción.";
            $texto2="La calificación de riesgo es una opinión profesional, fundada e independiente de la capacidad de que la compañía cumpla con sus obligaciones contractuales.";
        }
       
            
        }
      

        $router->render('paginas/inversioncorta', [
            'titulo' => 'Sobre Conferencias EPN',
            'principal'=>(float)$principal,
            'total'=>$total,
            'ganancia'=>$ganancia,
            'nueva_fecha'=>$nueva_fecha,
            'tasa'=>$tasa,
            'imagen'=>$imagen,
            'dias_credito'=>$dias_credito,
            'nombre'=>$nombre,
            'texto1'=>$texto1,
            'texto2'=>$texto2
        ]);
    }

    public static function inversionlarga(Router $router) {
        $texto1="Aquí aparecerá la información acerca de la empresa";
        $texto2="";
        $texto3="";
        $imagen="https://www.cotopaxi.com.ec/sites/default/files/2020-08/BLANCO%20760X440PX_0.png";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $principal = $_POST['principal'];
            $empresa=$_POST['opcion'];
            $dias_credito=$_POST['opcion2'];
            $fecha=$_POST['fecha'];
            $nueva_fecha=date('Y-m-d', strtotime($fecha . " +$dias_credito days"));
          
        if($empresa=="opcion2"){
            $tasa=8;
            $ganancia =$principal * $tasa/100 * ((float)$dias_credito / 365);
            $ganancia=number_format($ganancia,2);
            $total = $principal + $ganancia;
            $total=number_format($total,2);
            $nombre="FERRO TORRE";
            $imagen="data:image/png;base64,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";
            $texto1="Empresa Ecuatoriana con más de 50 años de trayectoria, relacionada con la fabricación y comercialización de toda clase de bienes para la industria de la construcción en la línea de estructuras, tuberías, perfiles metálicos y hierro estructural. COTIZA EN BOLSA DESDE EL 2012.";
            $texto2="La calificación de riesgo es una opinión profesional, fundada e independiente de la capacidad de que la compañía cumpla con sus obligaciones contractuales.";
            $texto3="Rendimiento financiero exento de pago de impuesto a la renta.";
        } elseif($empresa=="opcion3"){
            $tasa=10.5;
            $ganancia = $principal * $tasa/100 * ((float)$dias_credito / 365);
            $ganancia=number_format($ganancia,2);
            $total = $principal + $ganancia;
            $total=number_format($total,2);
            $nombre="CONSTRUIR FUTURO";
            $imagen="https://uide.hiringroomcampus.com/assets/media/uide/company_63ed163d365e1804fe637ea2.jpg";
            $texto1="Empresa Ecuatoriana con más de 23 años de trayectoria, especializada en la planificación, investigación y desarrollo de proyecto de construcción INMOBILIARIA. Principal actividad es la construcción a nivel nacional.";
            $texto2="La calificación de riesgo es una opinión profesional, fundada e independiente de la capacidad de que la compañía cumpla con sus obligaciones contractuales.";
            $texto3="Rendimiento financiero exento de pago de impuesto a la renta.";
        } elseif($empresa=="opcion4"){
            $tasa=8;
            $ganancia = $principal * $tasa/100 * ((float)$dias_credito / 365);
            $ganancia=number_format($ganancia,2);
            $total = $principal + $ganancia;
            $total=number_format($total,2);
            $nombre="ALIMEC";
            $imagen="data:image/jpeg;base64,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";
            $texto1="Empresa Ecuatoriana con más de 50 años de trayectoria, elaboración, preparación, envasado y producción de artículos alimenticios en general y artículos conexos con la industria de alimentos; y, la compra venta, alimenticios en general.";
            $texto2="La calificación de riesgo es una opinión profesional, fundada e independiente de la capacidad de que la compañía cumpla con sus obligaciones contractuales.";
            $texto3="Rendimiento financiero exento de pago de impuesto a la renta.";
        } elseif($empresa=="opcion5"){
            $tasa=7.6;
            $ganancia = $principal * $tasa/100 * ((float)$dias_credito / 365);
            $ganancia=number_format($ganancia,2);
            $total = $principal + $ganancia;
            $total=number_format($total,2);
            $nombre="AUTO MEKANO";
            $imagen="https://www.automekano.com/static/fda56eb2dfeb00632da87e9e29df9c07/logo-automekano-redes.jpg";
            $texto1="Comercialización de vehículos, maquinaria, camiones y autobuses de alta calidad.";
            $texto2="La calificación de riesgo es una opinión profesional, fundada e independiente de la capacidad de que la compañía cumpla con sus obligaciones contractuales.";
            $texto3="Rendimiento financiero exento de pago de impuesto a la renta.";
        }
       
            
        }
        $router->render('paginas/inversionlarga', [
            'titulo' => 'Sobre Conferencias EPN',
            'principal'=>$principal,
            'total'=>$total,
            'ganancia'=>$ganancia,
            'nueva_fecha'=>$nueva_fecha,
            'tasa'=>$tasa,
            'imagen'=>$imagen,
            'dias_credito'=>$dias_credito,
            'nombre'=>$nombre,
            'texto1'=>$texto1,
            'texto2'=>$texto2,
            'texto2'=>$texto3
            
        ]);
    }

    public static function acciones(Router $router) {

        $router->render('paginas/acciones', [
            'titulo' => 'Sobre Conferencias EPN'
        ]);
    }

    public static function bitcoins(Router $router) {

        $router->render('paginas/bitcoins', [
            'titulo' => 'Sobre Conferencias EPN'
        ]);
    }

    public static function simuladores(Router $router) {

        $router->render('paginas/simuladores', [
            'titulo' => 'Sobre Conferencias EPN'
        ]);
    }
    
    public static function paquetes(Router $router) {

        $router->render('paginas/paquetes', [
            'titulo' => 'Paquetes Conferencias EPN'
        ]);
    }

    public static function conferencias(Router $router) {

        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
            if($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            if($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventos_formateados['workshops_s'][] = $evento;
            }
        }


        $router->render('paginas/conferencias', [
            'titulo' => 'Conferencias & Workshops',
            'eventos' => $eventos_formateados
        ]);
    }

    public static function error(Router $router) {

        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }
}