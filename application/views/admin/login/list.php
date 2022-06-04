
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
<title>Burger Guns Cloth</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- App favicon -->
<link rel="shortcut icon" href="<?=base_url('assets/template/')?>brg.png">

		<!-- App css -->
<link href="<?=base_url('assets/template/dist/')?>assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
<link href="<?=base_url('assets/template/dist/')?>assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

<link href="<?=base_url('assets/template/dist/')?>assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled" />
<link href="<?=base_url('assets/template/dist/')?>assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled" />

<!-- icons -->
<link href="<?=base_url('assets/template/dist/')?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<style>
  body.authentication-bg {
    background-image: none;
  }
  .btn-primary {
    color: #1e191a;
    background-color: #fcdf00;
    border-color: #f9c851;
  }
  .form-check-input:checked {
    background-color: #fcdf00;
    border-color: #fcdf00;
  }
  .mx-auto {
    margin-bottom: 10px !important;
  }

</style>

    </head>

    <body class="loading authentication-bg authentication-bg-pattern">

        <div class="account-pages my-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="text-center">   
                            <a href="index.html">
                                <img src="<?=base_url('assets/template/')?>brg.png" alt="" width="150" class="mx-auto">
                            </a>

                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Sign In</h4>
                                </div>

                                <?php 
                                // notifikasi error
                                echo validation_errors('<div class="alert alert-success">','</div>');
                                // notifikasi gagal login
                                if ($this->session->flashdata('warning')) {
                                echo '<div class="alert alert-warning">';
                                echo $this->session->flashdata('warning');
                                echo '</div>';
                                }
                                // notifikasi logout
                                if ($this->session->flashdata('sukses')) {
                                echo '<div class="alert alert-success">';
                                echo $this->session->flashdata('sukses');
                                echo '</div>';
                                }
                                // form open login
                                echo form_open(base_url('login/user'));
                                ?>

                                <!-- <form action="<?//= base_url('login/user'); ?>" method="post"> -->
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control" type="text" id="username" name="username" required="" placeholder="Enter your username">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 d-grid text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>
                                <?php echo form_close(); ?>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="<?=base_url('assets/template/dist/')?>assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?=base_url('assets/template/dist/')?>assets/js/app.min.js"></script>
        
    </body>
</html>