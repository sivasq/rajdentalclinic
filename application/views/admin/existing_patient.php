<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- mask -->
    <div class="mask">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Existing Patient
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url() . 'admin/dashboard' ?>">Dashboard</a></li>
                <li class="active">Existing Patient</li>
            </ol>
            <hr/>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row existing_patient">

                    <!-- data table patient list table view -->
                    <div class="post-search-panel">
                        <div class="row no-margin">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label style="cursor: pointer;">
                                        <input style="vertical-align: top;" type="radio" name="filterType"
                                               class="minimal"
                                               value='id' checked>&nbsp;&nbsp;ID
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <label style="cursor: pointer;">
                                        <input style="vertical-align: top;" type="radio" name="filterType"
                                               class="minimal" value='name'>&nbsp;&nbsp;Name
                                    </label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <label style="cursor: pointer;">
                                        <input style="vertical-align: top;" type="radio" name="filterType"
                                               class="minimal" value='phone'>&nbsp;&nbsp;
                                        Mobile
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row no-margin">
                            <div class="form-group">
                                <div class="col-xs-5">
                                    <input class="form-control" type="text" id="keywords"
                                           placeholder="search by patient ID / Name / Mobile"
                                           onsubmit="searchFilter()"/>
                                </div>
                                <button id="myBtn" class="btn btn-primary" onclick="filter()">Search</button>
                                <button class="btn btn-danger" onclick="reset_filter()">Reset Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="data-table">
                        <table id="existing_patient1" class="table">
                            <thead>
                            <tr>
                                <th>Patient ID</th>
                                <th>Patient Name</th>
                                <th>Phone</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
							<?php foreach ($patient_info as $p_info) { ?>
                                <tr>
                                    <td><?php echo $p_info->p_id ?></td>
                                    <td><?php echo $p_info->p_name ?></td>
                                    <td><?php echo $p_info->p_phone ?></td>
                                    <td><a href="<?php echo base_url() . 'admin/patient_details/' . $p_info->p_id ?>"
                                           class="btn violet btn-info btn-icon icon-left">View Details</a></td>
                                    <td>
                                        <button class="btn btn-danger btn-icon icon-left"
                                                onclick=archive('<?php echo $p_info->p_id ?>//');>Archive
                                        </button>
                                    </td>
                                </tr>
							<?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- render pagination links -->


                    <!--/.data table patient list table view -->
                </div>
				<?php
//				if (count($patient_info) >= 1) {
                if (!isset($_GET['filter'])) { ?>
                    <ul class="pagination text-center">
						<?php echo $this->pagination->create_links(); ?>
                    </ul>
				<?php } ?>
            </div>
    </div>
    </section>
    <!-- /.Main content -->

</div>
<!--/.mask-->
</div>
<!-- /.content-wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    // Get the input field
    var input = document.getElementById("keywords");

    // Execute a function when the user releases a key on the keyboard
    input.addEventListener("keyup", function (event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            // Cancel the default action, if needed
            event.preventDefault();
            // Trigger the button element with a click
            document.getElementById("myBtn").click();
        }
    });

    function filter() {
        var filterType = $("input[name='filterType']:checked").val();
        console.log(filterType);
        var redirect_url = 'http://rajdental/';
        if (input.value != "") {
            window.location.href = redirect_url + 'admin/existing_patient/?filter=' + input.value + '&filterType=' +
                filterType;
        } else {
            window.location.href = redirect_url + 'admin/existing_patient';
        }
    }

    function reset_filter() {
        var redirect_url = 'http://rajdental/';
        window.location.href = redirect_url + 'admin/existing_patient';
    }
</script>


