<?php
use app\models\Article;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$model = new Article();
?>
<main class="main start-page">
    <div class="container">
        <h2 align="center" style="margin-bottom: 20px;">Статьи по тегу <?= $tagName ?></h2>
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="article">
                        <a href="<?=Url::toRoute(['site/view','id'=>$article['id']])?>" class="article__img-wrapper">
                            <img src="<?=$model->getImage($article['id']);?>" alt="">
                        </a>

                        <div class="article__footer">
                            <div class="article__links left"><a href="<?=Url::toRoute(['site/author-post','id'=>Article::findOne(['id'=>$article['id']])->author_id])?>" class="link"><?=$model->getAuthor($article['id']);?></a>  <a class="link" href="<?=Url::toRoute(['site/view','id'=>$article['id']])?>"><?=$model->getResource($article['id']);?></a></div>
                            <span class="article__time right"><?=$model->getDate($article['id']);?></span>

                            <a href="<?=Url::toRoute(['site/view','id'=>$article['id']])?>" class="article__descr">
                                <?php echo Article::findOne(['id' => $article['id']])->title ;?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        //echo LinkPager::widget(['pagination' => $pagination,]);
        ?>
        <a href="#" class="back-to-top right hidden-xs" style="margin-top: 20px" onClick="up(); return false;"></a>
    </div>
</main>