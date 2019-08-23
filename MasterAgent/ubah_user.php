<!-- Edit -->
<div class="modal hide fade" id="edit_<?php echo $row['username']; ?>">
  <div class="modal-header">
    <button class="close" data-dismiss="modal">×</button>
    <h3>UPDATE DATA AGENT</h3>
  </div>

  <div class="modal-body">
    <div class="container-fluid">
    <form method="POST" action="proses_ubah_user.php">
    <input type="hidden" class="form-control" name="username" value="<?php echo $row['username']; ?>">
      <div class="span12">
        <label>First name</label>
        <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" class="span8" />
      </div>
      <div class="span12">
        <label>Last name</label>
        <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" class="span8" />
      </div>
      <div class="span12">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" class="span8" />
      </div>
      <div class="span12">
        <label>Mobile</label>
        <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" class="span8" />
      </div>
      </div>
  </div>

  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" name="submit" value="Save" class="btn btn-success">Update</a></button>
  </div>
</form>
</div>
