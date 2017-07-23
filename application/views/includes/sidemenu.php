<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
        <!-- sidebar menu -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            
            <li class="<?php if($page_name == 'dashboard') echo 'active'; ?> ">
                <a href="<?php echo base_url().'admin/dashboard';?>">
                    <i class="sq sq-dashboard"></i> <span>My Dashboard</span>            
                </a>         
            </li>

            <li class="<?php if($page_name == 'new_patient') echo 'active'; ?>">
                <a href="<?php echo base_url().'admin/new_patient';?>">
                    <i class="sq sq-user2"></i> <span>New Patient</span>            
                </a>         
            </li>

            <li class="<?php if($page_name == 'existing_patient') echo 'active'; ?>">
                <a href="<?php echo base_url().'admin/existing_patient';?>">
                    <i class="sq sq-usersews"></i> <span>Existing Patient</span>            
                </a>         
            </li>

            <li class="<?php if($page_name == 'drugs') echo 'active'; ?>">
                <a href="<?php echo base_url().'admin/drugs';?>">
                    <i class="sq sq-pill-and-tablet"></i> <span>Drugs</span>            
                </a>         
            </li>

            <li class="<?php if($page_name == 'treat_type') echo 'active'; ?>">
                <a href="<?php echo base_url().'admin/treat_types';?>">
                    <i class="sq sq-note2"></i> <span>Treatment Types</span>            
                </a>         
            </li>
    
            <!--<li class="<?php if($page_name == 'prescription') echo 'active'; ?>">
                <a href="#">
                    <i class="sq sq-note2"></i> <span>Prescription</span>            
                </a>         
            </li>-->
    
            <li class="<?php if($page_name == 'profile') echo 'active'; ?>">
                <a href="<?php echo base_url().'admin/auth_profile';?>">
                    <i class="sq sq-user2"></i> <span>User Profile</span>            
                </a>         
            </li>
    
            <li class="<?php if($page_name == 'settings') echo 'active'; ?>">
                <a href="#">
                    <i class="sq sq-controls"></i> <span>Settings</span>            
                </a>         
            </li>
    
            <li class="<?php if($page_name == 'export') echo 'active'; ?>">
                <a href="#">
                    <i class="sq sq-export-document"></i> <span>Export</span>            
                </a>         
            </li>
    
            <li class="<?php if($page_name == 'help') echo 'active'; ?>">
                <a href="<?php echo base_url().'admin/help';?>">
                    <i class="sq sq-help-cursor"></i> <span>Help</span>            
                </a>         
            </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>