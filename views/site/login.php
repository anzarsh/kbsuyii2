<!-- <!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Вход</title>

		<link rel="stylesheet" href="libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
	<link rel="stylesheet" href="libs/font-awesome-4.6.3/css/font-awesome.min.css" />
	<link rel="stylesheet" href="libs/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" href="libs/owl.carousel/assets/owl.carousel.css" />
	<link rel="stylesheet" href="libs/wow/animate.css">
	<link type="text/css" href="css/jquery.jscrollpane.css" rel="stylesheet" media="all" />

	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/style3.css">

	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Droid+Sans" />
	
	<link rel="stylesheet" href="css/fonts.css">

	<meta content="telephone=no" name="format-detection"/>
	

</head>
<body>
	<script src="libs/bootstrap/bootstrap.min.js"></script>
	<script src="libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="libs/owl.carousel/owl.carousel.js"></script>
	<script src="libs/fancybox/jquery.fancybox.pack.js"></script>
	<script src="libs/wow/wow.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>

	<script>
    	new WOW().init();
    </script>

	<script src="js/responsiveTabs.js"></script>
	<script src="js/jquery.maskedinput.min.js"></script>
	<script src="js/common.js"></script> -->

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<section class="enrtance">
	<!-- <form action=""> -->
	<?php $form = ActiveForm::begin(); ?>
		<img src="http://www.kbsu.ru/images/stories/icons/kbgu_icon_small.jpg" alt="" height="120px" width="120px">
		<? //var_dump($layoutmy); ?>
		<!-- sdsdf -->
		<h2>карта активиста</h2>
		<?php $inputt = $form->field($model, 'username')->textInput(['maxlength' => 18, 'class' => '', 'placeholder' => "Логин"])->label(false); ?>
		<?php $inputt->template = "{input}"; ?>
		<?= $inputt; ?>
		<!-- <input type="text" placeholder="логин"> -->
		<?php $inputt = $form->field($model, 'password')->textInput(['maxlength' => 18, 'class' => '', 'placeholder' => "Пароль"])->label(false); ?>
		<?php $inputt->template = "{input}"; ?>
		<?= $inputt; ?>
		<!-- <input type="password" placeholder="пароль"> -->
		<?= Html::submitButton('Отправить', ['class' => '']) ?>
		<!-- <input type="submit" value="вход"> -->
		<div class="icons icons_style">
			<a href="/rating.php"><i class="fa fa-vk" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-odnoklassniki" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
			<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		</div>
	<?php ActiveForm::end(); ?>
	<!-- </form> -->
</section>

<!-- 	<script>
		$(document).ready(function() {
			
		});
	</script>
	
</body>
</html> -->

