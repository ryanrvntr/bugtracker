<div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h3 class="modal-title" id="lineModalLabel">Add Project</h3>
    </div>
    <div class="modal-body">
  <div class="form-group row">
    <label for="input-name" class="col-sm-2 col-form-label">name</label>
    <div class="col-sm-10">
     <input type="text" name="name" class="form-control" readonly id="input-name" placeholder="name" value="<?php echo $data->name ?>">
     <?php echo form_error('name') ?>
   </div>
 </div>
 <div class="form-group row">
    <label for="input-description" class="col-sm-2 col-form-label">description</label>
    <div class="col-sm-10">
     <input type="text" name="description" class="form-control" readonly id="input-description" placeholder="description" value="<?php echo $data->description ?>">
     <?php echo form_error('description') ?>
   </div>
 </div>

</div>

    <div class="modal-footer">
      
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>

