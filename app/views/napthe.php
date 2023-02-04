<?php
require_once __DIR__ . '/wit/header.php';
?>

<!-- END: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">


   <!-- BEGIN: INLINE NAV -->
   <!-- <div class="text-center ">
      <h2 style="font-size: 30px;font-weight: bold;text-transform: uppercase;  padding: 0 3px 5px 3px;">DỊCH VỤ MUA THẺ </h2>
   </div> -->
   <div class="c-content-title-1">
      <h3 class="c-center c-font-uppercase c-font-bold">DỊCH VỤ NẠP THẺ </h3>
      <div class="c-line-center c-theme-bg"></div>
   </div>
   <!-- END: INLINE NAV -->


   <!-- BEGIN: PAGE CONTENT -->
   <div class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
      <div class="container">
      </div>



      <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t">
      <div class="container detail-service">


         <div class="container">
            <div class="row" style="margin-top: 50px;">
               <div class="col-md-8" style="float:none;margin:0 auto;">
                  <form method="POST" action="">
                     <div class="form-group">
                        <label>Loại thẻ:</label>
                        <select class="form-control" name="telco" required>
                           <option value="">Chọn loại thẻ</option>
                           <option value="VIETTEL">Viettel</option>

                           <option value="MOBIFONE">Mobifone</option>

                           <option value="VINAPHONE">Vinaphone</option>

                           <option value="GATE">Gate</option>
                           <option value="ZING">Zing</option>



                        </select>
                     </div>
                     <div class="form-group">
                        <label>Mệnh giá:</label>
                        <select class="form-control" name="amount" required>
                           <option value="">Chọn mệnh giá</option>
                           <option value="10000">10.000</option>
                           <option value="20000">20.000</option>
                           <option value="30000">30.000</option>
                           <option value="50000">50.000</option>
                           <option value="100000">100.000</option>
                           <option value="200000">200.000</option>
                           <option value="300000">300.000</option>
                           <option value="500000">500.000</option>
                           <option value="1000000">1.000.000</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Số seri:</label>
                        <input type="text" class="form-control" name="serial" required />
                     </div>
                     <div class="form-group">
                        <label>Mã thẻ:</label>
                        <input type="text" class="form-control" name="code" required />
                     </div>
                     <?php
                     if (isset($_SESSION['ma_user'])) {
                     ?>
                        <div class="form-group">
                           <button type="submit" class="btn btn-success btn-block" name="submit_nap">NẠP NGAY</button>
                        </div>
                     <?php
                     } else {
                     ?>
                        <div class="form-group">
                           <a href="/login" class="btn btn-success btn-block">ĐĂNG NHẬP</a>
                        </div>
                     <?php
                     }
                     ?>
                  </form>
               </div>
            </div>
         </div>

      </div>


      <div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="loader" style="text-align: center"><img src="#" style="width: 50px;height: 50px;display: none" alt="png-image"></div>
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Xác nhận thông tin thanh toán</h4>
               </div>
               <div class="modal-body">
                  <p> Bạn thực sự muốn thanh toán?</p>
               </div>
               <div class="modal-footer">
                  <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login">Đăng nhập</a>
                  <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
               </div>
            </div>
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
               curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"#\" style=\"width: 50px;height: 50px;\"></div>");
               curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
         });
      });
   </script>
   <!-- END: PAGE CONTENT -->
</div>

<script>
   $(document).ready(function() {
      $('.load-modal').each(function(index, elem) {
         $(elem).unbind().click(function(e) {
            e.preventDefault();
            e.preventDefault();
            var curModal = $('#LoadModal');
            curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"#\" style=\"width: 50px;height: 50px;\"></div>");
            curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
         });
      });
   });
</script>
<?php

?>
<?php
require_once __DIR__ . '/wit/footer.php';
?>