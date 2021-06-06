 <!-- modal edit -->

 <div id="editmodal<?php echo $p['idkategori']?>" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Kategori</h4>
      </div>

      <div class="modal-body">


        <form action="editkategori.php" method="post" enctype="multipart/form-data" >




          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="hidden" name="idkategori" value="<?php echo $id; ?>">
            <input  name="namakategori" id="namakategori" value="<?php echo $p['namakategori']?>" type="text"  class="form-control" required autofocus>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <input  name="editkategori" type="submit" class="btn btn-primary" value="simpan" >
        </div>
      </div>
    </form>
  </div>
</div>
</div>