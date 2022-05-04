<?php include $templates_navbar ?>
<body>
<?php include $templates_header ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Iniciar sesion</h1>
                    <form action="controllers/controller.login.php" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Aceptar">
                    </form>
                </div>
                <div class="card-footer">
                    <?php
                    session_start();
                    if (isset($_SESSION['error']) && $_SESSION['error']) {
                        echo "<h1 style='color: crimson'>Credenciales incorrectas</h1>";
                        session_destroy();
                    }
                    ?>
                </div>
                   <a class="btn btn-success" href="?page=registro">regístrate</a>
            </div>
         
        </div>
     
    </div>
    <br>
    <footer>
        <p>@Sabervotar</p>
    </footer>
</div>

<?php include $templates_footer ?>

</body>
</html>