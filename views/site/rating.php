<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>


<section class="az-sec-table">
	<h2>рейтинг студентов</h2>
	<form action="" class="az-form az-row">
		<input type="text" placeholder="ФИО активиста" class="az-col-58">
		<input type="text" placeholder="Курс" class="az-col-20">
		<input type="text" placeholder="Институт/вш" class="az-col-20">
	</form>
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
			<tr dataId="<?= Html::encode("{$tempuser->id}") ?>">
				<td><?php echo $num+$i++; ?></td>
				<td><?= Html::encode("{$tempuser->rate}") ?></td>
				<td><a href="#activist" rel="modal"><?= Html::encode("{$tempuser->middlename} {$tempuser->uname} {$tempuser->lastname}") ?></a></td>
				<td><?= Html::encode("{$tempuser->course}") ?></td>
				<td>Эконом</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<ul class="next-prev">
		<li class="
		<?php if(!$pagination->links['prev']){echo 'az-disabled';} ?>
		"><a href="<?php echo $pagination->links['prev'] ?>">Предыдущая</a></li>
		<li class="
		<?php if(!$pagination->links['next']){echo 'az-disabled';} ?>
		"><a href="<?php echo $pagination->links['next']; ?>">Следующая</a></li>
	</ul>
	
</section>
