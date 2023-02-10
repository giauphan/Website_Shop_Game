<?php
require_once __DIR__ . '/wit/header.php';
?>
<div class="container-fluid al">
    <div id="clock">
        <!-- <link rel="stylesheet" href="/assets/css/style_admin.css"> -->
    </div>
    <br>
    <br>
 
    <?php
    echo $thongbao;
    ?>
    <b>CHỨC NĂNG CHÍNH:</b><Br>
    <br>
    <br>
    <!--  star them sp -->
    <br>
    <div class="col1" style="    display: flex;
    justify-content: right;">
        <div class="col_btn">

            <div class="btn">
                <button id="add_img" type="button"> Thêm ảnh</button>
            </div>
        </div>
    </div>
    <script>
        $('#add_img').click(function(e) {
            var i = ($('#id_img').val() * 1);


            $('#id_img').remove();
            $('#col').prepend(`<div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="fileUpload_` + i + `">Ảnh chi tiết ` + i + ` <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="file" id="fileUpload_` + i + `" accept=".png, .jpg, .jpeg, .gif" name="fileUpload_` + i + `" >
                            <input type="hidden" id="id_img" value="` + (i + 1) + `" >
                        </div>
                    </div>
                </div>`);


        })
    </script>
    <div class="row">
        <br>
        <br>
        <form id="form_upload" method="POST" enctype="multipart/form-data">

            <?php
            if (isset($show_change) && sizeof($show_change) > 0) {

                foreach ($show_change as $row) {


                    echo ' <!-- star   block1 -->
                
                <div class="col" id="col">
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="fileUpload">Ảnh</label>
                            </div>
                            <div class="inp">
                                <input  type="file" id="fileUpload" accept=".png, .jpg, .jpeg, .gif" name="fileUpload_0" placeholder="ảnh sp"  > <img src="/assets/upload/' . $row['hinh'] . '" width="100%" height="150px"/>
                             
                            </div>
        
                        </div>

                    </div>
        ';
                    $img = explode("|", $row['hinh_ct_1']);

                    for ($i = 0; $i < sizeof($img); $i++) {
                        if (sizeof($img) - 1 == $i && $img[$i] != "") {
                            echo ' <div class="col1">
                            <div class="tensp">
                                <div class="text_name">
                                    <label for="fileUpload_' . ($i + 1) . '">Ảnh chi tiết ' . ($i + 1) . ' <span>*</span></label>
                                </div>
                                <div class="inp">
                                    <input type="file" id="fileUpload_' . ($i + 1) . '" name="fileUpload_' . ($i + 1) . '" accept=".png, .jpg, .jpeg, .gif" placeholder="ảnh sp"  >
                              <img src="/assets/upload/' . $img[$i] . '" width="100%" height="150px"/>
                              <input type="hidden" id="id_img" value="' . ($i + 2) . '">
                                </div>
                            </div>
                            </div>';
                        } else  if ($img[$i] != "") {
                            echo ' <div class="col1">
                <div class="tensp">
                    <div class="text_name">
                        <label for="fileUpload_' . ($i + 1) . '">Ảnh chi tiết ' . ($i + 1) . ' <span>*</span></label>
                    </div>
                    <div class="inp">
                        <input type="file" id="fileUpload_' . ($i + 1) . '" name="fileUpload_' . ($i + 1) . '" accept=".png, .jpg, .jpeg, .gif" placeholder="ảnh sp"  >
                  <img src="/assets/upload/' . $img[$i] . '" width="100%" height="150px"/>
                    </div>
                </div>
                </div>';
                        } else {
                            echo '<input type="hidden" id="id_img" value="1" >';
                            break;
                        }
                    }
                    echo '      
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="giasp">Giá sản phẩm</label>
                            </div>
                            <div class="inp">
                                <input type="number" id="giasp" name="giasp" placeholder="giá sp"   value="' . $row['giasp'] . '"   min="0">
                            </div>
        
                        </div>
                    </div>
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="giam_gia">giảm giá</label>
                            </div>
                            <div class="inp">
                                <input type="text" id="giam_gia" name="giam_gia" placeholder="giảm giá sp"  value="' . $row['giam_gia'] . '"  >
                            </div>
        
                        </div>
                    </div>
        
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="tai_khoan">tài khoản</label>
                            </div>
                            <div class="inp">
                                <input type="text" id="tai_khoan" name="tai_khoan" placeholder="nhập tài khoản"  value="' . $row['tai_khoan_game'] . '"  >
                            </div>
        
                        </div>
                    </div>
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="pass_acc">Mật khẩu</label>
                            </div>
                            <div class="inp">
                                <input type="password" id="pass_acc" name="pass_acc" placeholder="nhập Mật khẩu" value="' . $row['password_game'] . '"  >
                            </div>
        
                        </div>
        
                    </div>
                    <div class="col1">
                        <div class="tensp">
        
                            <label for="pass_acc">mô tả</label>
        
                            <div class="inp">
                                <textarea name="mo_ta" id="mo_ta" cols="auto" rows="auto"placeholder="nhập mô tả sản phẩm"  style="width:100%;" >' . $row['mo_ta'] . '</textarea>
                                <!-- <input type="text" id="pass_acc" name="pass_acc"    > -->
                            </div>
        
                        </div>
                    </div>
        
                    <div class="col1">
                        <div class="tensp">
                            <div class="text_name">
                                <label for="danh_muc">danh mục</label>
                            </div>
                            <div class="inp">
                                <select name="danh_muc" id="danh_muc"  style="width: 100%;"  >
                                    <option data-value="' . $row['ma_loai'] . '" >' . $row['ten_loai'] . '</option>
                                  
                                </select>
                           
                            </div>
        
                        </div>
                    </div>
                    </div>
                    <!--begin field -->
                    <div class="col " id="field">
                        <div class="col1">
                            <div class="tensp">
                                <div class="text_name">
                                    <label for="tuong">tướng <span>*</span></label>
                                </div>
                                <div class="inp">
                                    <input type="number" id="tuong" name="tuong"  value="' . $row['field1'] . '" placeholder="nhập tướng"  required min="0">
                                </div>
        
                            </div>
                        </div>
        
        
        
        
                        <div class="col1">
                            <div class="tensp">
                                <div class="text_name">
                                    <label for="rank">Rank <span>*</span></label>
                                </div>
                                <div class="inp">
                                    <select name="rank" value="' . $row['field2']  . '" id="rank" style="    width: 100%;" required>
                                        <option>Chọn Rank </option>
                                        <option value="cao thủ">cao thủ</option>
                                        <option value="tinh anh">tinh anh</option>
                                        <option value="kim cương">kim cương</option>
                                        <option value="bạch kim">bạch kim</option>
                                        <option value="vàng">vàng</option>
                                        <option value="bạc">bạc</option>
                                        <option value="đồng">đồng</option>
                                    </select>
                             
                                </div>
        
                            </div>
                        </div>
        
        
        
                        <div class="col1">
                            <div class="tensp">
                                <div class="text_name">
                                    <label for="ngoc">Ngọc 90 <span>*</span></label>
                                </div>
                                <div class="inp">
                                    <select style="  height: auto;  width: 100%;" name="ngoc" value="' .  $row['field4']  . '" id="ngoc" required>
                                        <option>Chọn Ngọc </option>
                                        <option value="có">có</option>
                                        <option value="không">không</option>
                                    </select>
        
                                </div>
        
                            </div>
                        </div>
        
                        <div class="col1">
                            <div class="tensp">
                                <div class="text_name">
                                    <label for="trang_phuc">trang phục <span>*</span></label>
                                </div>
                                <div class="inp">
                                    <input type="number" id="trang_phuc" name="trang_phuc" value="' .  $row['field1']  . '" placeholder="nhập trang phục sp" required min="0">
                                </div>
        
                            </div>
                        </div>
                    </div>
                    <!-- end field -->
                    <div class="col1" style="    display: flex;
                    justify-content: center;">
                                <div class="col_btn">
                
                                    <div class="btn">
                                        <button type="submit" name="submit"> Gửi</button>
                                    </div>
                                </div>
                            </div>
                </div>';
                }
            }  ?>

            <script>
                // danh mục


                var danhmuc = $("#danh_muc option:selected").attr("data-value");


                const myDiv = document.querySelector('#field');

                if (danhmuc == 1) {

                    myDiv.innerHTML = ` <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="tuong">tướng <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="number" id="tuong" name="tuong" value="<?= $row['field1']  ?>" value="' . $row['field1'] . '" placeholder="nhập tướng" required min="0" >
                        </div>

                    </div>
                </div>




                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="rank">Rank <span>*</span></label>
                        </div>
                        <div class="inp">
                            <select name="rank" value="<?= $row['field2']  ?>" id="rank" style="    width: 100%;" required>
                            <option ><?= $row['field1']  ?> </option>
                                <option value="cao thủ">cao thủ</option>
                                <option value="tinh anh">tinh anh</option>
                                <option value="kim cương">kim cương</option>
                                <option value="bạch kim">bạch kim</option>
                                <option value="vàng">vàng</option>
                                <option value="bạc">bạc</option>
                                <option value="đồng">đồng</option>
                            </select>
                          
                        </div>

                    </div>
                </div>



                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="ngoc">Ngọc 90 <span>*</span></label>
                        </div>
                        <div class="inp">
                            <select style="  height: auto;  width: 100%;" name="ngoc" id="ngoc" required>
                            <option  value="<?= $row['field4']  ?>"><?= $row['field4']  ?> </option>
                                <option value="có">có</option>
                                <option value="không">không</option>
                            </select>

                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="trang_phuc">trang phục <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="number" id="trang_phuc" name="trang_phuc" value="<?= $row['field3']  ?>" placeholder="nhập trang phục sp" required min="0">
                        </div>

                    </div>
                </div>`;

                } else if (danhmuc == 2) {
                    console.log("true;2  ");
                    myDiv.innerHTML = ` <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="tuong">tướng <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="number" id="tuong" name="tuong" value="<?= $row['field1']  ?>" placeholder="nhập tướng" required min="0">
                        </div>

                    </div>
                </div>




                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="rank">Rank <span>*</span></label>
                        </div>
                        <div class="inp">
                            <select name="rank" value="<?= $row['field2']  ?>" id="rank" style="    width: 100%;" required>
                            <option >Chọn <?= $row['field2']  ?> </option>
                                <option value="cao thủ">cao thủ</option>
                                <option value="tinh anh">tinh anh</option>
                                <option value="kim cương">kim cương</option>
                                <option value="bạch kim">bạch kim</option>
                                <option value="vàng">vàng</option>
                                <option value="bạc">bạc</option>
                                <option value="đồng">đồng</option>
                            </select>
                          
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="trang_phuc">trang phục <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="number" id="trang_phuc" name="trang_phuc" value="<?= $row['field3']  ?>" placeholder="nhập trang phục sp" required min="0">
                        </div>

                    </div>
                </div>`;
                } else if (danhmuc == 3) {
                    myDiv.innerHTML = ` <div class="col1">
               <div class="tensp">
                   <div class="text_name">
                       <label for="server">Máy chủ <span>*</span></label>
                   </div>
                   <div class="inp">
                       <select name="tuong" value="<?= $row['field1']  ?>" id="server" style=" width: 100%;" required>
                       <option > <?= $row['field1']  ?></option>
                       <option value="1">1 Sao</option>
                    <option value="2">2 Sao</option>
                    <option value="3">3 Sao</option>
                    <option value="4">4 Sao</option>
                    <option value="5">5 Sao</option>
                    <option value="6">6 Sao</option>
                    <option value="7">7 Sao</option>
                    <option value="8">8 Sao</option>
                    <option value="9">9 Sao</option>
                    <option value="10">10 Sao</option>
                           
                       </select>
                   </div>

               </div>
           </div>




           <div class="col1">
               <div class="tensp">
                   <div class="text_name">
                       <label for="rank">Hành tinh <span>*</span></label>
                   </div>
                   <div class="inp">
                       <select name="rank" value="<?= $row['field2']  ?>" id="rank" style="    width: 100%;" required>
                       <option ><?= $row['field2']  ?></option>
                           <option value="Xayda">Xayda</option>
                           <option value="Namếc">Namếc</option>
                           <option value="Trái đất">Trái đất</option>
                           
                       </select>
                     
                   </div>

               </div>
           </div>



           <div class="col1">
               <div class="tensp">
                   <div class="text_name">
                       <label for="field4">Loại đăng ký<span>*</span></label>
                   </div>
                   <div class="inp">
                       <select style="  height: auto;  width: 100%;" name="ngoc" value="<?= $row['field4']  ?>" id="field4" required>
                       <option ><?= $row['field4']  ?></option>
                           <option value="ảo">ảo</option>
                           <option value="Gmail">Gmail</option>
                       </select>

                   </div>

               </div>
           </div>

           <div class="col1">
               <div class="tensp">
                   <div class="text_name">
                       <label for="field3">Bông tai <span>*</span></label>
                   </div>
                   <div class="inp">
                   <select style="  height: auto;  width: 100%;" name="trang_phuc" value="<?= $row['field3']  ?>" id="field3" required>
                   <option ><?= $row['field3']  ?></option>
                           <option value="có">có</option>
                           <option value="không">không</option>
                       </select>
                   </div>

               </div>
           </div>`;

                } else if (danhmuc == 4) {
                    myDiv.innerHTML = ` <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="tuong">Loại đăng ký <span>*</span></label>
                        </div>
                        <div class="inp">
                        <select style="  height: auto;  width: 100%;" name="tuong" value="<?= $row['field1']  ?>" id="field4" required>
                       <option ><?= $row['field1']  ?></option>
                           <option value="Facebook">Facebook</option>
                           <option value="Gmail">Gmail</option>
                       </select>
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="rank">Rank <span>*</span></label>
                        </div>
                        <div class="inp">
                            <select name="rank" value="<?= $row['field2']  ?>" id="field2" style="    width: 100%;" required>
                            <option ><?= $row['field2']  ?>   </option>
                                <option value="cao thủ">cao thủ</option>
                                <option value="Huyền thoại">Huyền thoại</option>
                                <option value="kim cương">kim cương</option>
                                <option value="bạch kim">bạch kim</option>
                                <option value="vàng">vàng</option>
                                <option value="bạc">bạc</option>
                                <option value="đồng">đồng</option>
                            </select>
                            <!-- <input type="text" id="rank" name="rank" value="<?= $row['field2']  ?>" placeholder="rank sản phẩm" required> -->
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="field3">Pet <span>*</span></label>
                        </div>
                        <div class="inp">
                        <select style="  height: auto;  width: 100%;" name="trang_phuc" value="<?= $row['field3']  ?>" id="field4" required>
                       <option ><?= $row['field3']  ?></option>
                           <option value="có">có</option>
                           <option value="không">không</option>
                       </select>
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="field4">Thẻ vô cực mùa hiện tại <span>*</span></label>
                        </div>
                        <div class="inp">
                        <select style="  height: auto;  width: 100%;" name="ngoc" value="<?= $row['field4']  ?>" id="field4" required>
                       <option ><?= $row['field4']  ?></option>
                           <option value="có">có</option>
                           <option value="không">không</option>
                       </select>
                        </div>

                    </div>
                </div>
                `;
                }
            </script>
        </form>
    </div>
</div>
<!-- end them sp -->
</div>

</div>
<hr class="hr1">
<?php
require_once __DIR__ . '/wit/footer.php';
?>