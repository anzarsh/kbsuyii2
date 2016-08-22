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
		
		<?php foreach ($users as $tempuser): ?>
			<tr>
				<td>1</td>
				<td>100</td>
				<td><a href="#activist" rel="modal"><?= Html::encode("{$tempuser->uname}") ?>:</a></td>
				<td>3</td>
				<td>Эконом</td>
			</tr>
		<?php endforeach; ?>
			<tr>
				<td>2</td>
				<td>99</td>
				<td><a href="#activist" rel="modal">Щумахуа Анзар Уащислаулович</a></td>
				<td>4</td>
				<td>Эконом</td>
			</tr>
			<tr>
				<td>3</td>
				<td>88</td>
				<td><a href="#activist" rel="modal">Щумахуа Анзар Уащислаулович</a></td>
				<td>5</td>
				<td>Эконом</td>
			</tr>
			<tr>
				<td>4</td>
				<td>77</td>
				<td><a href="#activist" rel="modal">Щумахуа Анзар Уащислаулович</a></td>
				<td>2</td>
				<td>Эконом</td>
			</tr>
			<tr>
				<td>5</td>
				<td>66</td>
				<td><a href="#activist" rel="modal">Щумахуа Анзар Уащислаулович</a></td>
				<td>1</td>
				<td>Эконом</td>
			</tr>

		</tbody>
	</table>

	<ul class="next-prev">
		<li class="az-disabled"><a href="#">Предыдущая</a></li>
		<li><a href="#">Следующая</a></li>
	</ul>
	<?= LinkPager::widget(['pagination' => $pagination]) ?>
</section>
