<?php 
  include 'Connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<title></title>

	<!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/logout.css">
    <link rel="stylesheet" type="text/css" href="css/menu_tambah.css">
</head>
<body>
	<div class="wrapper">
		<img src="img/logo.png" width="90" height="70" style="margin-left: 10px;">
		<a href="logout.php">
      <div class="out_wrap">
        <button class="learn-more">
          <div class="circle">
            <span class="icon arrow"></span>
          </div>
          <p class="button-text">Log Out</p>
        </button>
      </div>
    </a>
		<br><hr>
    <div class="container_nb">
      <img src="img/img_transaksi.png" alt="Snow">
      <a href="transaksi.php">
    		<button class="btn outline">
    			<b>Transaksi</b>
    		</button>
      </a>
    </div>
    <div class="container_nb">
      <img src="img/img_menu.jpg" alt="Snow">
      <a href="menu.php">
    		<button class="btn outline">
    			<b>Menu</b>
    		</button>
      </a>
    </div>
    <div class="container_nb">
      <img src="img/biji_kopi.jpg" alt="Snow">
  		<a href="daftar.php">
        <button class="btn outline">
          <b>Daftar</b>
        </button>
      </a>
    </div>
    <h3 style="text-align: center; margin-top: 5.5cm;">
      <b>TRANSAKSI PENJUALAN</b>
    </h3>
    <?php 
      $queryauto = "SELECT max(id_menu) as maxKode FROM menu";
      $hasil = mysqli_query($conn,$queryauto);
      $data = mysqli_fetch_array($hasil);
      $kodePenjualan = $data['maxKode'];
      $noUrut = (int) substr($kodePenjualan, 3, 3);
      $noUrut++;
      $char = "MN";
      $kodePenjualan = $char . sprintf("%03s", $noUrut);
     ?>
    <form class="form-style-9" method="get" action="menu_tambah_proses.php" id="form">
      <center>
        <h4>Form Tambah Daftar Menu</h4>
      </center>
      <ul>
        <label>Id Menu</b></label>
        <li>
          <input readonly="" value="<?php echo $kodePenjualan; ?>" type="text" name="fid" id="fid" class="field-style field-split align-left"/>
        </li>
        <label>Nama Menu</label>
        <li>
          <input required="" type="text" name="fnama" id="fnama" class="field-style field-split align-left"/>
        </li>
        <label>Kategori</label>
        <li>
          <input required="" type="text" name="fkategori" id="fkategori" class="field-style field-split align-left"/>
        </li>
        <label>Harga</label>
        <li>
          <input required="" type="text" name="fharga" id="fharga" class="field-style field-split align-left"/>
        </li>
          <button style="margin-top: 10px;">
            <input type="submit" name="submit" id="submit" value="Submit" class="btn1"/>
          </button>
      </ul>
    </form>
	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>