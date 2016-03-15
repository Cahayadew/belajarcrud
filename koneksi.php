<?php
$bd = new mysqli("localhost","root","","Belajar");
if ($bd-> errno){
	die($bd-> connect_error);
}
?>