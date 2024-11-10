<?php 
session_start();
session_unset();
session_destroy();
echo "<script>
    alert('Anda Sudah Keluar')
    document.location.href = '../../login.php'
    </script>";
?>