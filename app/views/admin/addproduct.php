<?php
require_once __DIR__ . '/wit/header.php';
?>
<div class="container-fluid al">
    <div id="clock">
<style>
    .container-fluid {
    padding: 0 100px;
    margin-top: 5%;
}
</style>
        <?php

        echo $thongbao;
        ?>
    </div>

    <br>
    <br>


    <br>
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
            var i = $('#id_img').val() * 1;
            $('#id_img').remove();
            $('#form_upload').append(`<div class="col1">
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
    <!--  star them sp -->
    <div class="row">
        <form action="" id="form_upload" method="POST" enctype="multipart/form-data">
            <!-- star   block1 -->
            <div class="col">

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="fileUpload">Ảnh đại điện<span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="file" id="fileUpload" accept=".png, .jpg, .jpeg, .gif" name="fileUpload_0" required>
                            
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="fileUpload_1">Ảnh chi tiết 1 <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="file" id="fileUpload_1" accept=".png, .jpg, .jpeg, .gif" name="fileUpload_1">
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="fileUpload_2">Ảnh chi tiết 2 <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="file" id="fileUpload_2" accept=".png, .jpg, .jpeg, .gif" name="fileUpload_2">
                            <input type="hidden" id="id_img" value="3">
                        </div>

                    </div>
                </div>



                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="giasp">Giá sản phẩm <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="number" id="giasp" name="giasp" placeholder="giá sp" required min="0">
                        </div>

                    </div>
                </div>
                <!-- end   block2 -->
                <!-- star   block3 -->
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="giam_gia">giảm giá (%) <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="number" id="giam_gia" name="giam_gia" placeholder="giảm giá sp (%)" required>
                        </div>

                    </div>
                </div>


                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="tai_khoan">tài khoản <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="text" id="tai_khoan" name="tai_khoan" placeholder="nhập tài khoản" required>
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="pass_acc">Mật khẩu <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="password" id="pass_acc" name="pass_acc" placeholder="nhập Mật khẩu" required>
                        </div>

                    </div>

                </div>



                <div class="col1">
                    <div class="tensp">

                        <label for="pass_acc">mô tả </label>

                        <div class="inp">
                            <textarea name="mo_ta" id="mo_ta" style="    width: 100%;" cols="auto" rows="auto" placeholder="nhập mô tả  chi tiết sản phẩm"></textarea>
                            <!-- <input type="text" id="pass_acc" name="pass_acc" placeholder="nhập Mật khẩu" required > -->
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="danh_muc">danh mục <span>*</span></label>
                        </div>
                        <div class="inp">
                            <select name="danh_muc" id="danh_muc" style="    width: 100%;" required>
                                <option>Chọn Danh mục </option>
                                <option data-value="1" value="1">liên quân</option>
                                <option data-value="2" value="2">liên minh </option>
                                <option data-value="3" value="3">ngọc rồng </option>
                                <option data-value="4" value="4">free fire </option>
                            </select>
                        </div>

                    </div>
                </div>

            </div>

            <br>
            <!--begin field -->
            <div class="col " id="field">
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="tuong">tướng <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="number" id="tuong" name="tuong" placeholder="nhập tướng" required min="0">
                        </div>

                    </div>
                </div>




                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="rank">Rank <span>*</span></label>
                        </div>
                        <div class="inp">
                            <select name="rank" id="rank" style="    width: 100%;" required>
                                <option>Chọn Rank </option>
                                <option value="cao thủ">cao thủ</option>
                                <option value="tinh anh">tinh anh</option>
                                <option value="kim cương">kim cương</option>
                                <option value="bạch kim">bạch kim</option>
                                <option value="vàng">vàng</option>
                                <option value="bạc">bạc</option>
                                <option value="đồng">đồng</option>
                            </select>
                            <!-- <input type="text" id="rank" name="rank" placeholder="rank sản phẩm" required> -->
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
                            <input type="number" id="trang_phuc" name="trang_phuc" placeholder="nhập trang phục sp" required min="0">
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


            <script>
                // danh mục
                $('#danh_muc').click(function(e) {
                    var danhmuc = $("#danh_muc option:selected").attr("data-value");


                    const myDiv = document.querySelector('#field');

                    if (danhmuc == 1) {

                        myDiv.innerHTML = ` <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="tuong">tướng <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="number" id="tuong" name="tuong" placeholder="nhập tướng" required min="0">
                        </div>

                    </div>
                </div>




                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="rank">Rank <span>*</span></label>
                        </div>
                        <div class="inp">
                            <select name="rank" id="rank" style="    width: 100%;" required>
                            <option >Chọn Rank </option>
                                <option value="cao thủ">cao thủ</option>
                                <option value="tinh anh">tinh anh</option>
                                <option value="kim cương">kim cương</option>
                                <option value="bạch kim">bạch kim</option>
                                <option value="vàng">vàng</option>
                                <option value="bạc">bạc</option>
                                <option value="đồng">đồng</option>
                            </select>
                            <!-- <input type="text" id="rank" name="rank" placeholder="rank sản phẩm" required> -->
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
                            <option >Chọn Ngọc </option>
                                <option value="0">có</option>
                                <option value="1">không</option>
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
                            <input type="number" id="trang_phuc" name="trang_phuc" placeholder="nhập trang phục sp" required min="0">
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
                            <input type="number" id="tuong" name="tuong" placeholder="nhập tướng" required min="0">
                        </div>

                    </div>
                </div>




                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="rank">Rank <span>*</span></label>
                        </div>
                        <div class="inp">
                            <select name="rank" id="rank" style="    width: 100%;" required>
                            <option >Chọn Rank </option>
                                <option value="cao thủ">cao thủ</option>
                                <option value="tinh anh">tinh anh</option>
                                <option value="kim cương">kim cương</option>
                                <option value="bạch kim">bạch kim</option>
                                <option value="vàng">vàng</option>
                                <option value="bạc">bạc</option>
                                <option value="đồng">đồng</option>
                            </select>
                            <!-- <input type="text" id="rank" name="rank" placeholder="rank sản phẩm" required> -->
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="trang_phuc">trang phục <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="number" id="trang_phuc" name="trang_phuc" placeholder="nhập trang phục sp" required min="0">
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
                       <select name="truong" id="server" style=" width: 100%;" required>
                       <option >Chọn Máy chủ</option>
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
                       <select name="rank" id="rank" style="    width: 100%;" required>
                       <option >Chọn Hành tinh</option>
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
                       <select style="  height: auto;  width: 100%;" name="ngoc" id="field4" required>
                       <option >Chọn Loại đăng ký</option>
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
                   <select style="  height: auto;  width: 100%;" name="trang_phuc" id="field3" required>
                   <option >Chọn Bông tai</option>
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
                        <select style="  height: auto;  width: 100%;" name="ngoc" id="field4" required>
                       <option >Chọn Loại đăng ký</option>
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
                            <select name="rank" id="field2" style="    width: 100%;" required>
                            <option >Chọn Rank </option>
                                <option value="cao thủ">cao thủ</option>
                                <option value="Huyền thoại">Huyền thoại</option>
                                <option value="kim cương">kim cương</option>
                                <option value="bạch kim">bạch kim</option>
                                <option value="vàng">vàng</option>
                                <option value="bạc">bạc</option>
                                <option value="đồng">đồng</option>
                            </select>
                            <!-- <input type="text" id="rank" name="rank" placeholder="rank sản phẩm" required> -->
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="field3">Pet <span>*</span></label>
                        </div>
                        <div class="inp">
                        <select style="  height: auto;  width: 100%;" name="ngoc" id="field4" required>
                       <option >Chọn Pet</option>
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
                        <select style="  height: auto;  width: 100%;" name="ngoc" id="field4" required>
                       <option >Chọn thẻ vô cực</option>
                           <option value="có">có</option>
                           <option value="không">không</option>
                       </select>
                        </div>

                    </div>
                </div>
                `;
                    }
                });
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