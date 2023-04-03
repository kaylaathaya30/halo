<!DOCTYPE html>
<html>
    <head>
        <!--menghubungkan dengan file css-->
        <link rel="stylesheet" type="text/css" href="stylee.css">
    </head>

    <body>
        <div class="content">
          <header>
            <h1 class="judul"> KATHA TEA </h1>
            <h3 class="deskripsi"> Choose your best tea! </h3>
          </header>

        <nav>
        <div class="nav">
            <ul>
               <li><a href="index.php?page=home">HOME</a></li>
               <li><a href="index.php?page=data_teh">MENU TEH</a></li>
               <li><a href="index.php?page=data_pembeli">DATA PELANGGAN</a></li>
               <li><a href="index.php?page=data_transaksi">DATA PENJUALAN</a></li>
            </ul>
        </div>
        </nav>
        
        <div class="badan">


       <?php
       if(isset($_GET['page'])){
        $page = $_GET['page'];
       
        switch ($page) {
            case 'home':
                include "home.php";
                break;
            case 'data_teh':
                include "data_teh.php";
                break;
            case 'data_pembeli':
                include "data_pembeli.php";
                break;
            case 'data_transaksi':
                include "data_transaksi.php";
                break;
            default:
                echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                break;            
        }
       }else{
        include "home.php";
       }
       
       ?>

    </div>
    </div>
    </body>
</html>