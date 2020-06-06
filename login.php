<?php
include('connection.php');

$result = array();
if(isset($_REQUEST['submit']))
{


    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $sql = "SELECT * FROM `users` WHERE user_name = '".$username."' and password = '".$password."'";

    $result = mysqli_query($conn, $sql);

    if (!$result)
        trigger_error('Invalid query: ' . $conn->error);
    else if (mysqli_num_rows($result)  > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['user_type']=='admin')
            {
                $cookie_name = "user_type";
                $cookie_value = "admin";
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 


                header("Location: http://localhost/labourse/admin/dashboard.php");
                die();
            }
            else
            {
                 $cookie_name = "user_type";
                $cookie_value = "customer";
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 


                 $cookie_name = "user_id";
                $cookie_value = $row['user_id'];
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 


                header("Location: http://localhost/labourse/customer/dashboard.php");
                die();
            }
        }

    }
    else
    {
        echo "<script>alert('enter valid username and password');</script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link rel="shortcut icon" href="theme/assets/images/favicon.ico">
    <!-- App title -->
    <title>Zircos - Responsive Admin Dashboard Template</title>

    <!-- App css -->
    <link href="theme/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="theme/assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="theme/assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="theme/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="theme/assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="theme/assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="theme/assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="theme/assets/js/modernizr.min.js"></script>

</head>


<body class="bg-transparent">

    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="row">
                <div class="col-sm-12">

                    <div class="wrapper-page">

                        <div class="m-t-40 account-pages">
                            <div class="text-center account-logo-box">
                                <h2 class="text-uppercase">
                                    <a href="index.html" class="text-success">
                                     LA BOURSE
                                    </a>
                                </h2>
                                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                            </div>
                            <div class="account-content">
                                <form class="form-horizontal" action="#">

                                    <div class="form-group ">
                                        <div class="col-xs-12">
                                            <input class="form-control" name = "username" type="text" required="" placeholder="Username">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <input class="form-control" name = "password" type="password" required="" placeholder="Password">
                                        </div>
                                    </div>

                                    

                                    <div class="form-group text-center m-t-30">
                                        <div class="col-sm-12">
                                            <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                        </div>
                                    </div>

                                    <div class="form-group account-btn text-center m-t-10">
                                        <div class="col-xs-12">
                                            <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="submit">Log In</button>
                                        </div>
                                    </div>

                                </form>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                        <!-- end card-box-->


                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                            </div>
                        </div>

                    </div>
                    <!-- end wrapper -->

                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->

    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="theme/assets/js/jquery.min.js"></script>
    <script src="theme/assets/js/bootstrap.min.js"></script>
    <script src="theme/assets/js/detect.js"></script>
    <script src="theme/assets/js/fastclick.js"></script>
    <script src="theme/assets/js/jquery.blockUI.js"></script>
    <script src="theme/assets/js/waves.js"></script>
    <script src="theme/assets/js/jquery.slimscroll.js"></script>
    <script src="theme/assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="theme/assets/js/jquery.core.js"></script>
    <script src="theme/assets/js/jquery.app.js"></script>

</body>
</html>