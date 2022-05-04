<?php
$base_dir = $_SERVER["DOCUMENT_ROOT"] . "/sabervotar";
# ---------------------------------------------------
# Recursos
# ---------------------------------------------------
$recursos_dir = $base_dir . "/recursos";

#Bootstrap
$recursos_bs_css           = "vendor/bootstrap/css/bootstrap.min.css";
$recursos_bs_js            = "vendor/bootstrap/js/bootstrap.min.js";
$recursos_bs_jq            = "vendor/bootstrap/js/jquery-3.2.1.slim.min.js";
$recursos_pop_js           = "vendor/bootstrap/js/popper.min.js";
$recursos_operador_css     = "resources/Style/operador.css";
$recursos_f_css            = "resources/fontawesome/css/all.css";
$recursos_visi_css         = "resources/Style/visi.css";
$recursos_secre_css        = "resources/Style/secretario.css";
$recursos_admin_css        =  "resources/Style/admin.css";




# Templates
$templates_dir = $base_dir . "/views/template";

$templates_navbar = $base_dir . "/views/template/navbar.php";
$templates_header = $base_dir . "/views/template/header.php";
$templates_footer = $base_dir . "/views/template/footer.php";

$templates_navbar_visitante = $base_dir . "/views/template/navbar_visitante.php";
$templates_header_visitante = $base_dir . "/views/template/header_visitante.php";
$templates_footer_visitante = $base_dir . "/views/template/footer_visitane.php";

$templates_navbar_operador = $base_dir . "/views/template/navbar_operador.php";
$templates_header_operador = $base_dir . "/views/template/header_operador.php";
$templates_footer_operador = $base_dir . "/views/template/footer_operador.php";

$templates_navbar_secretario = $base_dir . "/views/template/navbar_secretario.php";
$templates_header_secretario = $base_dir . "/views/template/header_secretario.php";
$templates_footer_secretario = $base_dir . "/views/template/footer_secretario.php";

$templates_navbar_adm = $base_dir . "/views/template/navbar_adm.php";
$templates_header_adm = $base_dir . "/views/template/header_adm.php";
$templates_footer_adm = $base_dir . "/views/template/footer_adm.php";
