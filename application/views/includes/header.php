<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  
  <title>::Raj Dental Clinic::</title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/Bootstrap3.3.7.css'?>">
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-icons/font-awesome4.6.3/css/font-awesome.css'?>" type="text/css">
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/iCheck/all.css'?>">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/select2.min.css'?>">

  <!-- Custom Fonts -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/font-icons/my-fonts/my-fonts.css'?>" type="text/css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/AdminLTE.css'?>">
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/skins/skin-blue.css'?>">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/css/custom.css'?>">

</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
  
  <div class="wrapper">

  <header class="main-header">
    
    <!-- Logo -->
    <a href="#" class="logo hidden-sm hidden-md hidden-lg">      
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo base_url().'assets/img/logo.png'?>" class="" alt="logo"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-left hidden-xs">
        <ul class="nav navbar-nav">
          <li class="custom-logo">
            <img src="<?php echo base_url().'assets/img/logo.png'?>" class="" alt="logo">
          </li>
        </ul>
      </div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="#" class="upper">
              WELCOME &nbsp;&nbsp;<?php echo $this->session->userdata('name'); ?>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url().'login/logout'?>">
              <i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Log Out
            </a>
          </li>
        </ul>
      </div>

    </nav>

  </header>  