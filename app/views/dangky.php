<?php
require_once __DIR__ . '/wit/header.php';
?>
<!-- END: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
   <!-- BEGIN: PAGE CONTENT -->
   <div class="login-box">

      <!-- /.login-logo -->
      <div class="login-box-body box-custom">
         <p class="login-box-msg">Đăng ký thành viên</p>

         <span class="help-block" style="text-align: center;color: #dd4b39">
            <strong></strong>
         </span>

         <form action="" method="POST" data-hs-cf-bound="true" id="form_sign">
            <input type="hidden" name="_token" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t">
            <div class="form-group has-feedback  ">
               <input type="text" class="form-control" name="username_show" value="" placeholder="Tên hiển thị" required>
               <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
            </div>
            <div class="form-group has-feedback  ">
               <input type="text" class="form-control" name="username" value="" placeholder="Tài khoản" required>
               <span class="glyphicon glyphicon-user form-control-feedback"></span>

            </div>

            <div class="form-group has-feedback">
               <input type="email" class="form-control" name="email" value="" placeholder="Email" required>
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
               <input type="text" class="form-control number" maxlength="11" name="phone" value="" placeholder="Số điện thoại" required minlength="10" maxlength="10"> 
               <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>


            <div class="form-group has-feedback">
               <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required minlength="8" maxlength="32">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            </div>
         


            <div class="row">

               <!-- /.col -->
               <div class="col-xs-12">
                  <button type="submit" name="dangky" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng ký</button>
               </div>
               <!-- /.col -->
            </div>
         </form>


         <div class="social-auth-links text-center">
            <p style="margin-top: 5px">- HOẶC -</p>



            <a href="" class="btn  btn-social btn-facebook btn-flat d-inline-block"><i class="fa fa-facebook"></i>Login FB</a>
         </div>
         <!-- /.social-auth-links -->
      </div>
      <!-- /.login-box-body -->
   </div>
   <!-- /.login-box -->
   <style>
      .login-box,
      .register-box {
         width: 400px;
         margin: 7% auto;
         padding: 20px;
         ;
      }

      @media (max-width: 767px) {

         .login-box,
         .register-box {
            width: 100%;
         }
      }

      .login-box-msg,
      .register-box-msg {
         margin: 0;
         text-align: center;
         padding: 0 20px 20px 20px;
         text-align: center;
         font-size: 20px;
         ;
         font-weight: bold;
      }

      .box-custom {
         border: 1px solid #cccccc;
         padding: 20px;
         color: #666;
      }
   </style>
   <!-- END: PAGE CONTENT -->
</div>
<!-- Begin: Testimonals 1 component -->
</div>
<style type="text/css">
   .news_image,
   .image,
   .news_title,
   .a-more,
   .news_description {
      position: relative;
      z-index: 200;
   }

   span.sale {
      position: absolute;
      z-index: 1000;
      right: -1px;
      top: -1px;
      background: rgba(255, 212, 36, .9);
      padding: 5px;
      text-align: center;
      color: #ee4d2d;
      width: 50px;
      font-weight: 700;
      font-size: 15px;
   }

   .sale:after {
      content: "";
      width: 0;
      height: 0;
      left: 0;
      bottom: -4px;
      position: absolute;
      border-color: transparent rgba(255, 212, 36, .9);
      border-style: solid;
      border-width: 0 25px 4px;
   }

   .outPrice {
      padding-top: 20px;
      text-align: center;
      width: 100px;
      margin: 0 auto;
      margin-top: 10px;
      display: flex;
      justify-content: center;
   }

   .oldPrice {
      text-decoration: line-through;
      color: #3f0;
      border: 2px solid;
      padding: 5px 15px;
      border-radius: 5px;
      font-size: 14px;
      font-weight: bold;
   }

   .newPrice {
      border: 2px solid red;
      padding: 5px 15px;
      color: red;
      display: inline;
      border-radius: 5px;
      margin-left: 10px;
      font-size: 14px;
      font-weight: bold;
      margin-bottom: 10px;
   }

   .game-list .a-more .view {
      margin-top: 20px;
   }

   @media (max-width: 550px) {
      .outPrice {
         flex-direction: column;
      }

      .newPrice {
         margin-left: 0;
         margin-top: 10px;
         margin-bottom: 10px;
      }
   }
</style>
<!-- END: PAGE CONTENT -->
</div>
<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
      <div class="modal-content">
      </div>
   </div>
</div>
</div>
<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
      <div class="modal-content">
      </div>
      
   </div>
</div>


<script>
   $(document).ready(function() {
      $('.load-modal').each(function(index, elem) {
         $(elem).unbind().click(function(e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
         });
      });
   });
</script>

<script>
<?php 
     if (isset($check)) {
      if ($check == 1) {
         echo '
                
         var curModal = $(".login-box-body");
         curModal.find("#form_sign").html(`
         <label for="">Mã xác minh</label>
          <div class="form-group has-feedback  ">
                  <input type="text" class="form-control" name="code_email" value="" placeholder="mã xác minh" required>
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
   
               </div>
               <div class="row">

               <!-- /.col -->
               <div class="col-xs-12">
                  <button type="submit" name="sumbit_code" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Tiếp tục</button>
               </div>
               <!-- /.col -->
            </div>
               `);
 ';
      }
     }
     ?>
       </script>

<?php
   require_once __DIR__ . '/wit/footer.php';
   ?>