  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Report
      </h1>
      <ol class="breadcrumb">
        <li><a href="report.html"><i class="fa fa-dashboard"></i> Report</a></li>
        <li class="active">Add Report</li>
      </ol>
    </section>
    <section class="content container-fluid" >
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
          </div>
          <!-- /.box-header -->
          <?php echo form_open_multipart('',array('id'=>'formdata')) ?>
          <div class="box-body">
            <!-- text input -->
            <div class="form-group">
              <label>clint name</label>
              <select name="users" class="form-control">
                <?php foreach ($client as $value): ?>
                  <option value="<?php echo $value->id ?>"><?php echo $value->firstname ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <!-- select -->
            <div class="form-group">
              <label>Project name</label>
              <select name="project" class="form-control">
                <?php foreach ($project as $value): ?>
                  <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <div class="form-group">
              <label>status</label>
              <select name="status" class="form-control">
                <?php foreach ($status as $value): ?>
                  <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                <?php endforeach ?>
              </select>
            </div>

            <!-- select -->
            <div class="form-group">
              <label>Priority</label>
              <select name="priority" class="form-control">
                <?php foreach ($priority as $value): ?>
                  <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label>Subject</label>
              <input type="text" name="subject" class="form-control" id="input-subject" placeholder="subject" value="<?php echo set_value('subject') ?>">
              <?php echo form_error('subject') ?>
            </div>
            <!-- textarea -->
            <div class="form-group">
              <label>Description Report</label>
              <textarea name="description" class="form-control" rows="3" placeholder="Enter ..."><?php echo set_value('description') ?></textarea>
            </div>

            <div class="row mb-2">
              <div class="col-md-10">
                <img src="<?php echo base_url('assets\assets\images\holder\holder.png') ?>" alt="" width="100px" class="img-preview">
                <img src="<?php echo base_url('assets\assets\images\holder\holder.png') ?>" alt="" width="75px" class="img-preview align-bottom ml-3">
                <img src="<?php echo base_url('assets\assets\images\holder\holder.png') ?>" alt="" width="50px" class="img-preview align-bottom ml-3">
              </div>
            </div>
            <div class="form-group">
              <label>Foto</label>
              <input type="file" name="foto" class="form-control" id="input-foto" placeholder="foto" accept="image/*">
              <?php echo (isset($error) ? $error : "" ) ?>

            </div>
            <?php echo form_close(); ?>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary" form="formdata">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
   $("form#formdata").submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);    

    $.ajax({
      url: "<?php echo base_url('Admin/'.$c_name.'/insert') ?>",
      type: 'POST',
      data: formData,
      success: function (data) {
        swal("Data Berhasil Masuk", {
          icon: "success",
        });
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