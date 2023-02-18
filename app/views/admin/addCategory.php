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
        <form  id="form_upload" method="POST" enctype="multipart/form-data">
            <!-- star   block1 -->
            
            <div class="col">
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="fileUpload">Ảnh danh mục<span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="file" id="fileUpload" name="fileUpload" accept=".png, .jpg, .jpeg, .gif" placeholder="ảnh danh mục " required>
                        </div>

                    </div>
                </div>
                <div class="col1">
                    <div class="tensp">
                        <div class="text_name">
                            <label for="ten_loai">Tên danh mục <span>*</span></label>
                        </div>
                        <div class="inp">
                            <input type="text" id="ten_loai" name="ten_loai" placeholder="nhập Tên danh mục " required min="0">
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