<h2><?= \sae\app\App::$data['test'] ?></h2>

<a href="?p=create-news">News erstellen</a>
<div class="card-container">
    <h2><?= \sae\app\helpers\Session::flash('news_created') ?></h2>
    <div class="row">
    <?php foreach (\sae\app\models\News::all() as $index => $news) : ?>
        <div class="card col-sm-4">
            <img class="card-img-top" src="<?= UPLOAD_PATH . $news['img'] ?>" alt="Card image cap">
            <div class="card-body">
                <time>Erstellt am: <?= date('d.m.Y H:m', strtotime($news['created_at'])) ?> Uhr</time>
                <h5 class="card-title"><?= $news['headline'] ?></h5>
                <p class="card-text"><?= $news['teaser'] ?></p>
                <a href="?p=news&action=view&id=<?= $news['id'] ?>" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    <?php endforeach; ?>

    </div>

</div>