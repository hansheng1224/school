<?php
$news = $pdo->query("SELECT * FROM `news` WHERE `id` = '{$_GET['id']}'")->fetch();
?>

<h1 class="text-center">編輯消息</h1>
<form action="./api/news_edit.php" method='POST'>
    <div class='form-group row'>
        <label class="col-form-item col-2 text-right">主題</label>
        <input type="text" class='form-control col-md-10' name='subject' value='<?= $news['subject']; ?>'>
    </div>

    <div class="d-flex">
        <div class='col-md-6 row'>
            <span class='col-md-4 text-right mr-2'>置頂</span>
            <div class="form-check mx-2">
                <input type="radio" class="form-check-input" id="radio1" name="top" value="1" <?= ($news['top'] == 1) ? 'checked' : '' ?>>
                <label class="form-check-label" for="radio1">Yes</label>
            </div>
            <div class="form-check mx-2">
                <input type="radio" class="form-check-input" id="radio2" name="top" value="0" <?= ($news['top'] == 0) ? 'checked' : '' ?>>
                <label class="form-check-label" for="radio2">No</label>
            </div>
        </div>
        <div class="col-md-6 form-group row">
                <span class="col-form-label  col-md-4 text-right">觀看數</span>
                <input type="number" class="col-md-8 form-control" name='readed' value='<?= $news['readed'];?>'>
            </div>
    </div>

    <div class='form-group row'>
        <label class="col-form-item col-2 text-right">內容</label>
        <textarea type="text" class='form-control col-md-10' name='content' style='height:200px'><?= $news['content']; ?></textarea>
    </div>
    <div class='form-group row'>
        <label class="col-form-item col-2 text-right">類別</label>
        <input type="text" class='form-control col-md-10' name='type' value='<?= $news['type']; ?>'>
    </div>
    <div class='text-right text-secondary'>現在時間:<?= date("Y-m-d H:i:s"); ?></div>
    <div class='text-center'>
        <input type="hidden" name='id' value="<?= $news['id']; ?>">
        <input type="submit" class='btn btn-primary mx-2' value='確定修改'>
        <input type="reset" class='btn btn-warning mx-2' value='清空'>
    </div>
</form>