<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>


<section class="az-sec-table">
	<h2>рейтинг студентов</h2>

	<?php $form = ActiveForm::begin(['id' => 'contact-form',
	'options' => [ 'class' => 'az-form az-row az-form1'],
    'fieldConfig' => [
        'options' => [
            'tag' => false,
        ],
    ],]); ?>
	    
	        <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i>', ['class' => 'az-search']) ?>
	    
    
		<?php $inputt = $form->field($model,'uname')->textInput(['maxlength' => 18, 'class' => 'az-col-58', 'placeholder' => "ФИО активиста"])->label(false); ?>
		<?php $inputt->template = "{input}"; ?>
		<?= $inputt; ?>
		<?php $inputt = $form->field($model,'course')->textInput(['maxlength' => 1, 'class' => 'az-col-20', 'placeholder' => "Курс"])->label(false); ?>
		<?php $inputt->template = "{input}"; ?>
		<?= $inputt; ?>
		<?php $inputt = $form->field($model,'department')->textInput(['maxlength' => 50, 'class' => 'az-col-20', 'placeholder' => "Институт/вш"])->label(false); ?>
		<?php $inputt->template = "{input}"; ?>
		<?= $inputt; ?>
		
	<?php ActiveForm::end(); ?>
	<!-- <form action="" class="az-form az-row az-form1">
		<input type="text" placeholder="ФИО активиста" class="az-col-58" name="uname">
		<input type="text" placeholder="Курс" class="az-col-20">
		<input type="text" placeholder="Институт/вш" class="az-col-20">
	</form> -->
	
	<table id="example" class="az-table table table-striped table-hover dt-responsive">
		<thead class="table-head">
			<tr>
				<th>место</th>
				<th>баллы</th>
				<th>фио активиста</th>
				<th>курс</th>
				<th>институт/вш</th>
			</tr>
		</thead>
		<tbody class="table-content">
		<?php $i=1; ?>
		<?php $num = ($pagination->page)*($pagination->defaultPageSize); ?>
		<?php foreach ($users as $tempuser): ?>
			<tr>
				<td><?php echo $num+$i++; ?></td>
				<td><?= Html::encode("{$tempuser->rate}") ?></td>
				<td><a dataId="<?= Html::encode("{$tempuser->id}") ?>" href="#activist" rel="modal"><?= Html::encode("{$tempuser->middlename} {$tempuser->uname} {$tempuser->lastname}") ?></a></td>
				<td><?= Html::encode("{$tempuser->course}") ?></td>
				<td><?= Html::encode("{$tempuser->department->shortname}") ?>:<?= Html::encode("{$tempuser->department->unit->shortname}") ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php //if($pagination){ ?>
	<ul class="next-prev">
		<li class="
		<?php if(!$pagination->links['prev']){echo 'az-disabled';} ?>
		"><a href="<?php echo $pagination->links['prev'] ?>" class="az-pag">Предыдущая</a></li>
		<li class="
		<?php if(!$pagination->links['next']){echo 'az-disabled';} ?>
		"><a href="<?php echo $pagination->links['next']; ?>" class="az-pag">Следующая</a></li>
	</ul>
	<?php //} ?>
	
</section>
<script>
$(document).ready(function(){
	$('<?= $href; ?>').addClass('current-link');
	$('.az-pag').click(function(){
		$('.az-form1').attr('action', $(this).attr('href'));
		$('.az-form1').trigger('submit');
		return false;
	});
});
	
	
</script>