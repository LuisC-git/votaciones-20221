<?php
include "directorios.php";
include 'resources/class/class.connection.php';

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ERROR);

if (isset($_GET["page"])) {
    switch ($_GET['page']) {
        # pagina principal
        case 'registro':
            include 'views/home/registro.php';
            break;
        case 'login':
            include 'views/home/login.php';
            break;
        # perfiles
        case 'visitante':
            include 'views/user/visitante/inicio.php';
            break;
        case 'operador':
            include 'views/user/operador/inicio.php';
            break;
        case 'secretario':
            include 'views/user/secretario/inicio.php';
            break;
            #secretario
        case 'secretario-acta':
            include 'views/user/secretario/acta.php';
            break;
        case 'secretario-acta-editar':
            include 'views/user/secretario/acta_editar.php';
            break;  
        case 'secretario-conteo':
            include 'views/user/secretario/conteo.php';
            break;
        case 'secretario-conteo-editar':
            include 'views/user/secretario/conteo_editar.php';
            break;    
        case 'secretario-imprimir':
            include 'views/user/secretario/conteoimprimir.php';
            break;              

            #operador
            case 'operador-funcionario':
                include 'views/user/operador/funcionario.php';
                break;
            case 'operador-funcionario-editar':
                include 'views/user/operador/funcionario_editar.php';
                break;
            case 'operador-candidato':
                include 'views/user/operador/candidato.php';
                break;
            case 'operador-candidato-editar':
                include 'views/user/operador/candidato_editar.php';
                break;
            case 'operador-casilla':
                include 'views/user/operador/casilla.php';
                break;  
            case 'operador-casilla-editar':
                include 'views/user/operador/casilla_editar.php';
                break;




        # administrador
        case 'administrador':
            include 'views/user/administrador/inicio.php';
            break;
        case 'adm-funcionario':
            include 'views/user/administrador/funcionario.php';
            break;
        case 'adm-funcionario-editar':
            include 'views/user/administrador/funcionario_editar.php';
            break;
        case 'adm-partido':
            include 'views/user/administrador/partido.php';
            break;
        case 'adm-partido-editar':
            include 'views/user/administrador/partido_editar.php';
            break;
        case 'adm-candidato':
            include 'views/user/administrador/candidato.php';
            break;
        case 'adm-candidato-editar':
            include 'views/user/administrador/candidato_editar.php';
            break;
        case 'adm-casilla':
            include 'views/user/administrador/casilla.php';
            break;  
        case 'adm-casilla-editar':
            include 'views/user/administrador/casilla_editar.php';
            break;
        case 'adm-usuario':
            include 'views/user/administrador/usuario.php';
            break;
        case 'adm-usuario-editar':
            include 'views/user/administrador/usuario_editar.php';
            break;

         #visitante
         case 'vs-result-nacionales':
            include 'views/user/visitante/resultados.php';
            break;
        case 'vs-result-fin':
            include 'views/user/visitante/resultadosfinales.php';
            break;
        case 'vs-actas-descarga':
            include 'views/user/visitante/pdf-pagos-cob-id.php';
            break;
        case 'vs-graficas-nacionales':
            include 'views/user/visitante/grafica.php';
            break;
        case 'vs-actas':
            include 'views/user/visitante/actas.php';
            break;


    }
} else {
    include 'views/home/inicio.php';
}
