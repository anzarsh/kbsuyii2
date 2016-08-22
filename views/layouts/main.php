<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="views/libs/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="views/libs/font-awesome-4.6.3/css/font-awesome.min.css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="views/css/build.css">
    <link rel="stylesheet" href="views/css/style.css">
    <link rel="stylesheet" href="views/css/style2.css">
    <link rel="stylesheet" href="views/css/style3.css">
    <link rel="stylesheet" href="views/css/fonts.css">
</head>
<body>
    <script src="views/libs/jquery/jquery-1.11.1.min.js"></script>
    <script src="views/js/jquery.maskedinput.min.js"></script>
    <script src="views/js/common.js"></script>
<?php $this->beginBody() ?>

<div class="az-fixed">
<div class="az-content">
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                    <img src="http://www.kbsu.ru/images/stories/icons/kbgu_icon_small.jpg" alt="" height="60px" width="60px">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                    <div class="log-exit">
                        <span class="az-login">Люев Азамат</span>
                        <a href="/" class="az-exit">Выход</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="anz-menu">
        <input type="checkbox" id="check_1" class="anz-mobile-992"/>
        <label class="anz-menu-ch anz-mobile-992" for="check_1"><i class="fa fa-bars" aria-hidden="true"></i><i class="fa fa-times" aria-hidden="true"></i></label>
        <div class="anz-perspective">
            <div class="menu-list-pressed">
                <ul class="main-menu">
                    <li><h2>Карта активиста</h2></li>
                    <li><a href="/index.php">рейтинг</a></li>
                    <li><a href="/index.php?r=site/event">мероприятия</a></li>
                    <li><a href="/index.php?r=site/groups">группы</a></li>
                    <li><a href="/index.php?r=site/memo">печать с/з</a></li>
                    <li><a href="/index.php?r=site/settings">настройки</a></li>
                    
                </ul>

            </div>
        </div>
    </div>
    <div class="banner">
        БАННЕР
    </div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
        <?= $content ?>
            </div>
        </div>
    </div>
</section>
<section class="buffer"></section>
</div>
<section class="az-footer">
    <div class="footer">
        <span>КБГУ, 2016 г.</span>
    </div>
</section>
<div id="mask"></div>

<?php //$this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
