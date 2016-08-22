<section class="az-sec-table">
	<h2>Мероприятия</h2>
	<form action="" class="az-form">
		<div class="az-separate az-row">
			<input type="text" placeholder="Наименование" class="az-col-98-200-px az-col-xs-99-100-px">
			<input type="text" placeholder="Уровень" class="az-col-100-px az-col-xs-hidden">
			<a href="#ah-myup" rel="modal" class="az-button-add az-col-100-px">Добавить</a>
		</div>
		<div class="az-separate az-row">
			<input type="text" placeholder="Координатор" class="az-col-98-300-px az-col-xs-hidden">
			<input type="date" placeholder="с" class="az-col-150-px az-col-xs-49">
			<input type="date" placeholder="по" class="az-col-150-px az-col-xs-49">
		</div>
		<div class="az-separate az-row">
			<span class="ah-span padd az-activity">Вид деятельности: <i class="fa fa-angle-double-down anz-mobile-768" aria-hidden="true"></i><i class="fa fa-angle-double-up az-disp-none" aria-hidden="true"></i></span>
			<div class="az-open anz-desktop-768">
				<div class="formwrapper5box checkbox checkbox-warning">
	                <input type="checkbox" name="id_activity" value="activ1" class="ah-activ1 styled" id="ah-activ11" checked>
	                <label for="ah-activ11" class="ah-activ1_style">Общественное</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-primary">
	                <input type="checkbox" name="id_activity" value="activ2" class="ah-activ2 styled" id="ah-activ21">
	                <label for="ah-activ21" class="ah-activ1_style">Научно-исследовательское</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-info">
		            <input type="checkbox" name="id_activity" value="activ3" class="ah-activ3" id="ah-activ31">
		            <label for="ah-activ31" class="ah-activ1_style">Творческое</label>
		        </div>
		        <div class="formwrapper5box checkbox checkbox-success">
		            <input type="checkbox" name="id_activity" value="activ4" class="ah-activ4" id="ah-activ41">
		            <label for="ah-activ41" class="ah-activ1_style">Спортивное</label>
		        </div>
	        </div>
		</div>
		<div class="az-separate az-row">
			<span class="ah-span padd az-eventtype">Тип мероприятия: <i class="fa fa-angle-double-down anz-mobile-768" aria-hidden="true"></i><i class="fa fa-angle-double-up az-disp-none" aria-hidden="true"></i></span>
			<div class="az-open anz-desktop-768">
				<div class="formwrapper5box checkbox checkbox-danger">
	                <input type="checkbox" name="id_eventtype" value="type1" class="ah-eventtype1" id="ah-eventtype11" checked>
	                <label for="ah-eventtype11" class="ah-activ1_style">Организационное</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-warning">
	                <input type="checkbox" name="id_eventtype" value="type2" class="ah-eventtype2" id="ah-eventtype21">
	                <label for="ah-eventtype21" class="ah-activ1_style">Воспитательное/<br>Патриотическое</label>
	            </div>  
	            <div class="formwrapper5box checkbox checkbox-primary">
	                <input type="checkbox" name="id_eventtype" value="type3" class="ah-eventtype3" id="ah-eventtype31">
	                <label for="ah-eventtype31" class="ah-activ1_style">Благотворительное</label>
	            </div>  
	            <div class="formwrapper5box checkbox checkbox-info">    
	                <input type="checkbox" name="id_eventtype" value="type4" class="ah-eventtype4" id="ah-eventtype41">
	                <label for="ah-eventtype41" class="ah-activ1_style">Конкурс/Соревнование</label>
	            </div>  
	            <div class="formwrapper5box checkbox checkbox-success"> 
	                <input type="checkbox" name="id_eventtype" value="type5" class="ah-eventtype5" id="ah-eventtype51">
	                <label for="ah-eventtype51" class="ah-activ1_style">Концертная программа</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-danger">
	                <input type="checkbox" name="id_eventtype" value="type6" class="ah-eventtype6" id="ah-eventtype61">
	                <label for="ah-eventtype61" class="ah-activ1_style">Приуроченная акция<br>(не благотворительная)</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-warning">
	                <input type="checkbox" name="id_eventtype" value="type7" class="ah-eventtype7" id="ah-eventtype71">
	                <label for="ah-eventtype71" class="ah-activ1_style">Выпуск периодического<br>продукта</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-primary">
	                <input type="checkbox" name="id_eventtype" value="type8" class="ah-eventtype8" id="ah-eventtype81">
	                <label for="ah-eventtype81" class="ah-activ1_style">Форум/Конференция</label>
	            </div>
	            <div class="formwrapper5box checkbox checkbox-info">
	                <input type="checkbox" name="id_eventtype" value="type9" class="ah-eventtype9" id="ah-eventtype91">
	                <label for="ah-eventtype91" class="ah-activ1_style">Прием/Почетная встреча</label>
	            </div>
            </div>
        </div>
	</form>
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
			<tr>
				<td>02.07.2016<br>01.07.2016</td>
				<td><a href="#event" rel="modal">Пресс-конференция "Умы России"</a></td>
				<td>мировой</td>
				<td>А.С.Ксенофонтов</td>
				<td>20</td>
			</tr>
			<tr>
				<td>02.06.2016<br>01.06.2016</td>
				<td><a href="#event" rel="modal">Пресс-конференция "Умы Таджикистана"</a></td>
				<td>Россия</td>
				<td>А.С.Ксенофонтов</td>
				<td>23</td>
			</tr>
			<tr>
				<td>02.05.2016<br>01.05.2016</td>
				<td><a href="#event" rel="modal">Пресс-конференция "Умы Киргизии"</a></td>
				<td>Регион</td>
				<td>А.С.Ксенофонтов</td>
				<td>21</td>
			</tr>
			<tr>
				<td>02.04.2016<br>01.04.2016</td>
				<td><a href="#event" rel="modal">Пресс-конференция "Умы Венгрии"</a></td>
				<td>Университет</td>
				<td>А.С.Ксенофонтов</td>
				<td>1</td>
			</tr>
			<tr>
				<td>02.03.2016<br>01.03.2016</td>
				<td><a href="#event" rel="modal">Пресс-конференция "Умы России"</a></td>
				<td>мировой</td>
				<td>А.С.Ксенофонтов</td>
				<td>18</td>
			</tr>
		</tbody>
	</table>
	<ul class="next-prev">
		<li class="az-disabled"><a href="#">Предыдущая</a></li>
		<li><a href="#">Следующая</a></li>
	</ul>
</section>
