<div class="modal hide fade" id="tambah_<?php echo $row['username']; ?>">
  <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>Tambah Credit</h3>
  </div>

  <div class="modal-body">
    <div class="container-fluid">
    <form method="POST" action="proses_tambah_kredit.php">
      <div class="span12">
        <label>Username :</label>
        <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" class="span8" />
      </div>
      <div class="span12">
        <label>Credit :</label>
        <input type="text" name="credit" id="credit" value="" class="span8" />
      </div>
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" name="submit" value="Save" class="btn btn-success">Tambah Credit</a></button>
  </div>
</form>
</div>

<div class="modal hide fade" id="kurang_<?php echo $row['username']; ?>">
  <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>Kurang Credit</h3>
  </div>

  <div class="modal-body">
    <div class="container-fluid">
    <form method="POST" action="proses_kurang_kredit.php">
      <div class="span12">
        <label>Username :</label>
        <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" class="span8" />
      </div>
      <div class="span12">
        <label>Credit :</label>
        <input type="text" name="credit" id="credit" value="" class="span8" />
      </div>
    </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" name="submit" value="Save" class="btn btn-success">Kurang Credit</a></button>
  </div>
</form>
</div>
