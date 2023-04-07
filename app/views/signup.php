<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>
    <link rel="icon" href="/assets/icons/icon.png" type="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="INTUITIVE">
    <meta name="description" content="">
    <title>PDFTools</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="/assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css"> -->
    <!-- Latest compiled and minified CSS -->

    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">


    <!--===============================================================================================-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>


    
    <!--===============================================================================================-->

    <!-- end swal js -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <!-- Style -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/assets/css/Page-1.css" media="screen">
    <script class="u-script" type="text/javascript" src="/assets/js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="/assets/js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.5.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
  
    <style>
        /* #drop-area {
            margin: 10px !important;
        } */
    </style>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="PDFTools">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body ng-app="app" ng-controller="ctr1" class="u-body u-xl-mode" data-lang="en" style="margin: 0;
            min-height: 100vh;
            justify-content: center;
    display: flex;
    flex-direction: column;
   background: linear-gradient(to bottom, #ECF2FF, #BFACE2);background-attachment: fixed;">
<section class="u-clearfix u-section-1" id="sec-e85a">
    <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-sm u-valign-middle-xs u-sheet-1 container">
        <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
            <div class="u-layout">
                <div class="u-layout-row shadow row" >
                    <div class="col-sm-6 u-container-style u-layout-cell u-shape-rectangle u-size-37 u-layout-cell-2">
                        <div style="width: 80%;margin: 0 auto;padding-top: 20px;margin-top: 20px;">
                            <h2>Sign Up</h2>
                            <form action="" method="post" name="frm">
                            <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="oldpass" ng-model='fistname' name='fistname' placeholder="Name" required>
                                    <em ng-if="frm.fistname.$invalid" class="text-danger h6">vui lòng nhập Fist name</em>  
                                    <label for="name">Fist name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" ng-model='lastname' name="lastname" id="oldpass" placeholder="Name" required>
                                    <em ng-if="frm.lastname.$invalid" class="text-danger h6">vui lòng nhập Last name</em>  
                                    <label for="name">Last name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="oldpass"ng-model="username"  name="username" placeholder="Name" required>
                                    <em ng-if="frm.username.$invalid" class="text-danger h6">vui lòng nhập Username </em>  
                                    <label for="name">Username</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" ng-model="mail" name="mail" id="oldpass" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Mail" required>
                                    <em ng-if="frm.mail.$invalid" class="text-danger h6">mail sai định dạng hoặc bỏ trống</em>  
                                    <label for="Mail">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="newpass" ng-model="password" name="password" placeholder="Pass" required>
                                    <em ng-if="frm.password.$invalid" class="text-danger h6">vui lòng nhập password</em>  
                                    <label for="Pass">Password</label>
                                </div>
                                <button type="submit" style="margin:20px 0 20px 0;background-color: #00235B;height: 45px;width: 100%;" value="Sign Up" class="btn text-white btn-block btn-primary" name="sigin">Sign Up</button>
                                <p>Already have one? <a href="/login"> Sign in here.</a></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6 u-align-center-md u-align-center-sm u-align-center-xs u-container-style u-layout-cell u-shape-rectangle u-size-23 u-layout-cell-1">
                        <img class="u-expanded-width-md u-image u-image-default u-image-1" width="420px" height="250px" style="border-radius: 10px;height: 522px !important" src="/assets/images/sign_up.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
    app= angular.module("app",[]);
    app.controller("ctr1",xuly);
    function xuly($scope){
        
    }
</script>