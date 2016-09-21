<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
use yii\jui\DatePicker;
?>


<section class="az-sec-table">
	<h2>Мероприятия</h2>
	<?php $form = ActiveForm::begin(['id' => 'contact-form',
	'options' => [ 'class' => 'az-form az-form2'],
    'fieldConfig' => [
        'options' => [
            'tag' => false,
        ],
    ],]); ?>
    	<?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i>', ['class' => 'az-search2']) ?>
		<div class="az-separate az-row">
			<?php $inputt = $form->field($model,'uname')->textInput(['maxlength' => 18, 'class' => 'az-col-98-200-px az-col-xs-99-100-px', 'placeholder' => "Наименование"])->label(false); ?>
			<?php $inputt->template = "{input}"; ?>
			<?= $inputt; ?>
			<?php $inputt = $form->field($model,'level')->textInput(['maxlength' => 18, 'class' => 'az-col-100-px az-col-xs-hidden', 'placeholder' => "Уровень"])->label(false); ?>
			<?php $inputt->template = "{input}"; ?>
			<?= $inputt; ?>
			<a href="#addEvent" rel="modal" class="az-button-add az-col-100-px">Добавить</a>
		</div>
		<div class="az-separate az-row">
			<?php $inputt = $form->field($model,'coordinator')->textInput(['maxlength' => 18, 'class' => 'az-col-98-300-px az-col-xs-hidden', 'placeholder' => "Координатор"])->label(false); ?>
			<?php $inputt->template = "{input}"; ?>
			<?= $inputt; ?>
			
			<div class="input-append date az-col-150-px az-col-xs-49" id="datepicker" data-date="dateValue: Customer.DateOfBirth" data-date-format="dd.mm.yyyy">
				<?php $inputt = $form->field($model,'startdate')->textInput(['maxlength' => 18, 'class' => 'span2 startdate', 'placeholder' => 'с', 'size' => '16'])->label(false); ?>
				<?php $inputt->template = "{input}"; ?>
				<?= $inputt; ?>
			    <!-- <input class="span2" size="16" type="text" readonly="readonly"/> -->
			    <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
			</div>
			<div class="input-append date az-col-150-px az-col-xs-49" id="datepicker2" data-date="dateValue: Customer.DateOfBirth" data-date-format="dd.mm.yyyy">
				<?php $inputt = $form->field($model,'finishdate')->textInput(['maxlength' => 18, 'class' => 'span2 finishdate', 'placeholder' => 'по', 'size' => '16'])->label(false); ?>
				<?php $inputt->template = "{input}"; ?>
				<?= $inputt; ?>
			    <!-- <input class="span2" size="16" type="text" readonly="readonly"/> -->
			    <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
			</div>
			<!-- <input type="date" placeholder="по" class="az-col-150-px az-col-xs-49"> -->
		</div>
		<div class="az-separate az-row">

		
			<span class="ah-span padd az-activity">Вид деятельности: <i class="fa fa-angle-double-down anz-mobile-768" aria-hidden="true"></i><i class="fa fa-angle-double-up az-disp-none" aria-hidden="true"></i></span>
			<div class="az-open anz-desktop-768">
				<div class="formwrapper5box checkbox checkbox-warning">
					<?php //$model->id_activity0 = 0; ?>
	                <?php $inputt = $form->field($model, 'id_activity0')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-activ11', 'value' => 0, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-activ11" class="ah-activ1_style">Общественное</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-primary">

	                <?php $inputt = $form->field($model, 'id_activity1')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-activ21', 'value' => 1, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
				<?= $inputt; ?>
	                <label for="ah-activ21" class="ah-activ1_style">Научно-исследовательское</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-info">
		            <?php $inputt = $form->field($model, 'id_activity2')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-activ31', 'value' => 2, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
		            <label for="ah-activ31" class="ah-activ1_style">Творческое</label>
		        </div>
		        <div class="formwrapper5box checkbox checkbox-success">
		            <?php $inputt = $form->field($model, 'id_activity3')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-activ41', 'value' => 3, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
		            <label for="ah-activ41" class="ah-activ1_style">Спортивное</label>
		        </div>
	        </div>
		</div>
		<div class="az-separate az-row">
			<span class="ah-span padd az-eventtype">Тип мероприятия: <i class="fa fa-angle-double-down anz-mobile-768" aria-hidden="true"></i><i class="fa fa-angle-double-up az-disp-none" aria-hidden="true"></i></span>
			<div class="az-open anz-desktop-768">
				<div class="formwrapper5box checkbox checkbox-danger">
					<?php $inputt = $form->field($model, 'id_eventtype0')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-eventtype11', 'value' => 0, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-eventtype11" class="ah-activ1_style">Организационное</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-warning">
		            <?php $inputt = $form->field($model, 'id_eventtype1')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-eventtype21', 'value' => 1, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-eventtype21" class="ah-activ1_style">Воспитательное/<br>Патриотическое</label>
	            </div>  
	            <div class="formwrapper5box checkbox checkbox-primary">
	                <?php $inputt = $form->field($model, 'id_eventtype2')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-eventtype31', 'value' => 2, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-eventtype31" class="ah-activ1_style">Благотворительное</label>
	            </div>  
	            <div class="formwrapper5box checkbox checkbox-info">    
	                <?php $inputt = $form->field($model, 'id_eventtype3')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-eventtype41', 'value' => 3, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-eventtype41" class="ah-activ1_style">Конкурс/Соревнование</label>
	            </div>  
	            <div class="formwrapper5box checkbox checkbox-success"> 
	                <?php $inputt = $form->field($model, 'id_eventtype4')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-eventtype51', 'value' => 4, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-eventtype51" class="ah-activ1_style">Концертная программа</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-danger">
	                <?php $inputt = $form->field($model, 'id_eventtype5')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-eventtype61', 'value' => 5, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-eventtype61" class="ah-activ1_style">Приуроченная акция<br>(не благотворительная)</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-warning">
	                <?php $inputt = $form->field($model, 'id_eventtype6')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-eventtype71', 'value' => 6, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-eventtype71" class="ah-activ1_style">Выпуск периодического<br>продукта</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-primary">
	                <?php $inputt = $form->field($model, 'id_eventtype7')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-eventtype81', 'value' => 7, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-eventtype81" class="ah-activ1_style">Форум/Конференция</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-info">
	                <?php $inputt = $form->field($model, 'id_eventtype8')
				    ->checkbox(['class' => 'ah-activ1 styled', 'id' => 'ah-eventtype91', 'value' => 8, 'uncheck' => ''])->label(false); ?>
				    <?php $inputt->template = "{input}"; ?>
					<?= $inputt; ?>
	                <label for="ah-eventtype91" class="ah-activ1_style">Прием/Почетная встреча</label>
	            </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

	<table id="example" class="az-table table table-striped table-hover dt-responsive">
		<thead class="table-head">
			<tr>
				<th>Дата</th>
				<th>Наименование</th>
				<th>уровень</th>
				<th>Координатор</th>
				<th>кол.уч.</th>
			</tr>
		</thead>
		<tbody class="table-content">
			<?php foreach ($events as $event): ?>
			<tr>
				<td><?= date('d.m.y', strtotime(Html::encode("{$event->finishdate}"))); ?><br><?= date('d.m.y', strtotime(Html::encode("{$event->startdate}"))); ?></td>
				<td><a dataId="<?= Html::encode("{$event->id}") ?>" href="#event" rel="modal"><?= Html::encode("{$event->uname}") ?></a></td>
				<td><?= Html::encode("{$event->eventlevel->uname}") ?></td>
				<td><?= mb_substr($event->iCoordinator->uname, 0, 1, 'UTF-8') ?>.<?= mb_substr($event->iCoordinator->lastname, 0, 1, 'UTF-8') ?>.<?= Html::encode("{$event->iCoordinator->middlename}") ?></td>
				<td><?= count($event->users); ?></td>
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
		$('.az-form2').attr('action', $(this).attr('href'));
		
		$('.az-form2').trigger('submit');
		//alert($('.startdate').val());

		return false;
	});
});
	
	
</script>