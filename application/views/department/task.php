
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 
            Table Task
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol>
</section>
<section class="content container-fluid">

    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">


          <div class="row">
            <div class="col-sm-12">


                <table id="product-table" class="table table-striped table-bordered" cellspacing="0" width="100%"></table>
            </div>
        </div>

        <!-- /.box-body -->
    </div>
</section>
</div>
<div class="modal fade" id="modal">
    <div class="modal-dialog" id="modal-content">

    </div>
</div>
<script>
    $(document).ready(() => {
        $('#product-table').DataTable( {
            "ajax": {
                'url': "<?= base_url('Department/'.$c_name.'/getdata') ?>",
            },
            "columns": [
            {
                "title" : "No",
                "width" : "15px",
                "data": null,
                "visible":true,
                "class": "text-center",
                render: (data, type, row, meta) => {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            { 
                "title" : "Project Name",
                "data": "project" 
            },
            { 
                "title" : "Subject",
                "data": "subject" 
            },
            { 
                "title" : "Message",
                "data": "message" 
            },
            { 
                "title" : "Status",
                "data": "status",
                render: (data,type,row) => {
                    var ret = "";
                    if (data == "pending") {
                        ret = '<span class="label label-default">'+data+'</span>';
                    }else if(data == "on progress"){
                        ret = '<span class="label label-primary">'+data+'</span>';
                    }else if(data == "completed"){
                        ret = '<span class="label label-success">'+data+'</span>';
                    }
                    return ret;
                } 
            },
            { 
                "title" : "Priority",
                "data": "priority" 
            },
            {
                "title": "Actions",
                "width" : "120px",
                'datastatus' : "status",
                "visible":true,
                "class": "text-center",
                "data": (data, type, row) => {
                    let isDisabledProgress = "";
                    let isDisabledCompleted = "";
                    if (data.status == 'on progress') {
                        isDisabledProgress = "disabled";
                    }else if (data.status == 'completed') {
                        isDisabledProgress = "disabled";
                        isDisabledCompleted = "disabled";
                    }
                    let ret = "";
                    ret += ' <button onclick="update_status('+data.report_id+',2); return false;" class="btn btn-xs btn-rounded btn-info" '+isDisabledProgress+'> progress</button>';
                    ret += ' <button onclick="update_status('+data.report_id+',3); return false;" class="btn btn-xs btn-rounded btn-success" '+isDisabledCompleted+'> Completed</button>';
                    return ret;
                },
            }
            ]
        } );
    });

    function reload_table() {
        $('#product-table').DataTable().ajax.reload(null,false);
    }

    function update_status(id,status){

        $.ajax({
            url: "<?php echo base_url('Department/'.$c_name.'/update_status/') ?>"+id+"/"+status,
            data: null,
            success: function(data)
            {
                reload_table();
            }
        });
    }

</script>

<!-- Primary table end -->
<!-- Dark table start -->
<!-- <div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">
                Data <?php echo $c_name ?> 

                <button type="button" class="btn btn-sm btn-primary btn-flat float-right mb-3" onclick="input_form();"><i class="fa fa-plus"></i> Tambah Data</button>
            </h4>

            <div class="data-tables datatable-dark">
                <table id="product-table" class="display nowrap table table-striped table-bordered" cellspacing="0" width="100%"></table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg" id="modal-content">

    </div>
</div>
<script>
    $(document).ready(() => {
        $('#product-table').DataTable( {
            "ajax": {
                'url': "<?= base_url('Admin/'.$c_name.'/getdata') ?>",
            },
            "columns": [
            {
                "title" : "No",
                "width" : "15px",
                "data": null,
                "visible":true,
                "class": "text-center",
                render: (data, type, row, meta) => {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
                { 
                "title" : "Nama",
                "data": "nama" },
                {
                    "title": "Actions",
                    "width" : "120px",
                    "data":'id',
                    "visible":true,
                    "class": "text-center",
                    render: (data, type, row) => {
                        let ret = "";
                        ret += ' <a href="#" onclick="info_form('+data+'); return false;" class="btn btn-xs btn-rounded btn-info"> <i class="fa fa-info-circle"></i> Lihat</a>';
                        ret += ' <a href="#" onclick="update_form('+data+'); return false;" class="btn btn-xs btn-rounded btn-success"> <i class="fa fa-pencil"></i> Edit</a>';
                        ret += ' <a href="#" onclick="delete_form('+data+')" class="btn btn-xs btn-rounded btn-danger"> <i class="fa fa-trash"></i> Hapus</a>';
                        return ret;
                    }
                }
                ]
            } );
    });

    function reload_table() {
        $('#product-table').DataTable().ajax.reload(null,false);
    }

    function info_form(id) {
        $('#modal').modal('show');

        $.ajax({
            url: "<?php echo base_url('Admin/'.$c_name.'/info/') ?>"+id,
            data: null,
            success: function(data)
            {
                $('#modal-content').html(data);
            }
        });
    }

    function input_form() {
        $('#modal').modal('show');
        $.ajax({
            url: "<?php echo base_url('Admin/'.$c_name.'/insert') ?>",
            data: null,
            success: function(data)
            {
                $('#modal-content').html(data);
            }
        });
    }
    function update_form(id) {
        $('#modal').modal('show');
        $.ajax({
            url: "<?php echo base_url('Admin/'.$c_name.'/update/') ?>"+id,
            data: null,
            success: function(data)
            {
                $('#modal-content').html(data);
            }
        });
    }
    function delete_form(id) {
        swal({
          title: "Apakah anda yakin?",
          text: "Setelah anda menghapus, data ini tidak dapat kembali",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                url: "<?php echo base_url('Admin/'.$c_name.'/delete/') ?>"+id,
                data: null,
                success: function(data)
                {
                    swal("Data berhasil di hapus", {
                        icon: "success",
                    });
                    reload_table();
                }
            });
            
        } else {
            swal("Data aman", {
                icon: "info",
            });
        }
    });


    }
</script> -->
