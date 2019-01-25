<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>

  </section>

  <!-- Main content -->
  <section class="content container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $this->db->select('count(id) as jml')->get('report')->row(0)->jml ?></h3>

            <p>Total</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $this->db->select('count(id) as jml')->where('status_id',1)->get('report')->row(0)->jml ?></h3>

            <p>Pending</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $this->db->select('count(id) as jml')->where('status_id',2)->get('report')->row(0)->jml ?></h3>

            <p>On Progress</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $this->db->select('count(id) as jml')->where('status_id',3)->get('report')->row(0)->jml ?></h3>

            <p>Completed</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <div class="row">

      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">List Client</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body box-profile">
            <ul class="list-group list-group-unbordered">
              <?php foreach ($this->db->where('level_id',3)->get('users')->result() as $key => $value): ?>
              <div class="col-md-4">
                <li class="list-group-item">
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/users/'.$value->image) ?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $value->firstname." ".$value->lastname ?></h3>
                  <p class="text-muted text-center"><?php echo $value->email ?></p>
                </li>
              </div>
            <?php endforeach ?>

          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">List Departement</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <?php 
          $this->db->select('report.*,concat(users.firstname," ",users.lastname) as name_users,users.image as image_users');
          $this->db->join('users','report.users_id=users.id');
          $query = $this->db->get('report');  ?>
          <table class="table">
            <tbody><tr>
              <th style="width: 10px">Department</th>
              <th>Subject</th>
              <th>Progress</th>
              <th style="width: 40px">Label</th>
            </tr>
            <?php foreach ($query->result() as $key => $value): ?>
              <tr>
              <td>
                <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('uploads/users/'.$value->image_users) ?>" alt="User profile picture">
                <p class="profile-username text-center"><?php echo $value->name_users ?></p>
              </td>
              <td><?php echo $value->subject ?></td>
              <td>
                <div class="progress progress-xs">
                  <?php if ($value->status_id == "1"): ?>
                  <div class="progress-bar progress-bar-success" style="width: 0%"></div>
                  <?php elseif($value->status_id == "2"): ?>
                  <div class="progress-bar progress-bar-primary" style="width: 50%"></div>
                  <?php elseif($value->status_id == "3"): ?>  
                  <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                  <?php endif ?>
                </div>
              </td>
              <td>
                <?php if ($value->status_id == "1"): ?>
                  <span class="badge progress-bar-default">0%</span>
                  <?php elseif($value->status_id == "2"): ?>
                  <span class="badge progress-bar-primary">50%</span>
                  <?php elseif($value->status_id == "3"): ?>  
                  <span class="badge progress-bar-success">100%</span>
                <?php endif ?>

              </td>
            </tr>
            <?php endforeach ?>
          </tbody></table>
        </div>
      </div>
    </div>
  </div>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">List Task</h3>

      <div class="box-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

          <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
      <table class="table table-hover">
        <tbody><tr>
          <th>ID</th>
          <th>User</th>
          <th>Date</th>
          <th>Status</th>
          <th>Reason</th>
        </tr>
        <tr>
          <td>183</td>
          <td>John Doe</td>
          <td>11-7-2014</td>
          <td><span class="label label-success">Approved</span></td>
          <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
        </tr>
        <tr>
          <td>219</td>
          <td>Alexander Pierce</td>
          <td>11-7-2014</td>
          <td><span class="label label-warning">Pending</span></td>
          <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
        </tr>
        <tr>
          <td>657</td>
          <td>Bob Doe</td>
          <td>11-7-2014</td>
          <td><span class="label label-primary">Approved</span></td>
          <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
        </tr>
        <tr>
          <td>175</td>
          <td>Mike Doe</td>
          <td>11-7-2014</td>
          <td><span class="label label-danger">Denied</span></td>
          <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
        </tr>
      </tbody></table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box-body -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
