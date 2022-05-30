<?php include('include/header.php');?>
  <!-- Left side column. contains the sidebar -->
  <?php include('include/leftsidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Pace page -->Project Trash
        <!-- <small>Loading example</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>

        <li class="active">Project Trash</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box">

                     <!-- /.box-header -->
                     <div class="box-body table-responsive">
                       <table id="example2" class="table table-hover table-striped">
                         <thead>
                           <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                              text-transform:uppercase;">
                          <!-- <th><input type="checkbox" onclick="javascript:checkAll(this);">&nbsp;&nbsp;All</th> -->
                          <!-- <th>id</th> -->
                          <th>Sno</th>
                          <th>Code</th>
                          <th>title</th>

                      <th>last Update</th>
                     <th>Status</th>
                      <th>Action</th>
                         </tr>
                         </thead>
                         <?php
                         $where= array(
                      "is_deleted" => 1,
                      );
               $myrow = $obj->fetch_all_record("projects",$where);
 $sn=1;
               if($myrow != null) {
               foreach ($myrow as $row) {
               // echo $row['id']...
               // $services='<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="#!" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';
             // $reference='<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-plus"></i></a>&nbsp; <a href="#!" class="btn btn-primary btn-xs"> <i class="fa fa-eye"></i></a>';
             $varact=  $row['is_deleted'] != 0 ? '<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>':'<a href="#!" class="btn btn-success btn-xs"> <i class="fa fa-eye"></i></a>&nbsp;<a href="laboratories.php?id='.$row['id'].'" class="btn btn-primary btn-xs"> <i class="fa fa-edit"></i></a>&nbsp;';
             $varact2= $row['is_deleted'] != 0 ? '<a href="#!" onclick="javascript:restore('.$row['id'].',\'projects\');" class="btn btn-info btn-xs"> <i class="fa fa-undo"></i></a>&nbsp;<a href="#!" onclick="javascript:deleteThisRecord('.$row['id'].',\'projects\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>':'<a href="#!" onclick="javascript:deleteThisRow('.$row['id'].',\'clients\');" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>';
              $c_at= date_format(date_create($row['created_at']),'d-M-Y');
              $u_at= $row['updated_at'] != null ? date_format(date_create($row['updated_at']),'d-M-Y') : $c_at;

             $last_update='<p class="text-danger">Created At: '.$c_at.'</p> <p class="text-success">Last Update At: '.$u_at.'</p>';
             $sts=$row['status'] != 0 ? '<small class="label bg-green1">Active</small>': '<small class="label bg-red1">Inactive</small>';

               ?>
                         <tbody id="tbody">
                           <!-- <td><?php echo $row['id']; ?></td> -->
                           <td><?php echo $sn; ?></td>
                           <td><?php echo $row['project_code']; ?></td>
                           <td><?php echo $row['title']; ?></td>
                           <td><?php echo $last_update; ?></td>
                           <td><?php echo $sts; ?></td>
                           <td><?php echo $varact2; ?></td>
                         </tbody>
                    <?php
                    $sn++;
                  }
                }
                    ?>
                           <tfoot>
                           <tr style="color:#fff;background: #aa4b6b;background: -webkit-linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);background: linear-gradient(to right, #3b8d99, #6b6b83, #aa4b6b);
                            text-transform:uppercase;">
                            <!-- <th>id</th> -->
                            <th>Sno</th>
                            <th>Code</th>
                            <th>title</th>

                            <th>last Update</th>
                           <th>Status</th>
                            <th>Action</th>
                         </tr>
                         </tfoot>
                       </table>
                     </div>
                     <!-- /.box-body -->
                </div>
        </div>
      </div>
</section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('include/footer.php');?>
  <script>
  function 	RefreshView() {
  	self.location="project-trash.php?m=active";
}
$(function () {
$('#example2').DataTable({
   "order": [[ 0, "desc" ]],
  // "columnDefs": [
  //          {
  //              "targets": [ 0 ],
  //              "visible": false,
  //              "searchable": false
  //          }
  //      ]
});
});
  </script>
