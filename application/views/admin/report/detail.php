<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Detail Report
    </h1>
    <ol class="breadcrumb">
      <li><a href="report.html"><i class="fa fa-dashboard"></i> Report</a></li>
      <li class="active">Detail Report</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <div class="col-md-12">
      <!-- Box Comment -->
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <img class="img-circle" src="<?php echo base_url('uploads/users/'.$report->image_users) ?>" alt="User Image">
            <span class="username"><a href="#"><?php echo $report->name_users ?></a></span>
            <span class="description">Shared publicly - 7:30 PM Today</span>
          </div>
          <!-- /.user-block -->

          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <h3><?php echo $report->subject ?></h3>
          <!-- post text -->
          <p><?php echo $report->description ?></p>

          <!-- Attachment -->
          <div class="attachment-block clearfix">
            <a data-fancybox="gallery" href="../dist/img/photo1.png"><img class="attachment-img" src="<?php echo base_url('uploads/report/'.$report->image) ?>" alt="Attachment Image"></a>
          </div>
        </div>

      </div>

      <?php foreach ($this->db->get('report_detail')->result() as $key => $value): ?>
      <?php if ($value->users_id_mod != null): ?>
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">


                <?php echo $this->db->where('id',$value->users_id_mod)->get('users')->row(0)->firstname ?>
              </div>
              <div class="panel-body">
                <img src="<?php echo base_url('uploads/report/'.$value->image) ?>" width="75px"><br>
                <?php echo $value->message ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>

      <?php if ($value->users_id_client != null): ?>
        <div class="row">
          <div class="col-md-6 pull-right">
            <div class="panel panel-default">
              <div class="panel-heading">
                <?php echo $this->db->where('id',$value->users_id_client)->get('users')->row(0)->firstname ?>
              </div>
              <div class="panel-body">
                <img src="<?php echo base_url('uploads/report/'.$value->image) ?>" width="75px"><br>
                <?php echo $value->message ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
    <?php endforeach ?>

    <div class="box">
      <div class="box-header">
      </div>
      <!-- /.box-header -->

      <div class="box-body">
        <?php echo form_open_multipart('') ?>
        <?php echo validation_errors(); ?>



        <!-- textarea -->
        <div class="form-group">
          <label>Description Report</label>
          <textarea class="form-control" name="message" rows="3" placeholder="Enter ..."></textarea>
        </div>






        <!-- /.input group -->
      </div>

      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" name="image" id="exampleInputFile">
        <?php echo (isset($error) ? $error : "") ?>
      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

    </form>
  </div>
  <!-- /.box -->
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
