<?php
use app\models\ArticleTag;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<main class="main start-page">
    <div class="container">
        <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="main-article">
                        <div class="post-thumb">
                            <img src="<?=$article->getImage();?>" alt="">
                        </div>
                            <header class="entry-header text-center text-uppercase">
                                <h1 class="entry-title"><?=$article->title;?></h1>
                                <h6><a href="<?=Url::toRoute(['site/category','id'=>$article->category->id])?>"><?=$article->category->title;?></a></h6>
                            </header>

                    </div>
                </div>

<!--            <div class="col-lg-4 visible-lg">-->
<!--                <div class="main-article-sidebar">-->
<!--                    <input type="radio" name="articleTab" id="popularTab" checked>-->
<!--                    <input type="radio" name="articleTab" id="redactorTab">-->
<!---->
<!--                    <div class="main-article-sidebar__controllers">-->
<!--                        <label for="popularTab">Популярное</label>-->
<!--                        <label for="redactorTab">Выбор редактора</label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="main-article-sidebar__content">-->
<!--                        --><?php //foreach ($popular as $popularArticle): ?>
<!--                            <div class="main-article-sidebar__tab main-article-sidebar__tab--popular">-->
<!--                                <a href="--><?//=Url::toRoute(['site/view','id'=>$popularArticle->id])?><!--" class="article-mini">-->
<!--                                    <p>--><?//= $popularArticle->title; ?><!--</p>-->
<!--                                    <div class="article-mini__icons clearfix">-->
<!--                                        <span class="right viewed">--><?//= $popularArticle->viewed; ?><!--</span>-->
<!--                                    </div>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        --><?php //endforeach; ?>
<!--                        <div class="main-article-sidebar__tab main-article-sidebar__tab--redactor">-->
<!--                            <a href="#" class="article-mini">-->
<!--                                <p>-->
<!--                                    Коллапс биткойнов неизбежен-->
<!--                                    по мнению профессора экономики Гарварда-->
<!--                                </p>-->
<!--                                <div class="article-mini__icons clearfix">-->
<!--                                    <span class="right commented">58</span>-->
<!---->
<!--                                    <span class="right viewed">54 683</span>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>

        <div class="row">
            <div class="entry-content">
                <?=$article->content;?>
            </div>
            <?php
                $tags = $article->getTags()->all();
                foreach ($tags as $tag):
            ?>
                    <div class="decoration">
                        <a href="<?=Url::toRoute(['site/article-tag','id'=>$tag->id])?>" class="btn btn-default"><?= $tag->title; ?></a>
                    </div>
                <?php endforeach; ?>
            <div class="social-share">
                <span class="social-share-title pull-left text-capitalize"><?=$article->getAuthor();?> <?=$article->getDate();?></span>
                <!--<ul class="text-center pull-right">
                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>-->
            </div>
        </div>
        <a href="#" class="back-to-top right hidden-xs" style="margin-top: 20px" onClick="up(); return false;"></a>
    </div>
</main>