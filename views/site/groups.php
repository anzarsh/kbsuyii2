<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
?>

<section class="az-sec-table">
	<h2>Группы</h2>
	<?php $form = ActiveForm::begin(['id' => 'contact-form',
	'options' => [ 'class' => 'az-form az-row az-form3'],
    'fieldConfig' => [
        'options' => [
            'tag' => false,
        ],
    ],]); ?>
		<?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i>', ['class' => 'az-search3']) ?>
		<?php $inputt = $form->field($model,'uname')->textInput(['maxlength' => 18, 'class' => 'az-col-99-100-px', 'placeholder' => "Наименование"])->label(false); ?>
			<?php $inputt->template = "{input}"; ?>
			<?= $inputt; ?>
		<!-- <input type="text" placeholder="Наименование" class="az-col-99-100-px"> -->
		<a href="#addGroup" rel="modal" class="az-col-100-px az-button-add">Добавить</a>
	<?php ActiveForm::end(); ?>
	<?= $_SERVER['ROOT']; ?>
	<table id="example" class="az-table table table-striped table-hover dt-responsive">
		<thead class="table-head">
			<tr>
				<th>Наименование</th>
				<th>кол.</th>
			</tr>
		</thead>
		<tbody class="table-content">
			<?php foreach ($groups as $group): ?>
			<tr>
				<td><a dataId="<?= Html::encode("{$group->id}") ?>" href="#group" rel="modal">
				<?php if($group->url){ ?>
				<div style="width: 32px; height: 32px; display: inline-block; vertical-align: middle;"><img style="width: 100%; height: auto;"src="/<?= Html::encode("{$group->url}") ?>"></div>
				<?php } ?>
				<?= Html::encode("{$group->uname}") ?></a></td>
				<td><?= count($group->number); ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<ul class="next-prev">
		<li class="
		<?php if(!$pagination->links['prev']){echo 'az-disabled';} ?>
		"><a href="<?php echo $pagination->links['prev'] ?>" class="az-pag">Предыдущая</a></li>
		<li class="
		<?php if(!$pagination->links['next']){echo 'az-disabled';} ?>
		"><a href="<?php echo $pagination->links['next']; ?>" class="az-pag">Следующая</a></li>
	</ul>
</section>

<script>
$(document).ready(function(){
	$('<?= $href; ?>').addClass('current-link');
	$('.az-pag').click(function(){
		$('.az-form3').attr('action', $(this).attr('href'));
		
		$('.az-form3').trigger('submit');
		//alert($('.startdate').val());

		return false;
	});
	$('.az-file').change(function(){
	  $(this).next('label').text($(this).val().substring($(this).val().lastIndexOf('\\')+1,$(this).val().length));
	  $(this).siblings('input[type="hidden"]').attr('value', $(this).val().substring($(this).val().lastIndexOf('\\')+1,$(this).val().length));
	});
});
	
	
</script>

