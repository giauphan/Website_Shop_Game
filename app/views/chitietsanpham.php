<?php
require_once __DIR__ . '/wit/header.php';
?>

<!-- END: LAYOUT/HEADERS/HEADER-1 -->

<!-- BEGIN: PAGE CONTAINER -->

<div class="c-layout-page">

   <!-- BEGIN: PAGE CONTENT -->

   <div class="c-content-box c-size-lg c-overflow-hide c-bg-white">





      <?php

      $kt = false;
      $i = 0;
      foreach ($runanh as $rowctsp) {

         $retVal = ($rowctsp['ngoc'] == 0) ?  "có" : "không";

         $login_acc = ($rowctsp['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";

         if ($_GET['id'] == $rowctsp['ma_sp']) {
            if ($rowctsp['hinh_ct_1'] != "") {
               if ($rowctsp['trang_thai_sp'] == 0) {
                  echo '<div class="container">

               <nav aria-label="breadcrumb" style="display:none">

                  <ol class="breadcrumb">

                     <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>

                     <li class="breadcrumb-item"><a href="/duan/?act=nick&danhmuc=' . $rowctsp['ma_loai'] . '" title="' . $rowctsp['ten_loai'] . '">' . $rowctsp['ten_loai'] . '</a></li>

                     <li class="breadcrumb-item active" aria-current="page">' . $rowctsp['ma_sp'] . '</li>

                  </ol>

               </nav>

               <div class="c-shop-product-details-4">

                  <div class="row">

                     <div class="col-md-4 m-b-20">

                        <div class="c-product-header">

                        

                           <div class="c-content-title-1">

                              <h3 class="c-font-uppercase c-font-bold">#' . $rowctsp['ma_sp'] . '</h3>

                              <span class="c-font-red c-font-bold">' . $rowctsp['ten_loai'] . '</span>

                           </div>

                        </div>

                        

                     </div>

                     <div class="col-sm-12 visible-sm visible-xs visible-sm">

                        <div class="text-center m-t-20">

                           <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowctsp['hinh'] . '" alt="png-image">

                        </div>



                        

                        <div class="c-product-meta">

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                           <div class="row">';

                  if ($rowctsp['ma_loai'] == 1) {


                     echo '
                           
                                        
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowctsp['rank'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowctsp['tuong'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowctsp['trang_phuc'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>
                                             
                                                </div>
                                             
                                             
                                             
                                             
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>
                                             
                                                </div>
                                             
                                        
                                             
                                             ';
                  } else if ($rowctsp['ma_loai'] == 3) {

                     $retVal = ($rowctsp['potara'] == 0) ?  "Có" : "Không";
                     $login_acc = ($rowctsp['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
                     echo '
                           
                                       
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red">' . $rowctsp['server'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red">' . $rowctsp['Hanh_tinh'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red">' . $login_acc . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Potara: <span class="c-font-red">' . $retVal . '</span></p>
                                             
                                                </div>
                                             
                                             
                                             
                                             
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>
                                             
                                                </div>
                                    
                                             
                                             ';
                  }


                  echo ' </div>

                        



                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                        </div>

                     </div>



                     <div class="c-product-meta">

                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">

                           <div class="position0">

               ' . number_format($rowctsp['giasp'], 0, ',', '.') . ' VÍ

                           </div>

                        

                           </div>

                        </div>

                        <div style="display: none">

                        </div>

                  

            

                     <div class="col-md-4 text-right">

                     <div class="c-product-header">

                        <div class="c-content-title-1">

                           <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/acc/' . $rowctsp['ma_sp'] . '">Mua ngay</button>

                          

                           <button type="button" class="btn c-btn btn-lg btn-danger c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/hire-purchase/518323">Trả góp</button>

                           <a type="button" class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/recharge">ATM - Ví điện tử</a>

                           <a class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/nap-the">Nạp thẻ cào</a>

                        </div>

                     </div>

                  </div>

               </div>

            

                  

                  <div class="c-product-meta visible-md visible-lg">

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                        

                     </div>

                     

                     <div class="row">';



                  if ($rowctsp['ma_loai'] == 1) {


                     echo '
                     
                                      
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowctsp['rank'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowctsp['tuong'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowctsp['trang_phuc'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>
                                       
                                          </div>
                                       
                                       
                                       
                                       
                                       
                                        
                                       
                                       
                        <div class="col-sm-4 col-xs-6 c-product-variant">

                        <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>

                     </div>
                                       
                                       ';
                  } else if ($rowctsp['ma_loai'] == 3) {

                     $retVal = ($rowctsp['potara'] == 0) ?  "Có" : "Không";
                     $login_acc = ($rowctsp['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
                     echo '
                     
                                     
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red">' . $rowctsp['server'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red">' . $rowctsp['Hanh_tinh'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red">' . $login_acc . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Potara: <span class="c-font-red">' . $retVal . '</span></p>
                                       
                                          </div>
                                       
                                       
                                       
                                       
                                       
                                        
                                       
                                    
                                       <div class="col-sm-4 col-xs-6 c-product-variant">

                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>

                                    </div>
                                       
                                       ';
                  }








                  echo ' </div>

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                     </div>

                     </div>

                  </div>







                  

                  </div>

                  

               <div class="container m-t-20 content_post">
            
              ';



                  $anh->show_img($rowctsp['hinh_ct_1'], $rowctsp['hinh']);

                  echo  '</div>';

                  $kt = true;
               } else {



                  echo '<div class="container">

               <nav aria-label="breadcrumb" style="display:none">

                  <ol class="breadcrumb">

                     <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>

                     <li class="breadcrumb-item"><a href="/duan/?act=nick&danhmuc=' . $rowctsp['ma_loai'] . '" title="' . $rowctsp['ten_loai'] . '">' . $rowctsp['ten_loai'] . '</a></li>

                     <li class="breadcrumb-item active" aria-current="page">' . $rowctsp['ma_sp'] . '</li>

                  </ol>

               </nav>

               <div class="c-shop-product-details-4">

                  <div class="row">

                     <div class="col-md-4 m-b-20">

                        <div class="c-product-header">

                        

                           <div class="c-content-title-1">

                              <h3 class="c-font-uppercase c-font-bold">#' . $rowctsp['ma_sp'] . '</h3>

                              <span class="c-font-red c-font-bold">' . $rowctsp['ten_loai'] . '</span>

                           </div>

                        </div>

                        

                     </div>

                     <div class="col-sm-12 visible-sm visible-xs visible-sm">

                        <div class="text-center m-t-20">

                           <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowctsp['hinh'] . '" alt="png-image">

                        </div>



                        

                        <div class="c-product-meta">

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                           <div class="row">';

                  if ($rowctsp['ma_loai'] == 1) {


                     echo '
                                    
                                                     
                                                      
                                                         <div class="col-sm-4 col-xs-6 c-product-variant">
                                                      
                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowctsp['rank'] . '</span></p>
                                                      
                                                         </div>
                                                      
                                                         <div class="col-sm-4 col-xs-6 c-product-variant">
                                                      
                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowctsp['tuong'] . '</span></p>
                                                      
                                                         </div>
                                                      
                                                         <div class="col-sm-4 col-xs-6 c-product-variant">
                                                      
                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowctsp['trang_phuc'] . '</span></p>
                                                      
                                                         </div>
                                                      
                                                         <div class="col-sm-4 col-xs-6 c-product-variant">
                                                      
                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>
                                                      
                                                         </div>
                                                      
                                                      
                                                      
                                                      
                                                      
                                                        
                                                      
                                                      
                                       <div class="col-sm-4 col-xs-6 c-product-variant">
         
                                       <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>
         
                                    </div>
                                                      
                                                      ';
                  } else if ($rowctsp['ma_loai'] == 3) {

                     $retVal = ($rowctsp['potara'] == 0) ?  "Có" : "Không";
                     $login_acc = ($rowctsp['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
                     echo '
                                    
                                                    
                                                      
                                                         <div class="col-sm-4 col-xs-6 c-product-variant">
                                                      
                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red">' . $rowctsp['server'] . '</span></p>
                                                      
                                                         </div>
                                                      
                                                         <div class="col-sm-4 col-xs-6 c-product-variant">
                                                      
                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red">' . $rowctsp['Hanh_tinh'] . '</span></p>
                                                      
                                                         </div>
                                                      
                                                         <div class="col-sm-4 col-xs-6 c-product-variant">
                                                      
                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red">' . $login_acc . '</span></p>
                                                      
                                                         </div>
                                                      
                                                         <div class="col-sm-4 col-xs-6 c-product-variant">
                                                      
                                                            <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Potara: <span class="c-font-red">' . $retVal . '</span></p>
                                                      
                                                         </div>
                                                      <div class="col-sm-4 col-xs-6 c-product-variant">
         
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>
         
                                                   </div>
                                                      
                                                      ';
                  }

                  echo '  </div>

                        



                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                        </div>

                     </div>



                     <div class="c-product-meta">

                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">

                           <div class="position0">

               ' . number_format($rowctsp['giasp'], 0, ',', '.') . ' VÍ

                           </div>

                        

                           </div>

                        </div>

                        <div style="display: none">

                        </div>

                  

            

                     <div class="col-md-4 text-right">

                     

                  </div>

               </div>

            

                  

                  <div class="c-product-meta visible-md visible-lg">

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                        

                     </div>

                     

                     <div class="row">';



                  if ($rowctsp['ma_loai'] == 1) {


                     echo '
                              
                                               
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowctsp['rank'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowctsp['tuong'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowctsp['trang_phuc'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>
                                                
                                                   </div>
                                                    <div class="col-sm-4 col-xs-6 c-product-variant">
   
                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>
   
                              </div>
                                                
                                                ';
                  } else if ($rowctsp['ma_loai'] == 3) {

                     $retVal = ($rowctsp['potara'] == 0) ?  "Có" : "Không";
                     $login_acc = ($rowctsp['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
                     echo '
                              
                                              
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red">' . $rowctsp['server'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red">' . $rowctsp['Hanh_tinh'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red">' . $login_acc . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Potara: <span class="c-font-red">' . $retVal . '</span></p>
                                                
                                                   </div>
                                                
                                                
                                                
                                                
                                                
                                                 
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
   
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowctsp['mo_ta'] . '.</span></p>
   
                                             </div>
                                                
                                                ';
                  }

                  echo '   </div>

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                     </div>

                     </div>

                  </div>







                  

                  </div>

                  

               <div class="container m-t-20 content_post">
            
               ';



                  $anh->show_img($rowctsp['hinh_ct_1'], $rowctsp['hinh']);

                  echo  '</div>';

                  $kt = true;
               }
            }
         }

         $i++;
      }

      foreach ($run as $rowct) {
         $login_acc = ($rowct['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
         $retVal = ($rowct['ngoc'] == 0) ?  "có" : "không";
         if ($kt == false) {

            if ($rowct['trang_thai_sp'] == 0) {



               echo '<div class="container">

         <nav aria-label="breadcrumb" style="display:none">

            <ol class="breadcrumb">

               <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>

               <li class="breadcrumb-item">
               <a href="/duan/?act=nick&danhmuc=' . $rowct['ma_loai'] . '" title="' . $rowct['ten_loai'] . '">' . $rowct['ten_loai'] . '</a></li>

               <li class="breadcrumb-item active" aria-current="page">' . $rowct['ma_sp'] . '</li>

            </ol>

         </nav>

         <div class="c-shop-product-details-4">

            <div class="row">

               <div class="col-md-4 m-b-20">

                  <div class="c-product-header">

                  

                     <div class="c-content-title-1">

                        <h3 class="c-font-uppercase c-font-bold">#' . $rowct['ma_sp'] . '</h3>

                        <span class="c-font-red c-font-bold">' . $rowct['ten_loai'] . '</span>

                     </div>

                  </div>

                  

               </div>

               <div class="col-sm-12 visible-sm visible-xs visible-sm">

                  <div class="text-center m-t-20">

                     <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowct['hinh'] . '" alt="png-image">

                  </div>



                  

                  <div class="c-product-meta">

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                     </div>

                     <div class="row">';

               if ($rowct['ma_loai'] == 1) {


                  echo '
                              
                                               
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowct['rank'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowct['tuong'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowct['trang_phuc'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>
                                                
                                                   </div>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                 <div class="col-sm-4 col-xs-6 c-product-variant">
   
                                 <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowct['mo_ta'] . '.</span></p>
   
                              </div>
                                                
                                                ';
               } else if ($rowct['ma_loai'] == 3) {

                  $retVal = ($rowct['potara'] == 0) ?  "Có" : "Không";
                  $login_acc = ($rowct['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
                  echo '
                              
                                              
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red">' . $rowct['server'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red">' . $rowct['Hanh_tinh'] . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red">' . $login_acc . '</span></p>
                                                
                                                   </div>
                                                
                                                   <div class="col-sm-4 col-xs-6 c-product-variant">
                                                
                                                      <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Potara: <span class="c-font-red">' . $retVal . '</span></p>
                                                
                                                   </div>
                                                
                                                 <div class="col-sm-4 col-xs-6 c-product-variant">
   
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowct['mo_ta'] . '.</span></p>
   
                                             </div>
                                                
                                                ';
               }

               echo '  </div>

                  



                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                     </div>

                  </div>

               </div>



               <div class="c-product-meta">

                  <div class="c-product-price c-theme-font" style="float: none;text-align: center">

                     <div class="position0">



                     </div>

                       ' . number_format(($rowct['giasp']), 0, ',', '.') . ' VÍ

                     </div>

                  </div>

                  <div style="display: none">

                  </div>

             

       

               <div class="col-md-4 text-right">

               <div class="c-product-header">

                  <div class="c-content-title-1">

                     <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/">Mua ngay</button>

                   

                     <button type="button" class="btn c-btn btn-lg btn-danger c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal" rel="/hire-purchase/518323">Trả góp</button>

                     <a type="button" class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/recharge">ATM - Ví điện tử</a>

                     <a class="btn c-btn btn-lg c-bg-green-4 c-font-white c-font-uppercase c-font-bold c-btn-square m-t-20" href="/nap-the">Nạp thẻ cào</a>

                  </div>

               </div>

            </div>

           </div>

        

            

            <div class="c-product-meta visible-md visible-lg">

               <div class="c-content-divider">

                  <i class="icon-dot"></i>

                  

               </div>

               

               <div class="row">';



               if ($rowct['ma_loai'] == 1) {


                  echo '
                        
                                         
                                          
                                             <div class="col-sm-4 col-xs-6 c-product-variant">
                                          
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowct['rank'] . '</span></p>
                                          
                                             </div>
                                          
                                             <div class="col-sm-4 col-xs-6 c-product-variant">
                                          
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowct['tuong'] . '</span></p>
                                          
                                             </div>
                                          
                                             <div class="col-sm-4 col-xs-6 c-product-variant">
                                          
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowct['trang_phuc'] . '</span></p>
                                          
                                             </div>
                                          
                                             <div class="col-sm-4 col-xs-6 c-product-variant">
                                          
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>
                                          
                                             </div>
                                          
                                          
                                          
                                          
                                          
                                           
                                          
                                          
                           <div class="col-sm-4 col-xs-6 c-product-variant">

                           <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowct['mo_ta'] . '.</span></p>

                        </div>';
               } else if ($rowct['ma_loai'] == 3) {

                  $retVal = ($rowct['potara'] == 0) ?  "Có" : "Không";
                  $login_acc = ($rowct['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
                  echo '
                        
                                        
                                          
                                             <div class="col-sm-4 col-xs-6 c-product-variant">
                                          
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red">' . $rowct['server'] . '</span></p>
                                          
                                             </div>
                                          
                                             <div class="col-sm-4 col-xs-6 c-product-variant">
                                          
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red">' . $rowct['Hanh_tinh'] . '</span></p>
                                          
                                             </div>
                                          
                                             <div class="col-sm-4 col-xs-6 c-product-variant">
                                          
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red">' . $login_acc . '</span></p>
                                          
                                             </div>
                                          
                                             <div class="col-sm-4 col-xs-6 c-product-variant">
                                          
                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Potara: <span class="c-font-red">' . $retVal . '</span></p>
                                          
                                             </div>
                                          
                                          
                                          
                                          
                                          
                                           
                                          
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">

                                          <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowct['mo_ta'] . '.</span></p>

                                       </div>
                                          
                                          ';
               }

               echo '  </div>

               <div class="c-content-divider">

                  <i class="icon-dot"></i>

               </div>

               </div>

            </div>

            <div class="container m-t-20 content_post">

         <p>

         <a rel="gallery1" data-fancybox="images" href="/duan/admin/view/upload/' . $rowct['hinh'] . '">

         <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowct['hinh'] . '" alt="png-image">

         </a>

         </p>

         <div class="buy-footer" style="text-align: center">

         <button type="button" class="btn c-btn btn-lg c-theme-btn c-font-uppercase c-font-bold c-btn-square m-t-20 load-modal">Mua ngay</button>

         </div>

        </div>

            ';
            } else {

               echo '<div class="container">

               <nav aria-label="breadcrumb" style="display:none">

                  <ol class="breadcrumb">

                     <li class="breadcrumb-item"><a href="/" title="Trang chủ">Trang chủ</a></li>

                     <li class="breadcrumb-item"><a href="/duan/?act=nick&danhmuc=' . $rowct['ma_loai'] . '" title="' . $rowct['ten_loai'] . '">' . $rowct['ten_loai'] . '</a></li>

                     <li class="breadcrumb-item active" aria-current="page">' . $rowct['ma_sp'] . '</li>

                  </ol>

               </nav>

               <div class="c-shop-product-details-4">

                  <div class="row">

                     <div class="col-md-4 m-b-20">

                        <div class="c-product-header">

                        

                           <div class="c-content-title-1">

                              <h3 class="c-font-uppercase c-font-bold">#' . $rowct['ma_sp'] . '</h3>

                              <span class="c-font-red c-font-bold"> ' . $rowct['ten_loai'] . '</span>

                           </div>

                        </div>

                        

                     </div>

                     <div class="col-sm-12 visible-sm visible-xs visible-sm">

                        <div class="text-center m-t-20">

                           <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowct['hinh'] . '" alt="png-image">

                        </div>

      

                        

                        <div class="c-product-meta">

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                           <div class="row">';

               if ($rowct['ma_loai'] == 1) {


                  echo '
                           
                                             <div class="row">
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowct['rank'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowct['tuong'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowct['trang_phuc'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>
                                             
                                                </div>
                                             
                                             
                                             
                                             
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">

                                                <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowct['mo_ta'] . '.</span></p>
      
                                             </div>
                                             
                                             </div>
                                             
                                             ';
               } else if ($rowct['ma_loai'] == 3) {
                  echo '
                           
                                             <div class="row">
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red">' . $rowct['server'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red">' . $rowct['Hanh_tinh'] . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red">' . $login_acc . '</span></p>
                                             
                                                </div>
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">
                                             
                                                   <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Potara: <span class="c-font-red">' . $retVal . '</span></p>
                                             
                                                </div>
                                             
                                             
                                             
                                             
                                             
                                                <div class="col-sm-4 col-xs-6 c-product-variant">

                                          <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowct['mo_ta'] . '.</span></p>

                                       </div>
                                             
                                            
                                             
                                             ';
               }






               echo ' 

                           </div>

                        

      

                           <div class="c-content-divider">

                              <i class="icon-dot"></i>

                           </div>

                        </div>

                     </div>

      

                     <div class="c-product-meta">

                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">

                           <div class="position0">

      

                           </div>

                             ' . number_format(($rowct['giasp']), 0, ',', '.') . ' VÍ

                           </div>

                        </div>

                        <div style="display: none">

                        </div>

                   

             

                   

                  </div>

                 </div>

              

                  

                  <div class="c-product-meta visible-md visible-lg">

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                        

                     </div>

                     

                     <div class="row">';



               if ($rowct['ma_loai'] == 1) {


                  echo '
                     
                         
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Rank: <span class="c-font-red">' . $rowct['rank'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Tướng: <span class="c-font-red">' . $rowct['tuong'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Trang Phục: <span class="c-font-red">' . $rowct['trang_phuc'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Ngọc 90: <span class="c-font-red">' . $retVal . '</span></p>
                                       
                                          </div>
                                       
                                       
                                       
                                       
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">

                                          <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowct['mo_ta'] . '.</span></p>

                                       </div>
                                       
                                       </div>
                                       
                                       ';
               } else if ($rowct['ma_loai'] == 3) {


                  echo '
                     
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Máy chủ: <span class="c-font-red">' . $rowct['server'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Hành tinh: <span class="c-font-red">' . $rowct['Hanh_tinh'] . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Đăng ký: <span class="c-font-red">' . $login_acc . '</span></p>
                                       
                                          </div>
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">
                                       
                                             <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Potara: <span class="c-font-red">' . $retVal . '</span></p>
                                       
                                          </div>
                                       
                                       
                                       
                                       
                                       
                                          <div class="col-sm-4 col-xs-6 c-product-variant">

                                          <p class="c-product-meta-label c-product-margin-1 c-font-uppercase c-font-bold">Nổi bật: <span class="c-font-red">' . $rowct['mo_ta'] . '.</span></p>

                                       </div>
                                       
                                     
                                       
                                       ';
               }






               echo ' 

                     </div>

                     <div class="c-content-divider">

                        <i class="icon-dot"></i>

                     </div>
                     </div>

                  </div>

                  <div class="container m-t-20 content_post">

               <p>

               <a rel="gallery1" data-fancybox="images" href="/duan/admin/view/upload/' . $rowct['hinh'] . '">

               <img class="img-responsive img-thumbnail" src="/duan/admin/view/upload/' . $rowct['hinh'] . '" alt="png-image">

               </a>

               </p>

             

            </div>

                  ';
            }
         }
      }
      ?>











      <div class="container m-t-20 ">

         <div class="game-item-view" style="margin-top: 40px">

            <div class="c-content-title-1">

               <h3 class="c-center c-font-uppercase c-font-bold">Tài khoản liên quan</h3>

               <div class="c-line-center c-theme-bg"></div>

            </div>

            <div class="row row-flex  item-list">





               <?php
               $i = 0;
               $kt = true;
               $lien_quan = null;
               if (isset($_GET['id'])) {
                  foreach ($runsq as $ro) {
                     if ($_GET['id'] == $ro['ma_sp'] &&  $lien_quan == null) {
         
                        $lien_quan = $ro['giasp'];
                     }
                  }
               }
               foreach ($runsq as $row) {
                  $login_acc = ($row['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";


                  $retVal = ($row['ngoc'] == 0) ?  "có" : "không";

                  if ($_GET['id'] != $row['ma_sp']) {
                     if ($row['giasp'] <=  ($lien_quan + 20000) && $row['giasp'] >= ($lien_quan - 20000)) {
                        echo '<div class="col-sm-6 col-md-3">
                  <div class="classWithPad">

                     <div class="image">

                        <a href="?act=acc&id=' . $row['ma_sp'] . '">

                           <img src="/duan/admin/view/upload/' . $row['hinh'] . '" alt="png-image">

                           <span class="ms">MS: ' . $row['ma_sp'] . '</span>

                        </a>

                     </div>

                     <div class="description">

                        ' . $row['mo_ta'] . '

                     </div>

                     <div class="attribute_info">

                        <div class="row">';
                        if ($row['ma_loai'] == 1) {


                           echo ' <div class="col-xs-6 a_att">

                              Rank: <b>' . $row['rank'] . '</b>

                           </div>

                           <div class="col-xs-6 a_att">

                              Tướng: <b>' . $row['tuong'] . '</b>

                           </div>

                           <div class="col-xs-6 a_att">

                              Trang Phục: <b>' . $row['trang_phuc'] . '</b>

                           </div>

                           <div class="col-xs-6 a_att">

                              Ngọc 90: <b>' . $retVal . '</b>

                           </div>';
                        } else if ($row['ma_loai'] == 3) {

                           $retVal = ($row['potara'] == 0) ? "Có" : "Không";
                           echo ' <div class="col-xs-6 a_att">

                              Máy chủ: <b>' . $row['server'] . '</b>

                           </div>

                           <div class="col-xs-6 a_att">

                              Hành tinh: <b>' . $row['Hanh_tinh'] . '</b>

                           </div>

                           <div class="col-xs-6 a_att">

                              Đăng ký: <b>' . $login_acc . '</b>

                           </div>

                           <div class="col-xs-6 a_att">

                              Potara: <b>' . $retVal . '</b>

                           </div>';
                        }

                        echo '
                        </div>

                     </div>

                     <div class="a-more">

                        <div class="row">

                           <div class="col-xs-6">

                              <div class="price_item">

                                 ' . number_format(($row['giasp'] - ($row['giasp'] * ($row['giam_gia'] * 0.01))), 0, ',', '.') . 'VNĐ

                              </div>

                           </div>

                           <div class="col-xs-6 ">

                              <div class="view">

                                 <a href="?act=acc&id=' . $row['ma_sp'] . '">Chi tiết</a>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div>

                     </div>
                     ';
                        $kt = false;
                     }
                  }
               }

               if ($kt == true) {
                  foreach ($runq as $row) {
                     $retVal = ($row['ngoc'] == 0) ?  "có" : "không";
                     $login_acc = ($row['login_ao'] == 0) ?  "Ảo" : "Gmail xóa vv";
                     echo '  <div class="col-sm-6 col-md-3">
      
                     <div class="classWithPad">
      
                        <div class="image">
      
                           <a href="">
      
                              <img src="/duan/admin/view/upload/' . $row['hinh'] . '" alt="png-image">
      
                              <span class="ms">MS: ' . $row['ma_sp'] . '</span>
      
                           </a>
      
                     </div>
      
                     <div class="description">
      
                     ' . $row['mo_ta'] . '
      
                     </div>
      
                     <div class="attribute_info">
      
                     <div class="row">';

                     if ($row['ma_loai'] == 1) {


                        echo ' <div class="col-xs-6 a_att">
      
                           Rank: <b>' . $row['rank'] . '</b>
      
                        </div>
      
                        <div class="col-xs-6 a_att">
      
                           Tướng: <b>' . $row['tuong'] . '</b>
      
                        </div>
      
                        <div class="col-xs-6 a_att">
      
                           Trang Phục: <b>' . $row['trang_phuc'] . '</b>
      
                        </div>
      
                        <div class="col-xs-6 a_att">
      
                           Ngọc 90: <b>' . $retVal . '</b>
      
                        </div>';
                     } else if ($row['ma_loai'] == 3) {

                        $retVal = ($row['potara'] == 0) ?  "Có" : "Không";
                        echo ' <div class="col-xs-6 a_att">
      
                           Máy chủ: <b>' . $row['server'] . '</b>
      
                        </div>
      
                        <div class="col-xs-6 a_att">
      
                           Hành tinh: <b>' . $row['Hanh_tinh'] . '</b>
      
                        </div>
      
                        <div class="col-xs-6 a_att">
      
                          Đăng ký: <b>' . $login_acc . '</b>
      
                        </div>
      
                        <div class="col-xs-6 a_att">
      
                           Potara: <b>' . $retVal . '</b>
      
                        </div>';
                     }

                     echo ' </div>
      
                    </div>
      
                     <div class="a-more">
      
                     <div class="row">
      
                        <div class="col-xs-6">
      
                           <div class="price_item">
      
                         ' . number_format(($row['giasp'] - ($row['giasp'] * ($row['giam_gia'] * 0.01))), 0, ',', '.') . 'VNĐ
      
                           </div>
      
                        </div>
      
                        <div class="col-xs-6 ">
      
                           <div class="view">
      
                              <a href="?act=acc&id=' . $row['ma_sp'] . '">Chi tiết</a>
      
                           </div>
      
                        </div>
      
                     </div>
      
                        </div>
      
                     </div>
      
                     </div>';

                     $i++;



                     if ($i == 8) {

                        break;
                     }
                  }
               }

               ?>

            </div>



         </div>

         <div class="tab-vertical tutorial_area">

            <div class="panel-group" id="accordion">



               <div class="panel panel-default">

                  <div class="panel-heading">

                     <h5 class="panel-title">

                        <a data-toggle="collapse" data-parent="#accordion" href="">Dịch vụ game khác <i class="glyphicon glyphicon-flag"></i></a>

                     </h5>

                  </div>

                  <div id="tab1" class="panel-collapse collapse in" aria-expanded="true">

                     <div class="panel-body">

                        <p>Ngoài&nbsp; <strong>shop bán acc liên quân</strong>&nbsp;Shop còn có các dịch vụ khác như <strong><a href=" dich-vu/ban-quan-huy" target="_blank"><span style="color:#e74c3c">mua bán quân huy giá rẻ</span></a></strong>, <strong>&nbsp;,<a href=" mua-the" target="_blank"><span style="color:#e74c3c">bán thẻ garena giá&nbsp; rẻ</span> </a>và hơn 40 dịch vụ game khác</strong> tại&nbsp;<strong><a href=" dich-vu" target="_blank"> dich-vu</a>&nbsp;(<a href=" dich-vu" target="_blank">click</a>)</strong></p>

                        <p><strong>Link bán quân huy</strong> :&nbsp;<strong><a href=" dich-vu/lien-quan" target="_blank"> dich-vu/lien-quan</a>&nbsp;(<a href=" dich-vu/lien-quan" target="_blank">click</a>)</strong></p>

                     </div>

                  </div>

               </div>




            </div>

         </div>

      </div>

   </div>
   <div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">

      <div class="modal-dialog" role="document">

         <div class="loader" style="text-align: center"><img src="" style="width: 50px;height: 50px;display: none" alt="png-image"></div>

         <div class="modal-content">

            <form method="POST" action=" buyacc/518323" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data" data-hs-cf-bound="true">

               <input name="_token" type="hidden" value="FArKiDKUx5qLkQ607AMswlQoIx7lC3kczIIBXb8t">

               <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                     <span aria-hidden="true">×</span>

                  </button>

                  <h4 class="modal-title">Xác nhận mua tài khoản</h4>

               </div>

               <div class="modal-body">

                  <div class="c-content-tab-4 c-opt-3" role="tabpanel">

                     <ul class="nav nav-justified" role="tablist">

                        <li role="presentation" class="active">

                           <a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Thanh toán</a>

                        </li>

                        <li role="presentation">

                           <a href="#info" role="tab" data-toggle="tab" class="c-font-16">Tài khoản</a>

                        </li>

                     </ul>

                     <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade in active" id="payment">

                           <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">

                              <li class="c-font-dark">

                                 <table class="table table-striped">

                                    <tbody>

                                       <tr>

                                          <th colspan="2">Thông tin tài khoản #518323</th>

                                       </tr>

                                    </tbody>

                                    <tbody>

                                       <tr>

                                          <td>Nhà phát hành:</td>

                                          <th>Garena</th>

                                       </tr>

                                       <tr>

                                          <td>Tên game:</td>

                                          <th>Liên quân</th>

                                       </tr>

                                       <tr>

                                          <td>Giá tiền:</td>

                                          <th class="text-info">4,200,000đ</th>

                                       </tr>

                                    </tbody>

                                 </table>

                              </li>

                           </ul>

                        </div>



                        <div role="tabpanel" class="tab-pane fade" id="info">

                           <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">

                              <li class="c-font-dark">

                                 <table class="table table-striped">

                                    <tbody>

                                       <tr>

                                          <th colspan="2">Chi tiết tài khoản #518323</th>

                                       </tr>

                                       <tr>

                                          <td style="width:50%">Rank:</td>

                                          <td class="text-danger" style="font-weight: 700">Cao Thủ</td>

                                       </tr>

                                       <tr>

                                          <td style="width: 50%">Tướng:</td>

                                          <td class="text-danger" style="font-weight: 700">110</td>

                                       </tr>

                                       <tr>

                                          <td style="width: 50%">Trang Phục:</td>

                                          <td class="text-danger" style="font-weight: 700">139</td>

                                       </tr>

                                       <tr>

                                          <td style="width:50%">Ngọc 90:</td>

                                          <td class="text-danger" style="font-weight: 700">Có</td>

                                       </tr>

                                       <tr>

                                          <td style="width:50%">Nick có tướng trong đá quý:</td>

                                          <td class="text-danger" style="font-weight: 700">Có</td>

                                       </tr>

                                       <tr>

                                          <td style="width:50%">Nick có trang phục trong đá quý:</td>

                                          <td class="text-danger" style="font-weight: 700">Có</td>

                                       </tr>

                                    </tbody>

                                 </table>

                              </li>

                           </ul>

                        </div>

                     </div>

                  </div>

                  <div class="form-group ">

                     <label class="col-md-3 form-control-label">Mã giảm giá:</label>

                     <div class="col-md-7">

                        <input type="text" class="form-control c-square c-theme " name="coupon" placeholder="Mã giảm giá" value="" required>

                        <span class="help-block">Nhập mã giảm giá nếu có để nhận ưu đãi</span>

                     </div>

                  </div>

                  <div class="form-group ">

                     <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">

                        Bạn phải đăng nhập mới có thể mua tài khoản tự động.

                     </label>

                  </div>

                  <div style="clear: both"></div>

               </div>

               <div class="modal-footer">

                  <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login">Đăng nhập</a>

                  <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

               </div>



         </div>

      </div>

   </div>



   <!-- END: PAGE CONTENT -->

</div>







<script>
   $(document).ready(function() {

      $('.load-modal').each(function(index, elem) {

         $(elem).unbind().click(function(e) {

            e.preventDefault();

            e.preventDefault();

            var curModal = $('#LoadModal');

            curModal.find('.modal-content').html(



               <?php
               $pay_acc = new pay();
               if (isset($_SESSION['ma_user']) && isset($_SESSION['vai_tro'])) {

                  $pay_acc ->pay();
               } else {

                  $pay_acc ->pay_login();
               }

               ?>

            );

            curModal.modal('show').find('.modal-content').load($(elem));

         });

      });





   });
</script>



<script>
   function check_sale() {

      var code = document.getElementById("coupon_sale").value;

      check = false;



      var code_category = document.getElementById("category").value;

      var price = document.getElementById('price').value;

      total = price;

      var code_sale = [<?php
      $pay_acc  = new pay(); 
      
      $pay_acc -> show_code_sale();

      $pay_acc -> show_price_sale();

      $pay_acc ->show_category_sale(); ?>];

      check_category = false;

      for (let i = 0; i <= code_sale.length; i++) {



         if (code_sale[2][i] == code_category) {



            if (code_sale[0][i] == code) {



               total = price - code_sale[1][i];

               price = total;

               check = true;

            } else {

               check_category = true;

            }

         }





      }

      // console.log(check);

      if (check == true) {



         document.getElementById('block').innerHTML = "<i style='color:green;'>Mã giảm giá áp thành công</i>";

         if (total <= 0) {

            total = 0

            document.getElementById('total').innerHTML = total;

            document.getElementById('price').value = total * 1;

         } else {

            document.getElementById('total').innerHTML = total;

            document.getElementById('price').value = total * 1;

         }



         document.querySelector('#btn_sale').remove();

         // document.getElementById('btn_sale')

      } else {

         document.getElementById('block').innerHTML = "<i style='color:red;'>mã giảm giá không tồn tại hoặc không phù hợp danh mục</i>";



      }



   }
</script>



</body>



</html>

<?php
require_once __DIR__ . '/wit/footer.php';
?>