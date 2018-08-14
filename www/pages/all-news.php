<h2><?= \sae\app\App::$data['test'] ?></h2>


<div class="container">
    <h2><?= \sae\app\helpers\Session::flash('news_created') ?></h2>
    <div class="row">

    <?php foreach (\sae\app\models\News::all() as $index => $news) : ?>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
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