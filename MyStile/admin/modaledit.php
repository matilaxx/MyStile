<!-- modal edit -->

<div id="editmodal<?php echo $p['userid']?>" class="modal fade" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Staff</h4>
      </div>

      <div class="modal-body">


        <form action="editstaff.php" method="post" enctype="multipart/form-data" >



          <div class="form-group">
            <label>Nama Staff</label>
            <input type="hidden" name="userid" value="<?php echo $p['userid']; ?>">
            <input  name="namalengkap" id="namalengkap" value="<?php echo $p['namalengkap']; ?>" type="text"  class="form-control" required autofocus>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input name="email" id="email" value="<?php echo $p['email']; ?>" type="text" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input name="password" id="password" value="<?php echo $p['password']; ?>"  type="text" class="form-control" required>
          </div>
          <div class="form-group">
            <label>No. Hp</label>
            <input name="notelp" id="notelp" value="<?php echo $p['notelp']; ?>"  type="number" class="form-control" required>
          </div>

          <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" id="alamat" value="<?php echo $p['alamat']; ?>"  type="text" class="form-control" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <input  name="editstaff" type="submit" class="btn btn-primary" value="simpan" >
          </div>
        </div>

      </form>
    </div>
  </div>
</div>