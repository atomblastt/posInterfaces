<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
          <title><?= $title ?></title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
          <meta content="Coderthemes" name="author" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <!-- App favicon -->
          <link rel="shortcut icon" href="<?=base_url('assets/template/')?>brg.png">

          <!-- third party css -->
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
          <!-- third party css end -->

          <!-- Plugins -->
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
          <link href="<?=base_url('assets/template/dist/')?>assets/libs/dropify/css/dropify.min.css" rel="stylesheet" type="text/css" />

               <!-- App css -->
          <link href="<?=base_url('assets/template/dist/')?>assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" disabled="disabled" />
          <link href="<?=base_url('assets/template/dist/')?>assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" disabled="disabled" />

          <link href="<?=base_url('assets/template/dist/')?>assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
          <link href="<?=base_url('assets/template/dist/')?>assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

          <!-- icons -->
          <link href="<?=base_url('assets/template/dist/')?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

          <style>
               .left-side-menu, .logo-box {
                    background: #fbde00;
                    background-image: linear-gradient(270deg,#282e38,#000000a6);
                    background-color: #fbde0082 !important;
               }
               .avatar-md {
                    height: 5.5rem;
                    width: 5.5rem;
                    margin-bottom:10px;
               }
               .nav-list-text {
                    font-weight:bold;
               }
               .header-table {
                    display:inline-flex;
               }
               .add-button {
                    float:right;
                    margin-bottom: 15px;
               }
               .btn-success {
                    color: #1e191a;
                    background-color: #e1c811;
                    border-color: #e8cf15;
               }
               body[data-sidebar-color=dark] .left-side-menu #sidebar-menu .menuitem-active .active {
                    color: #e1c811;
               }
               .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
                    color: #282e38;
                    background-color: #e1c811;
               }
               .navtab-bg .nav-link {
                    border: 1px solid #e1c811;
               }
               .nav-link:focus {
                    color: #e1c811; !important;
               }
               .nav-link:hover {
                    color: #e1c811; !important;
               }
               .form-group{
                    margin-bottom:10px !important;
               }
               .btn-info {
                    color: #9097a7;
                    background-color: #313844;
                    border-color: #e1c811;
               }
          </style>

     </head>

     <!-- body start -->
     <body class="loading" data-layout='{"mode": "dark", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "dark", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

          <!-- Begin page -->
          <div id="wrapper">