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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
    <!-- <link rel="stylesheet" href="../../views/libs/bootstrap/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="../../views/libs/font-awesome-4.6.3/css/font-awesome.min.css" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="../../views/css/bootstrap-datepicker.css">
    <!-- <link rel="stylesheet" href="../../views/css/bootstrap-datepicker.standalone.css"> -->
    <!-- <link rel="stylesheet" href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="../../views/libs/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../../views/css/build.css">
    <link rel="stylesheet" href="../../views/css/style.css">
    <link rel="stylesheet" href="../../views/css/style2.css">
    <link rel="stylesheet" href="../../views/css/style3.css">
    <link rel="stylesheet" href="../../views/css/style4.css">
    <link rel="stylesheet" href="../../views/css/fonts.css">
    
</head>
<body>
    <script src="../../views/libs/jquery/jquery-1.11.1.min.js"></script>
    <!-- <script src="../../views/js/jquery.maskedinput.min.js"></script> -->
    <script src="../../views/js/bootstrap-datepicker.min.js"></script>
    <script src="../../views/locales/bootstrap-datepicker.ru.min.js"></script>
    
<?php $this->beginBody() ?>

<!-- <div class="az-fixed">
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
 

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12"> -->
        <?= $content ?>
<!--             </div>
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
</div> -->


<?php //$this->endBody() ?>
<!-- <script src="../../views/js/common.js"></script> -->
</body>
</html>
<?php $this->endPage() ?>
