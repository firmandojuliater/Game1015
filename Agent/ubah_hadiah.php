<!-- Edit -->
<div class="modal hide fade" id="edit_hadiah_<?php echo $row['username']; ?>">
  <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>Edit hadiah</h3>
  </div>

  <div class="modal-body">
    <div class="container-fluid">
      <form method="POST" action="proses_ubah_hadiah.php">
        <input type="hidden" class="form-control" name="username" value="<?php echo $row['username']; ?>">
        <div class="row-fluid">
          <div class="span6">
            <div class="row-fluid">
              <div class="span10">
                <label>2d :</label>
                <input type="number" name="hadiah_2d" value="<?php echo $row['hadiah_2d']; ?>">
              </div>
              <div class="span10">
                <label>3d :</label>
                <input type="number" name="hadiah_3d" value="<?php echo $row['hadiah_3d']; ?>">
              </div>
              <div class="span10">
                <label>4d :</label>
                <input type="number" name="hadiah_4d" value="<?php echo $row['hadiah_4d']; ?>">
              </div>
              <div class="span10">
                <label>Shio :</label>
                <input type="number" name="hadiah_shio" value="<?php echo $row['hadiah_shio']; ?>">
              </div>
              <div class="span10">
                <label>Pajak PK/GG :</label>
                <input type="number" name="pajak_bkgg" value="<?php echo $row['pajak_bkgg']; ?>">
              </div>
            </div>
          </div>

          <div class="span6">
            <div class="row-fluid">
              <div class="span10">
                <label>Pajak PK/GG :</label>
                <input type="number" name="hadiah_bkgg" value="<?php echo $row['hadiah_bkgg']; ?>">
              </div>
              <div class="span10">
                <label>CB :</label>
                <input type="number" name="hadiah_cb" value="<?php echo $row['hadiah_cb']; ?>">
              </div>
              <div class="span10">
                <label>MK :</label>
                <input type="number" name="hadiah_mk" value="<?php echo $row['hadiah_mk']; ?>">
              </div>
              <div class="span10">
                <label>CJ :</label>
                <input type="number" name="hadiah_cj" value="<?php echo $row['hadiah_cj']; ?>">
              </div>
              <div class="span10">
                <label>MKTS :</label>
                <input type="number" name="hadiah_mkts" value="<?php echo $row['hadiah_mkts']; ?>">
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