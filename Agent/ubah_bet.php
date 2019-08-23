<div class="modal hide fade" id="edit_<?php echo $row['username']; ?>">
  <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>UPDATE Max Credit/Min Max/EM</h3>
  </div>

  <div class="modal-body">
    <div class="container-fluid">
    <form method="POST" action="proses_ubah_bet.php">
    <input type="hidden" class="form-control" name="username" value="<?php echo $row['username']; ?>">
      <div class="span12">
        <label>Last Name :</label>
        <input type="text" name="last_name" id="last_name" value="<?php echo $row['last_name']; ?>" class="span8" />
      </div>
      <div class="span12">
        <label>Max Bet 2d :</label>
        <input type="text" name="max_bet_2d" id="max_bet_2d" value="<?php echo $row['max_bet_2d']; ?>" class="span8" />
      </div>
      <div class="span12">
        <label>Max Bet 3d :</label>
        <input type="text" name="max_bet_3d" id="max_bet_3d" value="<?php echo $row['max_bet_3d']; ?>" class="span8" />
      </div>
      <div class="span12">
        <label>Max Bet 4d :</label>
        <input type="text" name="max_bet_4d" id="max_bet_4d" value="<?php echo $row['max_bet_4d']; ?>" class="span8" />
      </div>
      <div class="span12">
        <label>Max Bet Other :</label>
        <input type="text" name="max_bet_other" id="max_bet_other" value="<?php echo $row['max_bet_other']; ?>" class="span8" />
      </div>
      </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" name="submit" value="Save" class="btn btn-success">Update Bet</a></button>
  </div>
</form>
</div>
