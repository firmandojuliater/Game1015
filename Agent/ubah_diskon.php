<!-- Edit -->
<div class="modal hide fade" id="edit_diskon_<?php echo $row['username']; ?>">
  <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>Edit Diskon</h3>
  </div>

  <div class="modal-body">
    <div class="container-fluid">
      <form method="POST" action="proses_ubah_diskon.php">
        <input type="hidden" class="form-control" name="username" value="<?php echo $row['username']; ?>">
        <div class="row-fluid">
          <div class="span6">
            <div class="row-fluid">
              <div class="span10">
                <label>2d :</label>
                <input type="number" name="diskon_2d" value="<?php echo $row['diskon_2d']; ?>">
              </div>
              <div class="span10">
                <label>3d :</label>
                <input type="number" name="diskon_3d" value="<?php echo $row['diskon_3d']; ?>">
              </div>
              <div class="span10">
                <label>4d :</label>
                <input type="number" name="diskon_4d" value="<?php echo $row['diskon_4d']; ?>">
              </div>
              <div class="span10">
                <label>Shio :</label>
                <input type="number" name="diskon_shio" value="<?php echo $row['diskon_shio']; ?>">
              </div>
              <div class="span10">
                <label>Pajak BK/GG :</label>
                <input type="number" name="pajak_bkgg" value="<?php echo $row['pajak_bkgg']; ?>">
              </div>
            </div>
          </div>

          <div class="span6">
            <div class="row-fluid">
              <div class="span10">
                <label>CB :</label>
                <input type="number" name="diskon_cb" value="<?php echo $row['diskon_cb']; ?>">
              </div>
              <div class="span10">
                <label>MK :</label>
                <input type="number" name="diskon_mk" value="<?php echo $row['diskon_mk']; ?>">
              </div>
              <div class="span10">
                <label>CJ :</label>
                <input type="number" name="diskon_cj" value="<?php echo $row['diskon_cj']; ?>">
              </div>
              <div class="span10">
                <label>MKTS :</label>
                <input type="number" name="diskon_mkts" value="<?php echo $row['diskon_mkts']; ?>">
              </div>
            </div>
          </div>


        </div>
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" name="submit" value="Save" class="btn btn-success">Update</a></button>
  </div>
  </form>
</div>