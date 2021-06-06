<!-- modal edit -->

<div id="editmodal<?php echo $p['idproduk']?>" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h4 class="modal-title">Edit Produk</h4>
  </div>

  <div class="modal-body">


    <form action="editproduk.php" method="post" enctype="multipart/form-data" >



      <div class="form-group">
        <label>Nama Produk</label>
        <input type="hidden" name="idproduk" id="idproduk" value="<?php echo $p['idproduk']?>">
        <input  name="namaproduk" id="namaproduk" value="<?php echo $p['namaproduk']?>" type="text"  class="form-control" required autofocus>
      </div>
      <div class="form-group">
        <label>Nama Kategori</label>
        <select  name="kategori" id="kategori" class="form-control">
         <option value="<?php echo $p['namakategori']?>" selected>Pilih Kategori</option>
         <?php
         $det=mysqli_query($conn,"select * from kategori order by namakategori ASC")or die(mysqli_error());
         while($d=mysqli_fetch_array($det)){
          ?>
          <option value="<?php echo $d['idkategori'] ?>"><?php echo $d['namakategori'] ?></option>
          <?php
        }
        ?>		
      </select>

    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <input  name="deskripsi" id="deskripsi" value="<?php echo $p['deskripsi']?>" type="text" class="form-control">
    </div>


    <div class="form-group">
      <label>Harga Sebelum Diskon</label>
      <input name="hargabefore" id="hargabefore" value="<?php echo $p['hargabefore']?>" type="number" class="form-control">
    </div>
    <div class="form-group">
      <label>Harga Setelah Diskon</label>
      <input name="hargaafter" id="hargaafter" value="<?php echo $p['hargaafter']?>" type="number" class="form-control">
    </div>

    <div class="form-group">
      <label>Foto Produk</label><br>
      <img src="../<?php echo $p['gambar'] ?>" width="50%"\>
    </div>
    

  </div>
  <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
   <input name="simpan" type="submit" class="btn btn-primary" value="Simpan">
 </div>
</form>

</div>
</div>
</div>
