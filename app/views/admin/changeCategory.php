<?php
require_once __DIR__ . '/wit/header.php';
?>
<div class="container-fluid al">
    <div id="clock">


    </div>

    <br>
    <br>
    <br>
    <br>

    <!--  star them sp -->
    <div class="row">
        <form id="form_upload" method="POST" enctype="multipart/form-data">
            <!-- star   block1 -->



            <?php
            if (isset($change) && sizeof($change)>0) {
               foreach($change as $row){
                    if ($row['ma_loai'] == $_GET['change']) {
            
                        echo '  <div class="col">
            
                            <div class="col1">
                                <div class="tensp">
                                    <div class="text_name">
                                        <label for="fileUpload">Ảnh danh mục<span>*</span></label>
                                    </div>
                                    <div class="inp">
                                        <input type="file" id="fileUpload" name="fileUpload" placeholder="ảnh danh mục " >
                                        <img src="/assets/upload/' . $row['hinh_loai'] . '" width="100%" height="150px"/>
                                    </div>
            
                                </div>
                            </div>
                            <div class="col1">
                                <div class="tensp">
                                    <div class="text_name">
                                        <label for="ten_loai">Tên danh mục <span>*</span></label>
                                    </div>
                                    <div class="inp">
                                        <input type="text" id="ten_loai" name="ten_loai" value="' . $row['ten_loai'] . '" placeholder="nhập Tên danh mục "  min="0">
                                    </div>
            
                                </div>
                            </div>
            
                            <div class="col1">
                                <div class="col_btn">
                                <div class="text_name">
                                        <label for="tuong"></label>
                                    </div>
                                    <div class="btn">
                                        <button type="submit" name="submit_category"> Gửi</button>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
            }
            ?>

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