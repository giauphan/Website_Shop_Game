<?php
require_once __DIR__ . '/wit/header.php';
?>
<div class="container-fluid al" style="margin-top: 5%;">
    <div id="clock">
    </div>
    <br>
    <br>
    <?= $thongbao ?>
    <br>
    <br>
    <!--  star them sp -->
    <div class="row">
        <form id="form_upload" method="POST" enctype="multipart/form-data">
            <!-- star   block1 -->
            <div class="col">
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="ma_sale">mã code <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="text" id="ma_sale" name="ma_sale" placeholder="nhập Tên danh mục " required min="0">
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="price_down">giá giảm <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="text" id="price_down" name="price_down" placeholder="nhập giá giảm " required min="0">
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="danh_muc">danh mục <span>*</span></label>
                        </div>
                        <div class="inp">
                            <select name="danh_muc" id="danh_muc" style="width: 100%;" required>
                                <?php
                                if (isset($kq) && sizeof($kq) > 0) {
                                    $i = 1;
                                    foreach ($kq as $row) {

                                        echo '  <option value="' . $i . '">' . $row['ten_loai'] . '</option>';
                                        $i++;
                                    }
                                }
                                ?>
                            </select>
                            <!-- <input type="" id="ngoc" name="ngoc" placeholder="ngọc sp" required> -->
                        </div>

                    </div>
                </div>

                <div class="col1">
                    <div class="col_btn">
                        <div class="text_name">
                            <label for="tuong"></label>
                        </div>
                        <div class="btn">
                            <button type="submit" name="submit_sale"> Gửi</button>
                        </div>
                    </div>
                </div>
            </div>




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