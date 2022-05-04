<?php include $templates_navbar ?>
<body>
<?php include $templates_header ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Contactanos</h1>
                    <form>
                        <div class="form-group">
                            <label>Nombre completo</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Correo electronico</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Mensaje</label>
                            <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>Sabervotar</p>
    </footer>
</div>

<?php include $templates_footer ?>

</body>
</html>