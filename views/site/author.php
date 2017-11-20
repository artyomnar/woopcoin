<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<main class="main start-page">
    <div class="container">
        <h2 align="center" style="margin-bottom: 20px;">Статьи пользователя <?= $authorName ?></h2>
        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="article">
                        <a href="<?=Url::toRoute(['site/view','id'=>$article->id])?>" class="article__img-wrapper">
                            <img src="<?=$article->getImage();?>" alt="">
                        </a>

                        <div class="article__footer">
                            <div class="article__links left"><?=$article->getAuthor();?>  <a class="link" href="<?=Url::toRoute(['site/view','id'=>$article->id])?>"><?=$article->getResource();?></a></div>
                            <span class="article__time right"><?=$article->getDate();?></span>

                            <a href="<?=Url::toRoute(['site/view','id'=>$article->id])?>" class="article__descr">
                                <?=$article->title;?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
        echo LinkPager::widget(['pagination' => $pagination,]);
        ?>
        <a href="#" class="back-to-top right hidden-xs" style="margin-top: 20px" onClick="up(); return false;"></a>
    </div>
</main>