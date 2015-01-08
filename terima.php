<?php

include 'fungsikirim.php';

//mengambil nomor pengirim dari NowSMS
$nopengirim = $_GET['pengirim'];

//membuat nomor pengirim menjadi 08...
if (substr($nopengirim, 0, 3) == "+62") {
    $nopengirim = "0" . substr($nopengirim, 3, strlen($nopengirim) - 3);
} else if (substr($nopengirim, 0, 2) == "62") {
    $nopengirim = "0" . substr($nopengirim, 2, strlen($nopengirim) - 2);
}

//$_GET['pesan'] > mengambil pesan dari NowSMS
//strtoupper > pesan yang diterima dijadikan huruf besar semua       
//trim > menghilangkan spasi di awal dan di akhir pesan
$pesan = strtoupper(trim($_GET['pesan']));

koneksi();

insertInbox($nopengirim, $pesan);

if($pesan == "TES SMS") {
	$pesanKirim = "Tes+Berhasil+wooooiii";
	trigger($nopengirim, $pesanKirim);
} else {
	$pesanKirim = "Ngapain+Loe+Bro";
	trigger($nopengirim, $pesanKirim);
}

?>