<?php

$baglanti = new mysqli("localhost", "root", "", "datatable_db");

if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}

$baglanti->set_charset("utf8");

$sorgu = $baglanti->query("SELECT *  FROM uploading")->fetch_all(MYSQLI_ASSOC);

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}

$cikti = $sorgu;
$baglanti->close();

?>