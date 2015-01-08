<?php

include 'fungsi.php';

#fungsi untuk mengubah spasi jadi +
function changeSpaceToPlus($nama) {
   	return str_replace(" ", "+", $nama);
}

#fungsi untuk mengubah + menjadi spasi
function changePlusToSpace($nama) {
   	return str_replace("+", " ", $nama);
}

#fungsi untuk melakukan pengiriman pesan yg menggunakan service dari NowSMS
function trigger($reciever, $messageToSend) {
   	koneksi();
   	$messageFix = changePlusToSpace($messageToSend);
   	mysql_query("INSERT INTO outbox VALUES('',curdate(),curtime(),'$reciever','$messageFix')");
   	header("Location:http://localhost:8800/?PhoneNumber=$reciever&Text=$messageToSend");
}

?>