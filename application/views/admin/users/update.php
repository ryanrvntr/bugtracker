<div class="modal-content">
  <div class="modal-header bg-yellow">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <h3 class="modal-title" id="lineModalLabel">Add Users</h3>
  </div>
  <div class="modal-body">
    <?php echo form_open_multipart('',array('id'=>'formdata')) ?>
    <?php echo validation_errors(); ?>
    <div class="form-group row">
      <label for="input-firstname" class="col-sm-2 col-form-label">firstname</label>
      <div class="col-sm-10">
        <input type="text" name="firstname" class="form-control" id="input-firstname" placeholder="firstname" value="<?php echo $data->firstname ?>">
        <?php echo form_error('firstname') ?>
      </div>
    </div>
    <div class="form-group row">
      <label for="input-lastname" class="col-sm-2 col-form-label">lastname</label>
      <div class="col-sm-10">
       <input type="text" name="lastname" class="form-control" id="input-lastname" placeholder="lastname" value="<?php echo $data->lastname ?>">
       <?php echo form_error('lastname') ?>
     </div>
   </div>
   <div class="form-group row">
    <label for="input-email" class="col-sm-2 col-form-label">email</label>
    <div class="col-sm-10">
     <input type="text" name="email" class="form-control" id="input-email" placeholder="email" value="<?php echo $data->email ?>">
     <?php echo form_error('email') ?>
   </div>
 </div>
 <div class="form-group row">
  <label for="input-password" class="col-sm-2 col-form-label">password</label>
  <div class="col-sm-10">
   <input type="password" name="password" class="form-control" id="input-password" placeholder="password" value="<?php echo $data->password ?>">
   <?php echo form_error('password') ?>
 </div>
</div>
<div class="form-group row">
  <label for="input-address" class="col-sm-2 col-form-label">address</label>
  <div class="col-sm-10">
   <input type="text" name="address" class="form-control" id="input-address" placeholder="address" value="<?php echo $data->address ?>">
   <?php echo form_error('address') ?>
 </div>
</div>
<div class="form-group row">
  <label for="input-telp" class="col-sm-2 col-form-label">telp</label>
  <div class="col-sm-10">
   <input type="text" name="telp" class="form-control" id="input-telp" placeholder="telp" value="<?php echo $data->telp ?>">
   <?php echo form_error('telp') ?>
 </div>
</div>
<div class="form-group row">
  <label for="input-fk_level" class="col-sm-2 col-form-label">Level</label>
  <div class="col-sm-10">
    <select name="level" class="form-control">
      <?php foreach ($level as $value): ?>
        <option value="<?php echo $value->id ?>">
          <?php echo $value->name ?></option>
        <?php endforeach ?>
      </select>
      <script type="text/javascript">
        $('select[name="level"]').val('<?php echo $data->level_id ?>')
      </script>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-sm-2"></div>
    <div class="col-md-10">
      <img src="<?php echo base_url('uploads/users/'.$data->image) ?>" alt="" width="100px" class="img-preview">
      <img src="<?php echo base_url('uploads/users/'.$data->image) ?>" alt="" width="75px" class="img-preview align-bottom ml-3">
      <img src="<?php echo base_url('uploads/users/'.$data->image) ?>" alt="" width="50px" class="img-preview align-bottom ml-3">
    </div>
  </div>
  <div class="form-group row">
    <label for="input-foto" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10">
      <input type="file" name="foto" class="form-control" id="input-foto" placeholder="foto" accept="image/*">
      <?php echo (isset($error) ? $error : "" ) ?>
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