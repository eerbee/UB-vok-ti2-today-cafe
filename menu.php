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
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/logout.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
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
    <h3 style="text-align: center; margin-top: 5.5cm;"><b>DAFTAR MENU PENJUALAN</b></h3>
    <br>
    <form method="post" action="menu.php">
      <input type="text" name="cari" id="cari" class="textbox" placeholder="Cari Menu" required="">
      <input title="Search" name="submit" id="submit" value="" type="submit" class="button">
    </form>
    <a href="menu_tambah.php">
      <input type="submit" name="" value="Tambah Daftar" class="btn4"/>
    </a>
    <br>
    <?php 
      session_start();     
      if(empty($_SESSION["user_id"])) 
      {
        echo '<script type = "text/javascript">';
        echo 'window.location="login.php"';
        echo '</script>';
      }
       
      $txt_cari = "";
      if(isset($_POST['cari']))
      {
        $txt_cari = $_POST['cari'];
      }

      echo "</br>";
      $sql = "SELECT * FROM menu WHERE nama_menu LIKE '%".$txt_cari."%' OR id_menu LIKE '%".$txt_cari."     %' OR kategori LIKE '%".$txt_cari."%' OR harga LIKE '%".$txt_cari."%' ";
      $result = $conn->query($sql);

      echo "<table>";
      echo 
      " 
        <thead>
          <tr>
            <th>
              ID
            </th>
            <th>
              Nama Menu
            </th>
            <th>
              Kategori
            </th>
            <th>
              Harga
            </th>
            <th>
              Aksi
            </th>
          </tr>
        </thead>
      ";

      if ($result->num_rows > 0) 
      {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
          echo 
          "
            <tr>
              <td>".$row["id_menu"]."</td>
              <td>".$row["nama_menu"]."</td>
              <td>".$row["kategori"]."</td>
              <td>".$row["harga"]."</td>
              <td width='150' style='text-align:center;'>
                <a href=menu_edit.php?id_menu=".$row["id_menu"]."&nama_menu=".str_replace(' ', '%20', 
                $row["nama_menu"])."&kategori=".str_replace(' ', '%20', $row["kategori"])."&harga="
                .str_replace(' ', '%20', $row["harga"]).">
                  <input type='submit' value='Edit' class='btn2'>
                </a>
                <a href=menu_delete_proses.php?id_menu=".$row["id_menu"].">
                  <input type='submit' value='Hapus' class='btn3'>
                </a>
              </td>
            </tr>
          ";
        }
      } 
      else 
      {
        echo "";
      }
      echo "</table>";
    ?>
	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>