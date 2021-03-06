<?php
    use yii\helpers\Url;
    use yii\widgets\LinkPager;
?>
<main class="main start-page">
    <div class="container">
        <div class="banner"></div>

        <div class="row">
            <?php if (!empty($mainNews)):?>
            <div class="col-lg-8 col-sm-12">
                <div class="main-article" style="background-image: url(<?=$mainNews->getImage();?>)">
                    <a class="main-article__link" href="<?=Url::toRoute(['site/view','id'=>$mainNews->id])?>">
                        <p class="main-article__descr">
                            <?=$mainNews->title;?>
                        </p>
                    </a>

                    <div class="main-article__footer">
                        <a href="<?=Url::toRoute(['site/category','id'=>$mainNews->category->id])?>" class="main-article__footer-link">Категория <?= $mainNews->getCategoryName()?></a><span class="separator">|</span>
                        <a href="<?=Url::toRoute(['site/author-post','id'=>$mainNews->author_id])?>" class="main-article__footer-link"><?=$mainNews->getAuthor();?></a><span class="separator">|</span>
                        <span class="main-article__footer-date"><?=$mainNews->getDate();?></span>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-lg-4 visible-lg">
                <div class="main-article-sidebar">
                    <input type="radio" name="articleTab" id="popularTab" checked>
                    <input type="radio" name="articleTab" id="redactorTab">

                    <div class="main-article-sidebar__controllers">
                        <label for="popularTab">Популярное</label>
                        <label for="redactorTab">Выбор редактора</label>
                    </div>

                    <div class="main-article-sidebar__content">
                        <?php foreach ($popular as $popularArticle): ?>
                            <div class="main-article-sidebar__tab main-article-sidebar__tab--popular">
                                <a href="<?=Url::toRoute(['site/view','id'=>$popularArticle->id])?>" class="article-mini">
                                    <p><?= $popularArticle->title; ?></p>
                                    <div class="article-mini__icons clearfix">
                                        <span class="right viewed"><?= $popularArticle->viewed; ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <div class="main-article-sidebar__tab main-article-sidebar__tab--redactor">
                            <a href="#" class="article-mini">
                                <p>
                                    Коллапс биткойнов неизбежен
                                    по мнению профессора экономики Гарварда
                                </p>
                                <div class="article-mini__icons clearfix">
                                    <span class="right commented">58</span>

                                    <span class="right viewed">54 683</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php foreach ($articles as $article): ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="article">
                        <a href="<?=Url::toRoute(['site/view','id'=>$article->id])?>" class="article__img-wrapper">
                            <img src="<?=$article->getImage();?>" alt="">
                        </a>

                        <div class="article__footer">
                            <div class="article__links left">
                                <a href="<?=Url::toRoute(['site/author-post','id'=>$mainNews->author_id])?>" class="link"><?=$article->getAuthor();?></a>
                                <a class="link" href="<?=Url::toRoute(['site/view','id'=>$article->id])?>"><?=$article->getResource();?></a>
                            </div>
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
<!--        <a href="#" class="load-more"><i class="load-more__icon"></i>Показать больше новостей</a>-->

        <a href="#" class="back-to-top right hidden-xs" style="margin-top: 20px" onClick="up(); return false;"></a>
    </div>
</main>