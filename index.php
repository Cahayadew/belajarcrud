<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body style="text-align:center">
<a href="index.php"> Tambah </a> |
<a href="lihat.php">Lihat</a>
<br />
<br />
<br />

<?php
include "koneksi.php";
if (isset($_POST["simpan"])){
if (isset($_POST["id_user"])){
	$nama = $_POST["nama"];
	$tambah = "INSERT INTO user (nama_user) VALUE (?)";
	if($st = $bd->prepare($tambah)){
		$st->bind_param("s", $nama);
		$st->execute();
		echo "<font color='red'>Data berhasil disimpan </font>";
		$st->close();
	}
	$bd->close();
} else {
		$id_user= $_POST["id_user"];
		$nama	= $_POST["nama"];
		$edit	= "UPDATE user SET nama = '$nama' WHERE id_user = $id_user";
		$bd->query($edit);
		echo "<font color='red'>Data berhasil diedit</font>";
		$bd->close();
	}
}
?>

<form action="index.php" method="post">
<table align="center">
    	<?php
			if (isset($_GET["action"])) {
				$id_user= $_GET["id_user"];
				$tampil	= "SELECT * FROM user WHERE id_user = $id_user";
				$result = $bd->query($tampil);
				$row = $result->fetch_assoc();
				?>
<tr>
	<td> 
    <label for="id_user"> </label> ID </td>
    <td> : </td>
    <td colspan="7">
	<input type="text" name="id_user" value="<?php echo $row["id_user"] ?>" readonly /> 
    </td>
</tr>
<?php
			}
			?>
<tr>
<td>
    <label for="nama"> </label> Nama </td>
    <td> : </td>
    <td colspan="7">
	<input type="text" name="nama" value="<?php if(isset($_GET["action"])) echo $row["nama"] ?>" /></td>
</tr>
<tr>
<td colspan="2">
<input type="submit" name="simpan">
</td>
</tr>
</table>
</form>
</body>
</html>

