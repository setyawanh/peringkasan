<?php
include 'fungsi.php';
include 'stem.php';

if(isset($_POST['teks'])){
	$teks=$_POST['teks'];
}else{
	$teks='';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Peringkasan MDDE</title>
<link rel="stylesheet" href="css/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">
	function scroll_off() {
		document.body.className="no";
	}
	
	function scroll_on () {
		document.body.classList.remove("no");
	}
</script>
</head>
<body>
<div id="header">
	<div id="bar">
		<div class="logo"><h1><a href="index.php" title="Home">PERINGKASAN</a></h1></div>
		<div class="help"><a href="#bantuan" title="Bantuan" onclick="scroll_off();"><img src="img/help.png" width="20"></a></div>
		<br />
	</div>
</div>

<div id="content">
	<h2>MASUKKAN TEKS</h2>
	<form method="post">
		<textarea name="teks" rows="8" class="box"><?php echo $teks; ?></textarea>
		<p><input type="submit" value="Proses" /></p>
	</form>
<?php 
if(isset($_POST['teks'])){
	$teks=$_POST['teks'];

	$ringkasan=mdde($teks);
	if($ringkasan=="kurang"){
		echo "<span class='kurang'>Kalimat kurang banyak, peringkasan tidak bisa dilakukan!</span>";
	}else{
		echo"
		<div id='hasil'>
			<h2>RINGKASAN</h2>
			<div class='box' id='copytext'>
			$ringkasan
			</div>
		</div>
		<textarea id='holdtext' style='display:none'></textarea>

		";
	}
} 
?>
</div>
	<div id="bantuan" class="overlay">
		<div id="help-content">
			<h2>Tentang</h2>
			<p>Peringkasan MDDE merupakan sistem peringkasan teks Bahasa Indonesia secara otomatis. Sistem akan memilih 20% kalimat terpenting dari teks sebagai ringkasan.</p>
			<h2>Langkah Peringkasan</h2>
			<ol>
				<li>Masukkan teks ke dalam <i>field</i> yang tersedia.</li>
				<li>Klik tombol proses, ringkasan akan ditampilkan.</li>
			</ol>
			<h2>Ketentuan</h2>
			<ul>
				<li>Agar teks bisa diringkas dengan baik tata penulisan hendaknya diperhatikan.</li>
				<li>Agar kalimat bisa dideteksi oleh sistem, pemisah kalimat adalah tanda baca diikuti spasi.</li>
				<li>Pastikan awal kalimat menggunakan huruf kapital.</li>
				<li>Banyak kalimat minimal 3.</li>
			</ul>
			<br />
			<a href="#" onclick="scroll_on();" class="tombol">Tutup</a>
		</div>
	</div>

<div id="footer">
    &copy;Copyright 2016
</div>
</body>
</html>