<?php
	session_start();
    include "cabecalho.php";

?>
<br/>
<br/>
<br/>
<br/>
    <div class="row">
    <form action="ctrl_enviar_arquivo.php?tipo_arquivo=1" method="post" enctype="multipart/form-data">

        <input type="hidden" name="MAX_FILE_SIZE" value="134217728">

        <input name="userfile" type="file">

        <input type="submit" value="Enviar Arquivo">
    </form>
    </div>
<?php
    include "rodape.html";
?>