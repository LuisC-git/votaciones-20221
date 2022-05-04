<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=<?php echo $recursos_bs_jq ?>></script>
<script src=<?php echo $recursos_pop_js ?>></script>
<script src=<?php echo $recursos_bs_js ?>></script>
<script>
    $(".linkborrar").click(function () {
        var id = $(this).attr('href');
        $("#inpborrar").val(id);
    });
    $(".ver").click(function () {
        var id = $(this).attr('href');
        document.getElementById('ver').src="resources/imagen/actas/"+id+".jpg";

    });
    

</script>
</body>
</html>