<?php
session_start();

if ( !isset($_SESSION["login"])) {
    header("location: signin.php");
    exit;
}

require'functions.php';

$id = $_GET["id"];

if ( hapusUser($id) > 0 ) {
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'lihat customer.php';
        </script>
        ";
}else{
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'lihat customer.php';
        </script>
        ";
    }

?>