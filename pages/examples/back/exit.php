<?php
session_start();

if(isset($_SESSION['nomeUser'])){
    unset($_SESSION['nomeUser']);
    session_destroy();
    session_write_close();
}
?>
<script>
    window.location.href="../../../index.html";
</script>