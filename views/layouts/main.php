<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-3">
                    <a href="<?=Url::toRoute(['site/index'])?>" class="logo-link">
                        <div class="logo"></div>
                        <div class="logo-descr">Новости блокчейна и криптовалют</div>
                    </a>
                </div>

                <div class="col-lg-6 col-md-8 col-sm-7 col-xs-9">
                    <div class="quotations">
                        <div class="quotations__item clearfix">
                            <div class="crypto">
                                <div class="name">btc</div>
                                <div class="value"><span class="currency">$</span> 5 675.75</div>
                                <div class="dynamic dynamic--up"><i class="triangle-up"></i> 2.00 %</div>

                                <div class="currency-list">
                                    <a href="#" class="currency-list__icon"></a>
                                    <div class="currency-list__dropdown">
                                        <a class="currency-list__dropdown-item" href="#">$ 4 849.75</a>
                                        <a class="currency-list__dropdown-item" href="#">€ 4 849.75</a>
                                        <a class="currency-list__dropdown-item" href="#">£ 4 849.75</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quotations__item clearfix">
                            <div class="crypto">
                                <div class="name">bch</div>
                                <div class="value"><span class="currency">$</span> 351.75</div>
                                <div class="dynamic dynamic--down"><i class="triangle-down"></i> 2.00 %</div>
                                <div class="currency-list">
                                    <a href="#" class="currency-list__icon"></a>
                                    <div class="currency-list__dropdown">
                                        <a class="currency-list__dropdown-item" href="#">$ 4 849.75</a>
                                        <a class="currency-list__dropdown-item" href="#">€ 4 849.75</a>
                                        <a class="currency-list__dropdown-item" href="#">£ 4 849.75</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="quotations__item clearfix">
                            <div class="crypto">
                                <div class="name">eth</div>
                                <div class="value"><span class="currency">$</span> 330.75</div>
                                <div class="dynamic dynamic--down"><i class="triangle-down"></i> 2.00 %</div>
                                <div class="currency-list">
                                    <a href="#" class="currency-list__icon"></a>
                                    <div class="currency-list__dropdown">
                                        <a class="currency-list__dropdown-item" href="#">$ 4 849.75</a>
                                        <a class="currency-list__dropdown-item" href="#">€ 4 849.75</a>
                                        <a class="currency-list__dropdown-item" href="#">£ 4 849.75</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="header__links">
                        <a href="#" class="btn">Предложить новость</a>
                        <a href="#" class="btn" id="subscribeLink">Подписаться на рассылку</a>
                    </div>
                </div>
            </div>

            <div class="subscribe-popup" id="subscribePopup">
                <a href="#" class="close-link"></a>

                <form action="#" method="post">
                    <div class="field">
                        <input type="text" name="field" placeholder="Ваше имя">
                    </div>
                    <div class="field">
                        <input type="email" name="field" placeholder="Ваш e-mail">
                    </div>

                    <input class="btn" type="submit" value="Подписаться">
                </form>
            </div>
        </div>
    </div>

    <nav class="nav">
        <div class="container">
            <div class="search-block">
                <div class="search-block__cnt">
                    <form action="#" method="post">
                        <input type="text" autocomplete="off" name="field">

                        <button type="submit"></button>
                    </form>
                </div>

                <a class="search-block__icon" href="#">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 56.966 56.966" width="20px" height="20px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23
                                s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92
                                c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17
                                s-17-7.626-17-17S14.61,6,23.984,6z"/>
                    </svg>
                </a>
            </div>

            <ul class="nav-list">
                <li>
                    <span class="nav-list__item" >Новости</span>
                    <div class="nav-list-dropdown">
                        <ul>
                            <li><a href="#">Новости биткойна</a></li>
                            <li><a href="#">Новости блокчейна</a></li>
                        </ul>

                        <a href="#" class="nav-list-dropdown__btn-link">Пресс релизы</a>
                    </div>
                </li>
                <li>
                    <span class="nav-list__item" >Аналитика</span>

                    <div class="nav-list-dropdown">
                        <ul>
                            <li><a href="#">Новости биткойна</a></li>
                            <li><a href="#">Новости блокчейна</a></li>
                        </ul>

                        <a href="#" class="nav-list-dropdown__btn-link">Пресс релизы</a>
                    </div>
                </li>
                <li>
                    <span class="nav-list__item" >События</span>
                    <div class="nav-list-dropdown">
                        <ul>
                            <li><a href="#">Новости биткойна</a></li>
                            <li><a href="#">Новости блокчейна</a></li>
                        </ul>

                        <a href="#" class="nav-list-dropdown__btn-link">Пресс релизы</a>
                    </div>
                </li>
                <li><a class="nav-list__item" href="<?=Url::toRoute(['site/glossary'])?>">Глоссарий</a></li>
                <li><a class="nav-list__item" href="#">Календарь ICO</a></li>
                <li><a class="nav-list__item" href="#">Контакты</a></li>
            </ul>
        </div>
    </nav>
</header>

<?= $content ?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs">
                <a href="<?=Url::toRoute(['site/index'])?>" class="logo-link">
                    <div class="logo"></div>
                    <p class="logo-descr">Портал новостей о Блокчей, Биткойн, Финтех</p>
                </a>
            </div>

            <div class="col-md-6">
                <ul class="footer-links-list">
                    <li><a href="#">Реклама</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">События</a></li>
                    <li><a href="#">Глоссарий</a></li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>

            <div class="col-md-2">
                <ul class="social-links">
                    <li>
                        <a class="social-links__link social-links__link--inst" href="#"></a>
                    </li>
                    <li>
                        <a class="social-links__link social-links__link--fb" href="#"></a>
                    </li>
                    <li>
                        <a class="social-links__link social-links__link--t" href="#"></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="copyright">
                    © Copyright 2017
                </div>
            </div>

            <div class="col-md-2 col-md-offset-8">
                <a class="link right" href="tel:+77775555555">+7 (777) 555 55 55</a>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
