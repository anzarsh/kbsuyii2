<?php 
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>

<section class="az-sec-table">
	<h2>Группы</h2>
	<form action="" class="az-form az-row">
		<input type="text" placeholder="Наименование" class="az-col-99-100-px">
		<a href="#" class="az-col-100-px az-button-add">Добавить</a>
	</form>
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
				<td><a href="#group" rel="modal"><?= Html::encode("{$group->uname}") ?></a></td>
				<td><?= count($group->number); ?></td>
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
