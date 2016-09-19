<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Главная страница</title>

	<?php require_once('includes/header.php'); ?>
	
    <section class="regevent az-form"> 
        <div class="registr">
            <div class="an-exit">
                <span class="an-exit__krest"><i class="fa fa-times" aria-hidden="true"></i></span>
            </div>
            <div class="titregbox ah_titregbox">
                <span class="titreg">Добавить группу</span>
            </div>
            <form action="" class="common-form ah_form form1">
                <div class="row">
                    <div class="formwrapper ah_formwrapper">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="ah_upinput" class="ah_uplabel">Текст для заголовка input-a</label>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="file" id="f1" class="az-none az-file" accept="image/*">
                            <label for="f1" class="az-file2">Прикрепить фото</label>
                        </div

                        <div class="clearfix"></div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-default ah_btn">ОК</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="clearfix"></div>

    <section class="regevent az-form">
	    <div class="registr">
	        <div class="an-exit">
	            <span class="an-exit__krest"><i class="fa fa-times " aria-hidden="true"></i></span>
	        </div>
	        <div class="titregbox ah_titregbox">
	            <span class="titreg">Добавить список студентов</span>
	        </div>
	        <form action="" class="common-form ah_form form1">
	            <div class="row">
	                <div class="formwrapper ah_formwrapper">
	                    <div class="col-md-12 col-sm-12 col-xs-12">
							<label for="ah_upinput" class="ah_uplabel">Текст для заголовка input-a</label>
						</div>

						<div class="clearfix"></div>

						<div class="col-md-8 col-sm-8 col-xs-12">
							<input type="text" name="uname" id="ah_upinput" class="ah-evname">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
							<select multiple class="form-control">
								<option title="Текст для выбора 1">Текст для выбора 1</option>
								<option title="Текст для выбора 2">Текст для выбора 2</option>
								<option title="Текст для выбора 3">Текст для выбора 3</option>
								<option title="Текст для выбора 4">Текст для выбора 4</option>
								<option title="Текст для выбора 5">Текст для выбора 5</option>
								<option title="Текст для выбора 1">Текст для выбора 1</option>
								<option title="Текст для выбора 2">Текст для выбора 2</option>
								<option title="Текст для выбора 3">Текст для выбора 3</option>
								<option title="Текст для выбора 4">Текст для выбора 4</option>
								<option title="Текст для выбора 5">Текст для выбора 5</option>
							</select>
						</div

						<div class="clearfix"></div>
	                    
	                    <div class="col-md-12 col-sm-12 col-xs-12">
							<button type="submit" class="btn btn-default ah_btn">ОК</button>
	                    </div>

	                    <div class="clearfix"></div>
	                    
	                    <div class="col-md-6 col-sm-6 col-xs-12">
							<ul class="ah_uplist">
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 1 <span class="ah_uplist-span1">Роль 1</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 2 <span class="ah_uplist-span1">Роль 2</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 3 <span class="ah_uplist-span1">Роль 3</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 4 <span class="ah_uplist-span1">Роль 4</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 5 <span class="ah_uplist-span1">Роль 5</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 6 <span class="ah_uplist-span1">Роль 6</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 7 <span class="ah_uplist-span1">Роль 7</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 8 <span class="ah_uplist-span1">Роль 8</span></li>
							</ul>
	                    </div>
	                    <div class="col-md-6 col-sm-6 col-xs-12">
							<ul class="ah_uplist">
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 1 <span class="ah_uplist-span1">Роль 1</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 2 <span class="ah_uplist-span1">Роль 2</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 3 <span class="ah_uplist-span1">Роль 3</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 4 <span class="ah_uplist-span1">Роль 4</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 5 <span class="ah_uplist-span1">Роль 5</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 6 <span class="ah_uplist-span1">Роль 6</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 7 <span class="ah_uplist-span1">Роль 7</span></li>
								<li><span class="fa fa-times ah_uplist-span" aria-hidden="true"></span>Текст для выбора 8 <span class="ah_uplist-span1">Роль 8</span></li>
							</ul>
	                    </div>
	                </div>
	            </div>
			</form>
		</div>
	</section>

	<div class="clearfix"></div>

	<section class="regevent az-form">
	    <div class="registr">
	        <div class="an-exit">
	            <span class="an-exit__krest"><i class="fa fa-times " aria-hidden="true"></i></span>
	        </div>
	        <div class="titregbox ah_titregbox">
	            <span class="titreg">Сохранить</span>
	        </div>
	        <form action="" class="common-form ah_form form1">
	            <div class="row">
	                <div class="formwrapper ah_formwrapper">
	                    <div class="col-md-12 col-sm-12 col-xs-12">
							<label for="ah_upinput" class="ah_uplabel">Текст для заголовка input-a</label>
						</div>

						<div class="clearfix"></div>

						<div class="col-md-12 col-sm-12 col-xs-12">
							<input type="text" name="uname" id="ah_upinput" class="ah-evname">
						</div

						<div class="clearfix"></div>
	                    
	                    <div class="col-md-12 col-sm-12 col-xs-12">
							<button type="submit" class="btn btn-default ah_btn">ОК</button>
	                    </div>
	                </div>
	            </div>
			</form>
		</div>
	</section>

	<div class="clearfix"></div>	
    
	<section class="regevent az-form">
        <div class="registr">
            <div class="an-exit">
                <span class="an-exit__krest"><i class="fa fa-times " aria-hidden="true"></i></span>
            </div>
            <div class="titregbox ah_titregbox">
                <span class="titreg">Открыть</span>
            </div>
            <form action="" class="common-form form1">
                <div class="row">
                    <div class="formwrapper ah_formwrapper">
                        <div class="col-md-12 col-sm-12 col-xs-12">
							<select multiple class="form-control">
								<option title="Текст для выбора 1">Текст для выбора 1</option>
								<option title="Текст для выбора 2">Текст для выбора 2</option>
								<option title="Текст для выбора 3">Текст для выбора 3</option>
								<option title="Текст для выбора 4">Текст для выбора 4</option>
								<option title="Текст для выбора 5">Текст для выбора 5</option>
								<option title="Текст для выбора 1">Текст для выбора 1</option>
								<option title="Текст для выбора 2">Текст для выбора 2</option>
								<option title="Текст для выбора 3">Текст для выбора 3</option>
								<option title="Текст для выбора 4">Текст для выбора 4</option>
								<option title="Текст для выбора 5">Текст для выбора 5</option>
							</select>
						</div>

						<div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
							<button type="submit" class="btn btn-default ah_btn">ОК</button>
                        </div>
                    </div>
                </div>
			</form>
		</div>
	</section>

	<div class="clearfix"></div>

   
	
</body>
</html>