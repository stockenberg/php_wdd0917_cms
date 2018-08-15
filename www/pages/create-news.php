<div class="container">
    <div class="row">
        <form action="?p=create-news&action=create" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="" class="col-form-label">headline</label>
                <input type="text" class="form-control" name="news[headline]">
                <p><?= \sae\app\helpers\StatusLog::read('headline') ?></p>
            </div>
            <div class="form-group">
                <label for="" class="col-form-label">teaser</label>
                <textarea name="news[teaser]" class="form-control" id="" cols="30" rows="10"></textarea>
                <p><?= \sae\app\helpers\StatusLog::read('teaser') ?></p>

            </div>
            
            <div class="form-group">
                <label for="" class="col-form-label">Content</label>
                <textarea name="news[content]" class="form-control" id="" cols="30" rows="10"></textarea>
                <p><?= \sae\app\helpers\StatusLog::read('content') ?></p>
            </div>

            <div class="form-group">
                <input type="file" class="file form-control" name="img">
            </div>

            <button type="submit">Absenden!</button>
        </form>
    </div>
</div>