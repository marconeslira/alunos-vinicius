<?php
session_start();

if(!isset($_SESSION['cpf'])){
    session_destroy();
    session_write_close();
}
?>
<script>
    window.location.href="../../../index.html";
</script>