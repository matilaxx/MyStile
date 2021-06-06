
<?php 
session_start();
include '../dbconnect.php';

if(!isset($_SESSION['log'])){
  echo "<script>alert('Anda Harus Login');</script>";
  echo "<script>location='../login.php';</script";

};

if(isset($_POST['addmethod']))
{
  $metode = $_POST['metode'];
  $norek = $_POST['norek'];
  $an = $_POST['an'];
  $logo = $_POST['logo'];

  $tambahmet = mysqli_query($conn,"INSERT INTO pembayaran (metode,norek,an,logo) VALUES ('$metode','$norek','$an','$logo')");
  if ($tambahmet){
    echo "
    <meta http-equiv='refresh' content='1; url= pembayaran.php'/>  ";
    } else { echo "
    <meta http-equiv='refresh' content='1; url= pembayaran.php'/> ";
  }

};

?>

<?php 
if (isset($_GET['hal'])) 
{
  if ($_GET['hal'] == "hapus") 
  {
    $hapus = mysqli_query($conn,"DELETE FROM pembayaran WHERE no = '$_GET[id]' ");
    if ($hapus) 
    {
      echo "<script>alert('hapus data sukses');document.location='pembayaran.php';</script>";
    }
  }
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" 
  type="image/png" 
  href="../favicon.png">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Kelola Metode Pembayaran - My Stile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/metisMenu.css">
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/slicknav.min.css">

  <!-- amchart css -->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <!-- Start datatable css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

  <!-- others css -->
  <link rel="stylesheet" href="assets/css/typography.css">
  <link rel="stylesheet" href="assets/css/default-css.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <!-- modernizr css -->
  <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  <!-- jquery latest version -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->
          <!-- preloader area start -->
          <div id="preloader">
            <div class="loader"></div>
          </div>
          <!-- preloader area end -->
          <!-- page container area start -->
          <div class="page-container">
           <!-- sidebar menu area start -->
           <div class="sidebar-menu">
            <div class="main-menu">
              <div class="menu-inner">
                <nav>
                  <ul class="metismenu" id="menu">
                   <li class="active"><a href="index.php"><ion-icon name="home-outline"></ion-icon><span>Home</span></a></li>
                   <li><a href="user.php"><ion-icon name="person-circle-outline"></ion-icon><span>Kelola Admin</span></a></li>
                   <li><a href="customer.php"><ion-icon name="people-outline"></ion-icon><span>Kelola Pelanggan</span></a></li>
                   
                   <li>
                    <a href="javascript:void(0)" aria-expanded="true"><ion-icon name="storefront-outline"></ion-icon>   <span>Kelola Toko
                    </span></a>
                    <ul class="collapse">
                      <li><a href="kategori.php"><ion-icon name="grid-outline"></ion-icon> Kategori</a></li>
                      <li><a href="produk.php"><ion-icon name="pricetags-outline"></ion-icon> Produk</a></li>
                      <li><a href="pembayaran.php"><ion-icon name="card-outline"></ion-icon> Metode Pembayaran</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="manageorder.php"><ion-icon name="bag-handle-outline"></ion-icon><span>Kelola Pesanan</span></a>
                  </li>


                  <li><a href="../"><ion-icon name="caret-back-circle-outline"></ion-icon><span>Kembali ke Toko</span></a></li>
                  <li>
                    <a href="../logout.php"><ion-icon name="log-out-outline"></ion-icon><span>Logout</span></a>
                    
                  </li>
                  
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
          <!-- header area start -->
          <div class="header-area">
            <div class="row align-items-center">
              <!-- nav and search button -->
              <div class="col-md-6 col-sm-8 clearfix">
                <div class="nav-btn pull-left">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              </div>
              <!-- profile info & task notification -->
              <div class="col-md-6 col-sm-4 clearfix">
                <ul class="notification-area pull-right">

                </ul>
              </div>
            </div>
          </div>


          <!-- page title area end -->
          <div class="main-content-inner">

            <!-- market value area start -->
            <div class="row mt-5 mb-5">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-center">
                     <h2>Daftar Metode Pembayaran</h2>
                     <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Metode</button>
                   </div>
                   <div class="data-tables datatable-dark">
                     <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
                       <tr>
                        <th>No.</th>
                        <th>Nama Metode</th>
                        <th>No.Rek</th>
                        <th>Atas Nama</th>
                        <th>URL Logo</th>
                        <th>Aksi</th>
                      </tr></thead><tbody>
                       <?php 
                       $brgs=mysqli_query($conn,"SELECT * from pembayaran order by no ASC");
                       $no=1;
                       while($p=mysqli_fetch_array($brgs)){
                        $id = $p['no'];

                        ?>

                        <tr>
                         <td><?php echo $no++ ?></td>
                         <td><?php echo $p['metode'] ?></td>
                         <td><?php echo $p['norek'] ?></td>
                         <td><?php echo $p['an'] ?></td>

                         <td><?php echo $p['logo'] ?></td>
                         <td>
                          <a href="pembayaran.php?hal=hapus&id=<?php echo $p['no'] ?>" class="btn-danger btn">Hapus</a>
                          <a  data-toggle="modal" data-target="#editmodal" data-no="<?= $id;?>" data-metode="<?= $p['metode'];?>" data-norek="<?= $p['norek'];?>" data-an="<?= $p['an'];?>" data-logo="<?= $p['logo'];?>" id="tombolubah" class="btn btn-primary btn-edit">Edit</a>
                        </td>

                      </tr>		

                      <?php 
                    }

                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- modal edit -->

    <div id="editmodal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Metode</h4>
          </div>

          <div class="modal-body">


            <form action="editmetode.php" method="post" enctype="multipart/form-data" >


              <input type="hidden" name="no" value="<?php echo $id; ?>">

              <div class="form-group">
                <label>Nama Metode</label>
                <input  name="metode" id="metode" value="" type="text"  class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label>No. Rekening</label>
                <input name="norek" id="norek" value="" type="text" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Atas Nama</label>
                <input name="an" id="an" value=""  type="text" class="form-control" required>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <input  name="editmetode" type="submit" class="btn btn-primary" value="simpan" >
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>

    <!-- row area start-->
  </div>
</div>
<!-- main content area end -->
<!-- footer area start-->
<footer>
  <div class="footer-area">
    <p>By Alvani F</p>
  </div>
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->

<!-- modal input -->
<div id="myModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <h4 class="modal-title">Tambah Metode</h4>
   </div>
   <div class="modal-body">
     <form method="post">
      <div class="form-group">
       <label>Nama Metode</label>
       <input name="metode" type="text" class="form-control" required autofocus>
     </div>
     <div class="form-group">
       <label>No. Rekening</label>
       <input name="norek" type="text" class="form-control" required>
     </div>
     <div class="form-group">
       <label>Atas Nama</label>
       <input name="an" type="text" class="form-control" required>
     </div>
     <div class="form-group">
       <label>URL Logo</label>
       <input name="logo" type="file" class="form-control" required>
     </div>

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
    <input name="addmethod" type="submit" class="btn btn-primary" value="Tambah">
  </div>
</form>
</div>
</div>
</div>

<script>

  $("#editmodal").on('show.bs.modal', function(e) {
    var no = $(e.relatedTarget).data('no');
    var metode = $(e.relatedTarget).data('metode');
    var norek = $(e.relatedTarget).data('norek');
    var an = $(e.relatedTarget).data('an');


    $(" #metode").val(metode);
    $(" #norek").val(norek);
    $(" #an").val(an);


    alert(no)
  });

</script>


<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<!-- start chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<!-- start highcharts js -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- start zingchart js -->
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
<script>
  zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
  ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
</script>
<!-- all line chart activation -->
<script src="assets/js/line-chart.js"></script>
<!-- all pie chart -->
<script src="assets/js/pie-chart.js"></script>
<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script> 
</body>
</html>
