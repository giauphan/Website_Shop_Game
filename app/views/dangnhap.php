<?php
require_once __DIR__ . '/wit/header.php';
?>
<style>
   form input {
    width: auto; 
   
    height: auto;
}
</style>
<!-- END: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
   <!-- BEGIN: PAGE CONTENT -->
   <div class="login-box">
      <!-- /.login-logo -->
      <div class="login-box-body box-custom">
         <p class="login-box-msg">Đăng nhập hệ thống</p>
         <span class="help-block" style="text-align: center;color: #dd4b39">
            <strong><?php if (isset($_SESSION['erro'])) {
                        echo  $_SESSION['erro'];
                     }  ?></strong>
         </span>
         <form method="POST" data-hs-cf-bound="true">
            <input type="hidden" name="_token" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t">
            <div class="form-group has-feedback">
               <input type="text" class="form-control" name="username" value="" placeholder="Tài khoản của Web" required>
               <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
               <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required minlength="8" maxlength="32">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
               <div class="col-xs-6">
                  <div class="checkbox icheck">
                     <label style="color: #666">
                        <input type="checkbox" name="remember" id="remember"> Ghi nhớ
                     </label>
                  </div>
               </div>
               <!-- /.col -->
               <div class="col-xs-6" style="text-align: right">
                  <a href="/?act=forget_pass" style="color: #666;margin-top: 10px;margin-bottom: 10px;display: block;font-style: italic;">Quên mật khẩu?</a><br>
               </div>
               <!-- /.col -->
            </div>
            <div class="row">
               <!-- /.col -->
               <div class="col-xs-12">
                  <button type="submit" name="dangnhap" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng nhập</button>
               </div>
               <!-- /.col -->
            </div>
         </form>
         <div class="social-auth-links text-center">
            <p style="margin-top: 5px">- HOẶC -</p>
            <!-- login facebook -->
            <a href="#" class="btn  btn-social btn-facebook btn-flat d-inline-block"><i class="fa fa-facebook"></i>Login FB</a>
            <a href="/register" class="btn  btn-social btn-google btn-flat d-inline-block"><i class="icon-key icons"></i>Tạo tài
               khoản</a>
         </div>
         <!-- /.social-auth-links -->
      </div>
      <!-- /.login-box-body -->
   </div>
   <!-- /.login-box -->

   <!-- END: PAGE CONTENT -->
</div>
<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="loader" style="text-align: center"><img src="" style="width: 50px;height: 50px;display: none"></div>
      <div class="modal-content">
      </div>
   </div>
</div>
</div>
<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="loader" style="text-align: center"><img src="" style="width: 50px;height: 50px;display: none"></div>
      <div class="modal-content">
      </div>
   </div>
</div>




<?php
   require_once __DIR__ . '/wit/footer.php';
   ?>