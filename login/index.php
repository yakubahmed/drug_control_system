<?php ob_start(); session_start(); ?>
<?php include('../includes/config.php'); ?>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />

    <title>Login  | Drug Control System</title>
    <meta name="description" content="Drug control" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>  -->
    <!--end::Fonts -->


    <!--begin::Page Custom Styles(used by this page) -->
    <link href="Includes/FPageFiles/css/login-1.css" rel="stylesheet" />
    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="Includes/FPageFiles/css/plugins.bundle.css" rel="stylesheet" />
    <link href="Includes/FPageFiles/css/style.bundle.css" rel="stylesheet" />
    <link href="Includes/fontawesome-f5.13.0-web/css/all.css" rel="stylesheet" />

     <!-- SweetAlert2 -->
     <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="../www.googletagmanager.com/gtag/js9a31?id=UA-37564768-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');
    </script>

    
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-page--loading-enabled kt-page--loading kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-topbar kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

    <!-- begin::Page loader -->

    <!-- end::Page Loader -->
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root kt-page">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
                <!--begin::Aside-->
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(../dist/img/gh.png);">
                    <div class="kt-grid__item">
                        <a href="#" class="kt-login__logo">
                            <img src="../dist/img/drug.png" height="100"/>
                        </a>
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                        <div class="kt-grid__item kt-grid__item--middle">
                            <h3 class="kt-login__title">Welcome to Drug Quality Control System</h3>
                          
                        </div>
                    </div>
                    <div class="kt-grid__item">
                        <div class="kt-login__info">
                            <div class="kt-login__copyright">
                                &copy 2021 Drug Control
                            </div>
                            <div class="kt-login__menu">
                                <a href="index.php" class="kt-link">LOGIN</a>
                                <a href="check-drug.php" class="kt-link">CHECK DRUG</a>
                              
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Aside-->

                <!--begin::Content-->
                <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                    <div class="kt-login__body mt-0">
                        <form method="post"  onsubmit="" id="form1" style="margin: 0px; padding: 0px; width: 100%; height: auto; max-width: 450px; box-sizing: border-box; display: block;">
                            <!--begin::Signin-->
                            <div class="kt-login__form">                                
                            <div onkeypress="">
                                <div class="kt-login__title" style="margin-bottom: 1rem;">
                                    <h3>Sign In</h3>
                                </div>
                                
                                <?php showMessage(); ?>
                                <!--begin::Form-->
                                <div class="kt-form" id="kt_login_form">
                                    <div class="kt-section__content kt-margin-t-30 kt-section__content--solid--">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span></div>
                                            <input name="email" type="email"  tabindex="1" class="form-control"  placeholder="Email Address" required="true" aria-describedby="basic-addon1" />
                                        </div>
                                    </div>

                                    <div class="kt-section__content kt-margin-t-30 kt-section__content--solid--">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text" id="basic-addon4"><i class="fa fa-key"></i></span></div>
                                            <input type="password" id="" tabindex="1" class="form-control" name="password" placeholder="Password" autocomplete="off" required="true" aria-describedby="basic-addon4" />
                                        </div>
                                    </div>

                                    <!--begin::Action-->
                                    <div class="kt-login__actions">
                                        <a href="forgot-password.html" class="kt-link kt-login__link-forgot">Forgot Password ?</a>
                                        <button type='submit' id="" class="btn btn-primary" name='btnLogin'><i class="fas fa-sign-in-alt"></i> Sign In </a>
                                    </div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Form-->
                                
                                </div>


                                <!--begin::Divider-->
                                <div class="kt-login__divider">
                                    <div class="kt-divider">
                                        <span></span>
                                        <span>Get in touch with us</span>
                                        <span></span>
                                    </div>
                                </div>
                                <!--end::Divider-->
                                <!--begin::Options-->
                                <div class="kt-login__options">
                                    <a href="#" class="btn btn-primary kt-btn">
                                        <i class="fab fa-facebook-f"></i>
                                        Facebook
                                    </a>

                                    <a href="#"  class="btn btn-info kt-btn">
                                        <i class="fab fa-twitter"></i>
                                        Twitter
                                    </a>

                                    <a href="#"  class="btn btn-danger kt-btn">
                                        <i class="fab fa-google-plus-g"></i>
                                        Google
                                    </a>
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Signin-->
                        



                        </form>

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>

    <!-- end:: Page -->


    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = { "colors": { "state": { "brand": "#374afb", "light": "#ffffff", "dark": "#282a3c", "primary": "#5867dd", "success": "#34bfa3", "info": "#36a3f7", "warning": "#ffb822", "danger": "#fd3995" }, "base": { "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"], "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"] } } };
    </script>
    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="Includes/FPageFiles/js/plugins.bundle.js"></script>
    <script src="Includes/FPageFiles/js/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="Includes/FPageFiles/js/login-1.js"></script>
    <!--end::Page Scripts -->
        <!-- =============== VENDOR SCRIPTS ===============-->
    <!--<script src="https://use.fontawesome.com/386be6de14.js"></script>-->

    <!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/locale_accept_from_http"></script>

</body>
<!-- end::Body -->
</html>

<?php
    date_default_timezone_set('Africa/Nairobi');

    if(isset($_POST['btnLogin'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $stmt = "SELECT * FROM tbl_login Where email_address = '$email' AND password = '$password'";
        $result = mysqli_query($con, $stmt);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $fname = $row['fullname'];
            $email = $row['email_address'];
            $login_id = $row['login_id'];
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $login_id;
            $_SESSION['name'] = $fname;
            $_SESSION['email'] = $email;
            $date = date('Y-m-d h:i:s a', time());
            $stmt = "UPDATE tbl_login SET last_login = '$date' WHERE login_id = $login_id";
            $result = mysqli_query($con, $stmt);
            header('location: ../index.php');
        }else {
            echo " 
            <script>
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Invalid Username or Password ',
                showConfirmButton: false,
                timer: 1500
              });
            </script>
            
            ";
        }
    }

    //Function That shows error messages
    function showMessage(){
        if(isset($_SESSION['msg'])){
            echo  "<p class='text-danger'>" . $_SESSION['msg'] . "</p>";
            unset($_SESSION['msg']);
        }
    }


?>

