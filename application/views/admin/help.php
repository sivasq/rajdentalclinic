<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- mask -->
<div class="mask">
  <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Drugs
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active">Drugs</li>
        </ol>
        <hr/>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>Raj Dental Clinic Help Desk</h3>
            </div>

            <div class="col-sm-12">
                <div style="background-color: #fff; border:1px solid #eee; margin:0 auto; width: 80%;margin-top: 25px;">

                 <div class="panel-group">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse1">1. How to Backup Database ?</a>
                      </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                      <div class="panel-body">
                          
                        <div class="row">
                            <div class="col-sm-10">
                                <p><a style="color:#000;" href="<?php echo base_url().'assets/docs/database_backup_procedure.docx'; ?>" style="width:150px;" alt="logo">Click here to Read How to take Database backup ?</a></p>
                            </div>
                        </div>

                      </div>                      
                    </div>
                  </div>
                </div>

                </div>
            </div>
                

        </div>
    </section>
    <!-- /.Main content -->

</div>
<!--/.mask-->
</div>
<!-- /.content-wrapper -->


<!-- add drugs Modal -->
  <div class="modal fade" id="add_drugs" role="dialog" style="z-index:99999;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Add Drugs</h4>
        </div>
        <div class="modal-body">        
          <div class="prescription_details">
          
          </div>
        </div><!--/.modal nody -->
        <div class="modal-footer">
        </div>
      </div><!--/. Modal content-->
    </div><!--/.Modal dialog-->
  </div>
  <!--/.add drugs modal -->