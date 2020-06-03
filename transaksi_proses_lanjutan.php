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
    <link rel="stylesheet" type="text/css" href="css/transaksi_proses_lanjutan.css">
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
    <h4 style="text-align: center; margin-top: 5cm;"><b>TRANSAKSI PENJUALAN</b></h4>
    <br>    
    <?php
      session_start();
      include 'Connection.php';
      echo 
      "
        <form action='transaksi_proses_lanjutan_keranjang.php' method='post'>
          <ul>
            <li style='color: #333; margin-left: 15px;'>
              <font face='Poppins' color='#333'>Input Pembelian</font>
            </li>
          </ul>
          <table width='500'>
            <tr>
              <td>Kode Transaksi</td>
              <td><input type='hidden' name='kode_penjualan' value='".$_SESSION['kode_transaksiPenjualan']."' /><label font-size:40px;>".$_SESSION['kode_transaksiPenjualan']."</label></td>
            </tr>
            <tr>
              <td>Kode Menu</td>
              <td><select name='kode_menu' style='width: 300px; height: 30px;'>";
              ?>
              <?php
                include 'Connection.php';
                $result = mysqli_query($conn, "SELECT * FROM menu");
                while ($row = mysqli_fetch_array($result)) {
                  echo 
                  "
                    <option value='$row[id_menu]'>
                      $row[id_menu] - $row[nama_menu] - $row[harga]
                    </option>";
                }                         
                echo "</select>
              </td>
            </tr>
            <tr>
              <td>Jumlah Pesan</td>
              <td><input type='text' name='jumlah_jual' value='' style='width: 300px; height: 30px; padding: 5px;' required=''/></td>
            </tr>
            <tr>
              <td style='text-align: center;' colspan='2'>
                <input type='submit' name='submit' value='Tambahkan ke keranjang' style='width: 200px; height: 30px;'/>
              </td>
            </tr>
          </table>
        </form>
        <br>
      ";
    
      echo 
      "
        <ul>
          <li style='color: #333; margin-left: 15px;'>
            <font face='Poppins' color='#333'>Daftar Input Pembelian</font>
          </li>
        </ul>
        <table>
          <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nama Menu</th>
                <th>Jumlah</th>
                <th>Harga Buku</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
          <thead>";
          $sql="SELECT  a.kode_penjualan,
                        a.kode_menu,
                        b.nama_menu,
                        a.jumlah_jual,
                        b.harga,
                        a.total
                FROM tbl_detailpenjualan as a, menu as b 
                WHERE a.kode_menu = b.id_menu AND kode_penjualan='".$_SESSION['kode_transaksiPenjualan']."'";
          $result = mysqli_query($conn, $sql);
          while ($row= mysqli_fetch_array($result)) 
          {
            echo 
            "  
              <tr>
                <td style='text-align: center;'>$row[kode_penjualan]</td>
                <td>$row[nama_menu]</td>
                <td style='text-align: center;'>$row[jumlah_jual]</td>
                <td>$row[harga]</td>
                <td>$row[total]</td>
                <td><a href=transaksi_proses_lanjutan_keranjang_delete.php?kode_menu=$row[kode_menu]>Hapus</a></td>
              </tr>
            ";
          }
      echo 
      "
        </table>
      ";
    
      $sqlTotal = "SELECT SUM(total) FROM tbl_detailpenjualan WHERE kode_penjualan='".$_SESSION['kode_transaksiPenjualan']."'";
      $result = mysqli_query($conn, $sqlTotal);
      $total =0;
      while ($row = mysqli_fetch_array($result)) 
      {
        $total = $row[0];
      }
      echo 
      "
        <h1 style='color: #333'>
          <center>Total Pembelian : IDR. ".$total."</center>
        </h1>
      ";

      $_SESSION['total_penjualan'] = $total;

      echo 
      "
        <form action='transaksi_pembayaran.php' method='post' style='text-align: center;'>
          <button style='margin-top: 10px;'>
            <input type='hidden' name='kode_penjualan' value='".$_SESSION['kode_transaksiPenjualan']."' />
            <input type='submit' name='' class='btn1' value='Lanjut Pembayaran'/>
          </button>
        </form>
      ";     
    ?>    
	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>