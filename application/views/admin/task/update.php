<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <h3 class="modal-title" id="lineModalLabel">Add Project</h3>
  </div>
  <div class="modal-body">
    <?php echo form_open_multipart('',array('id'=>'formdata')) ?>

    <div class="form-group row">
      <label for="input-user" class="col-sm-2 col-form-label">users</label>
      <div class="col-sm-10">
        <select name="users" class="form-control">
          <?php foreach ($users as $value): ?>
            <option value="<?php echo $value->id ?>"><?php echo $value->firstname ?></option>
          <?php endforeach ?>

        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="input-fk_level" class="col-sm-2 col-form-label">report</label>
      <div class="col-sm-10">
        <select name="report" class="form-control">
          <?php foreach ($report as $value): ?>
            <option value="<?php echo $value->id ?>"><?php echo $value->subject ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="input-fk_level" class="col-sm-2 col-form-label">priority</label>
      <div class="col-sm-10">
        <select name="priority" class="form-control">
          <?php foreach ($priority as $value): ?>
            <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="input-message" class="col-sm-2 col-form-label">message</label>
      <div class="col-sm-10">
       <textarea type="text" name="message" class="form-control" id="input-message" placeholder="message" ><?php echo $data->message; ?></textarea>
       <?php echo form_error('name') ?>
     </div>
   </div>


   <?php echo form_close(); ?>
 </div>

 <div class="modal-footer">

   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   <button type="submit" class="btn btn-primary" form="formdata">Save changes</button>
 </div>
</div>

<script>
 $("form#formdata").submit(function(e) {
  e.preventDefault();

  var formData = new FormData(this);    

  $.ajax({
    url: "<?php echo base_url('Admin/'.$c_name.'/update/'.$data->id) ?>",
    type: 'POST',
    data: formData,
    success: function (data) {
     $('#modal-content').html(data);
     reload_table();
   },
   cache: false,
   contentType: false,
   processData: false
 });
});

 function readURL(input) {

  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.img-preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);

    

  }
}

$("#input-foto").change(function() {

  var size = this.files[0].size/1024/1024;
  if (size >= 2) {
    alert('File larger than 2 MB');
    $('#input-foto').val(null);
  }else{
    readURL(this);
  }
});
</script>