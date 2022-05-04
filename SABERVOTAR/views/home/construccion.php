<?php include $templates_header ?>
<body>
<?php include $templates_navbar ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Instituto de idomas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Registro</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Panel de control
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="alumnos/alumnos.html">Alumnos</a>
                    <a class="dropdown-item" href="profesores/profesores.html">Profesores</a>
                    <a class="dropdown-item" href="cursos.html">Cursos</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <img src="recursos/img/sitio-en-construcción.jpg" class="img-fluid" alt="Responsive image">
    </div>
</div>

<?php include $templates_footer ?>

</body>
</html>