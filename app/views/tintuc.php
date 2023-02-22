<?php
require_once __DIR__ . '/wit/header.php';
?>

<style>
    #editor1 {
            margin: 0px 0px 0px 120px;
        }
</style>

<div class="c-layout-page">

    <form>
        <textarea name="editor1" id="editor1" rows="10" cols="100">This is my textarea to be replaced with CKEditor.</textarea>
    </form>

    <script>
        CKEDITOR.replace('editor1');
    </script>

</div>

<?php
require_once __DIR__ . '/wit/footer.php';
?>