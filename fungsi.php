<?php

function koneksi() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "pkl54_monitoringsmsgateway";
    mysql_connect($host, $user, $pass) or die('Connections failed.');
    mysql_select_db($dbname) or die('Database not found.');
}

function insertInbox($pengirim, $pesan) {
    mysql_query("INSERT INTO inbox VALUES('',curdate(),curtime(),'$pengirim','$pesan')");
}

?>