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

<div class="az-fixed">
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
                        <form method="post" action="/site/logout">
                            <input type="submit" class="az-exit" value="Выход">
                        </form>
                        <!-- <a href="/site/logout" class="az-exit">Выход</a> -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="anz-menu">
        <input type="checkbox" id="check_1" class="anz-mobile-992"/>
        <label class="anz-menu-ch anz-mobile-992" for="check_1"><i class="fa fa-bars" aria-hidden="true"></i><i class="fa fa-times" aria-hidden="true"></i></label>
        <div class="anz-perspective">
            <div class="menu-list-pressed">
                <ul class="main-menu">
                    <li><h2>Карта активиста</h2></li>
                    <li><a href="/" id="menu-rating">рейтинг</a></li>
                    <li><a href="/site/event" id="menu-event">мероприятия</a></li>
                    <li><a href="/site/groups" id="menu-groups">группы</a></li>
                    <li><a href="/site/memo" id="menu-memo">печать с/з</a></li>
                    <li><a href="/site/settings" id="menu-settings">настройки</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner">
                    БАННЕР
                </div>
            </div>
        </div>
    </div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
        <?= $content ?>
            </div>
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
</div>
<div id="mask"></div>
<div id="group" class="window">
    <div class="az-popup">
            <div class="an-exit">
                <a rel="modal" class="an-exit__krest an-exit__krest2 an-exit__krest_style2"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <h2 id="group0"></h2>
            <div class="az-form az-row">
                <div>
                    <span class="az-style2 az-col-150-px">Кол-во студентов:</span>
                    <span class="az-style1 az-col-99-150-px" id="group1"></span>
                </div>
            </div>
            <div class="az-form az-row az-center">
                <a id="group2" href="#usersadd" data-status="usersadd2" rel="modal" class="az-col-200-px az-button-add"><i class="fa fa-plus" aria-hidden="true"></i> Добавить активиста</a>
                <a id="group3" href="#changeGroup" rel="modal" class="az-col-200-px az-button-add"><i class="fa fa-refresh" aria-hidden="true"></i> Изменить группу</a>
                <a id="group4" href="#" class="az-col-200-px az-button-add"><i class="fa fa-trash" aria-hidden="true"></i> Удалить группу</a>
            </div>
            <table class="az-table">
                <thead class="table-head">
                    <tr>
                        <th>№</th>
                        <th>фио</th>
                        <th>курс</th>
                        <th>ИНСТИТУТ/ВШ</th>
                    </tr>
                </thead>
                <tbody class="table-content" id="grouptable">
                </tbody>
            </table>
    </div>
</div>

<div id="activist" class="window">
    <div class="az-popup">
            <div class="an-exit">
                <a rel="modal" class="an-exit__krest an-exit__krest2 an-exit__krest_style2"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <h2>карта активиста</h2>
            <div class="az-form az-row">
                <span class="az-style2" id="user1"></span>
                <span class="az-style1" id="user2"></span>
            </div>
            <div class="az-form az-row">
                <span class="az-style1" id="user3"></span>
            </div>
            <div class="az-form az-row">
                <span class="az-style2">тел.:</span><span class="az-style4" href="tel:+79888888888" id="user4">+7(988)888-88-88</span>
            </div>
            <div class="az-form az-row">
                <span class="az-style2">группы: </span>
                <span id="user5">
                </span>
            </div>
            <table class="az-table">
                <thead class="table-head">
                    <tr>
                        <th>№</th>
                        <th>Дата</th>
                        <th>Наименование</th>
                        <th>статус</th>
                        <th>баллы</th>
                    </tr>
                </thead>
                <tbody class="table-content" id="usertable">
                </tbody>
            </table>
    </div>
</div>

<div id="event" class="window">
    <div class="az-popup">
            <div class="an-exit">
                <a rel="modal" class="an-exit__krest an-exit__krest2 an-exit__krest_style2"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <h2 id="event0"></h2>
            <div class="az-form az-row">
                <div>
                    <span class="az-style2 az-col-100-px">Уровень:</span>
                    <span id="event1" class="az-style1 az-col-44-100-px az-col-push-10 az-col-xs-99-100-px az-col-xs-push-0"></span>
                    <span class="az-style2 az-col-100-px">Координатор:</span>
                    <span id="event2" class="az-style1 az-col-44-100-px az-col-xs-99-100-px az-col-xs-push-0"></span>
                </div>
                <div>
                    <span class="az-style2 az-col-100-px">Начало:</span>
                    <span id="event3" class="az-style1 az-col-44-100-px az-col-push-10 az-col-xs-99-100-px az-col-xs-push-0"></span>
                    <span class="az-style2 az-col-100-px">Регистратор:</span>
                    <span id="event4" class="az-style1 az-col-44-100-px az-col-xs-99-100-px az-col-xs-push-0"></span>
                </div>
                <div>
                    <span class="az-style2 az-col-100-px">Окончание:</span>
                    <span id="event5" class="az-style1 az-col-44-100-px az-col-push-10 az-col-xs-99-100-px az-col-xs-push-0"></span>
                    <span class="az-style2 az-col-100-px">Вид:</span>
                    <span id="event6" class="az-style1 az-col-44-100-px az-col-xs-99-100-px az-col-xs-push-0"></span>
                </div>
                <div>
                    <span class="az-style2 az-col-100-px">Место:</span>
                    <span id="event7" class="az-style1 az-col-44-100-px az-col-push-10 az-col-xs-99-100-px az-col-xs-push-0"></span>
                    <span class="az-style2 az-col-100-px">Тип:</span>
                    <span id="event8" class="az-style1 az-col-44-100-px az-col-xs-99-100-px az-col-xs-push-0"></span>
                </div>
            </div>
            <div class="az-form az-row">
            <span class="az-style2 az-col-100">Комментарий:</span>
            <span id="event9" class="az-style1 az-col-100">Несмотря на внутренние противоречия, элемент политического процесса теоретически представляет собой эмпирический субъект политического процесса. Политическое учение Руссо, несмотря на внешние воздействия, фактически символизирует постиндустриализм. Технология коммуникации теоретически доказывает прагматический коллапс Советского Союза.</span>

            </div>
            <div class="az-form az-row az-center">
                <a id="event_2" href="#usersadd" data-status="regadd" rel="modal" class="az-col-175-px az-button-add"><i class="fa fa-plus" aria-hidden="true"></i> Добавить регистраторов</a>
                <a id="event_5" href="#activeadd" rel="modal" class="az-col-175-px az-button-add"><i class="fa fa-plus" aria-hidden="true"></i> Добавить активиста</a>
                <a id="event_3" href="#changeEvent" rel="modal" class="az-col-175-px az-button-add"><i class="fa fa-refresh" aria-hidden="true"></i> Изменить</a>
                <a id="event_4" href="#" class="az-col-175-px az-button-add"><i class="fa fa-trash" aria-hidden="true"></i> Удалить</a>
            </div>
            <table class="az-table">
        <thead class="table-head">
            <tr>
                <th>№</th>
                <th>фио</th>
                <th>роль</th>
                <th>курс</th>
                <th>ИНСТИТУТ/ВШ</th>
            </tr>
        </thead>
        <tbody class="table-content" id="eventtable">
        </tbody>
    </table>
    <!-- <ul class="next-prev">
        <li class="az-disabled"><a href="#">Предыдущая</a></li>
        <li><a href="#">Следующая</a></li>
    </ul> -->
        <!-- </div> -->
    </div>
</div>

<div id="addEvent" class="window">
    <section class="regevent az-form">
        <!-- <div class="container"> -->
            <!-- <div class="row"> -->
                <div class="registr">
                    <div class="an-exit">
                        <span class="an-exit__krest"><i class="fa fa-times" aria-hidden="true"></i></span>
                    </div>
                    <div class="titregbox">
                        <span class="titreg">Регистрация мероприятия</span>
                    </div>
                    <form action="/site/event" class="common-form form1 form12" method="post">
                        <div class="row">
                            <div class="formwrapper">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="formwrapper1">
                                        <span class="ah-span ah-mspan">Название:</span>
                                        <input type="text" name="AddEvent[uname]" placeholder="" class="ah-evname">
                                        <input type="hidden" name="AddEvent[id]" id="ah_upinput" class="az-evname" value="-1">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="formwrapper2">
                                        <span class="ah-span ah-mspan">Уровень:</span>
                                        <select name="AddEvent[id_eventlevel]" placeholder="" class="event-input az-block az-select">
                                            <option value="0">Факультетский</option>
                                            <option value="1">Университетский</option>
                                            <option value="2">Городской</option>
                                            <option value="3">Республиканский</option>
                                            <option value="4">Окружной</option>
                                            <option value="5">Всероссийский</option>
                                            <option value="6">Международный</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="formwrapper2">
                                        <span class="ah-span ah-mspan">Место:</span>
                                        <input type="text" name="AddEvent[location]" placeholder="" class="event-input az-block">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper3">
                                        <span class="ah-span ah-mspan">Дата начала:</span>
                                        <div class="input-append date date-input" id="datepicker3" data-date="dateValue: Customer.DateOfBirth" data-date-format="dd.mm.yyyy">
                                            <input type="text" name="AddEvent[startdate]" placeholder="" class="ah-startdate az-col-100-24-px">
                                            <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper3">
                                        <span class="ah-span ah-mspan">Дата окончания:</span>
                                        <div class="input-append date date-input" id="datepicker4" data-date="dateValue: Customer.DateOfBirth" data-date-format="dd.mm.yyyy">
                                            <input type="text" name="AddEvent[finishdate]" placeholder="" class="ah-finishdate az-col-100-24-px">
                                            <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="formwrapper4">
                                        <div class="formwrapper4_1">
                                            <span class="ah-span ah-mspan">Координатор:</span>
                                            <div class="">
                                                <input type="text" class="az-evname2 az-margin" id="findcoord" value="" placeholder="поиск координатора">
                                                <select size="4" class="ah-form-control az-select" id="selectcoord" name="AddEvent[id_coordinator]">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <span class="ah-span padd">Вид деятельности:</span>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper5">
                                        <div class="formwrapper5box checkbox checkbox-warning">
                                            <input type="hidden" name="AddEvent[id_activity0]" value="">
                                            <input type="checkbox" name="AddEvent[id_activity0]" value="0" class="ah-activ1 styled" id="ah-activ1">
                                            <label for="ah-activ1" class="">Общественное</label>
                                        </div>
                                        <div class="formwrapper5box checkbox checkbox-primary">
                                            <input type="hidden" name="AddEvent[id_activity1]" value="">
                                            <input type="checkbox" name="AddEvent[id_activity1]" value="1" class="ah-activ2 styled" id="ah-activ2">
                                            <label for="ah-activ2" class="">Научно-исследовательское</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper5">
                                        <div class="formwrapper5box checkbox checkbox-info">
                                            <input type="hidden" name="AddEvent[id_activity2]" value="">
                                            <input type="checkbox" name="AddEvent[id_activity2]" value="2" class="ah-activ3" id="ah-activ3">
                                            <label for="ah-activ3" class="">Творческое</label>
                                        </div>
                                        <div class="formwrapper5box checkbox checkbox-success">
                                            <input type="hidden" name="AddEvent[id_activity3]" value="">
                                            <input type="checkbox" name="AddEvent[id_activity3]" value="3" class="ah-activ4" id="ah-activ4">
                                            <label for="ah-activ4" class="">Спортивное</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <span class="ah-span padd">Тип мероприятия:</span>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper6">
                                        <div class="formwrapper6box checkbox checkbox-danger">
                                            <input type="hidden" name="AddEvent[id_eventtype0]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype0]" value="0" class="ah-eventtype1" id="ah-eventtype1">
                                            <label for="ah-eventtype1" class="">Организационное</label>
                                        </div>
                                        <div class="formwrapper6box checkbox checkbox-warning">
                                            <input type="hidden" name="AddEvent[id_eventtype1]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype1]" value="1" class="ah-eventtype2" id="ah-eventtype2">
                                            <label for="ah-eventtype2" class="">Воспитательное/<br>Патриотическое</label>
                                        </div>  
                                        <div class="formwrapper6box checkbox checkbox-primary">
                                            <input type="hidden" name="AddEvent[id_eventtype2]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype2]" value="2" class="ah-eventtype3" id="ah-eventtype3">
                                            <label for="ah-eventtype3" class="">Благотворительное</label>
                                        </div>  
                                        <div class="formwrapper6box checkbox checkbox-info">
                                            <input type="hidden" name="AddEvent[id_eventtype3]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype3]" value="3" class="ah-eventtype4" id="ah-eventtype4">
                                            <label for="ah-eventtype4" class="">Конкурс/Соревнование</label>
                                        </div>  
                                        <div class="formwrapper6box checkbox checkbox-success">
                                            <input type="hidden" name="AddEvent[id_eventtype4]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype4]" value="4" class="ah-eventtype5" id="ah-eventtype5">
                                            <label for="ah-eventtype5" class="">Концертная программа</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper6">
                                        <div class="formwrapper6box checkbox checkbox-danger">
                                            <input type="hidden" name="AddEvent[id_eventtype5]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype5]" value="5" class="ah-eventtype6" id="ah-eventtype6">
                                            <label for="ah-eventtype6" class="">Приуроченная акция<br>(не благотворительная)</label>
                                        </div>
                                        <div class="formwrapper6box checkbox checkbox-warning">
                                            <input type="hidden" name="AddEvent[id_eventtype6]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype6]" value="6" class="ah-eventtype7" id="ah-eventtype7">
                                            <label for="ah-eventtype7" class="">Выпуск периодического<br>продукта</label>
                                        </div>
                                        <div class="formwrapper6box checkbox checkbox-primary">
                                            <input type="hidden" name="AddEvent[id_eventtype7]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype7]" value="7" class="ah-eventtype8" id="ah-eventtype8">
                                            <label for="ah-eventtype8" class="">Форум/Конференция</label>
                                        </div>
                                        <div class="formwrapper6box checkbox checkbox-info">
                                            <input type="hidden" name="AddEvent[id_eventtype8]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype8]" value="8" class="ah-eventtype9" id="ah-eventtype9">
                                            <label for="ah-eventtype9" class="">Прием/Почетная встреча</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <span class="ah-span padd ah-border">Сложность мероприятия:</span>
                                    <div class="formwrapper7">
                                        <div class="textbox">
                                            <p class="ah-span2 ah-color"><span>"Тяжелое" мероприятие</span> – нечастое, требующее длительной подготовки мероприятие или требующее большой ответственности на протяжении длительного времени</p>
                                        </div>
                                        <div class="checkbox checkbox-info">
                                            <input type="hidden" name="AddEvent[id_eventcomp]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventcomp]" value="1" class="ah-eventcomp" id="ah-eventcomp">
                                            <label for="ah-eventcomp" class="">"Тяжелое" мероприятие</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="ah-border1"></div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <span class="ah-span">Комментарий:</span>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="formwrapper7">
                                        <textarea name="AddEvent[comment]"></textarea>
                                        <input type="submit" value="Добавить" class="ah-formsubmit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </section>
</div>

<div id="changeEvent" class="window">
    <section class="regevent az-form">
        <!-- <div class="container"> -->
            <!-- <div class="row"> -->
                <div class="registr">
                    <div class="an-exit">
                        <a href="#event" rel="modal" class="an-exit__krest"><i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                    <div class="titregbox">
                        <span class="titreg">Изменить мероприятие</span>
                    </div>
                    <form action="/site/event" class="common-form form1 form12" method="post">
                        <div class="row">
                            <div class="formwrapper">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="formwrapper1">
                                        <span class="ah-span ah-mspan">Название:</span>
                                        <input type="text" name="AddEvent[uname]" placeholder="" class="ah-evname">
                                        <input type="hidden" name="AddEvent[id]" id="ah_upinput" class="az-evname" value="">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="formwrapper2">
                                        <span class="ah-span ah-mspan">Уровень:</span>
                                        <select name="AddEvent[id_eventlevel]" placeholder="" class="event-input az-block az-select">
                                            <option value="0">Факультетский</option>
                                            <option value="1">Университетский</option>
                                            <option value="2">Городской</option>
                                            <option value="3">Республиканский</option>
                                            <option value="4">Окружной</option>
                                            <option value="5">Всероссийский</option>
                                            <option value="6">Международный</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="formwrapper2">
                                        <span class="ah-span ah-mspan">Место:</span>
                                        <input type="text" name="AddEvent[location]" placeholder="" class="event-input az-block">
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper3">
                                        <span class="ah-span ah-mspan">Дата начала:</span>
                                        <div class="input-append date date-input" id="datepicker5" data-date="dateValue: Customer.DateOfBirth" data-date-format="dd.mm.yyyy">
                                            <input type="text" name="AddEvent[startdate]" placeholder="" class="ah-startdate az-col-100-24-px">
                                            <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper3">
                                        <span class="ah-span ah-mspan">Дата окончания:</span>
                                        <div class="input-append date date-input" id="datepicker6" data-date="dateValue: Customer.DateOfBirth" data-date-format="dd.mm.yyyy">
                                            <input type="text" name="AddEvent[finishdate]" placeholder="" class="ah-finishdate az-col-100-24-px">
                                            <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="formwrapper4">
                                        <div class="formwrapper4_1">
                                            <span class="ah-span ah-mspan">Координатор:</span>
                                            <div class="">
                                                <input type="text" class="az-evname2 az-margin" id="findcoord2" value="" placeholder="поиск координатора">
                                                <select size="4" class="ah-form-control az-select" id="selectcoord2" name="AddEvent[id_coordinator]">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <span class="ah-span padd">Вид деятельности:</span>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper5">
                                        <div class="formwrapper5box checkbox checkbox-warning">
                                            <input type="hidden" name="AddEvent[id_activity0]" value="">
                                            <input type="checkbox" name="AddEvent[id_activity0]" value="0" class="ah-activ1 styled" id="ah-activ12">
                                            <label for="ah-activ12" class="">Общественное</label>
                                        </div>
                                        <div class="formwrapper5box checkbox checkbox-primary">
                                            <input type="hidden" name="AddEvent[id_activity1]" value="">
                                            <input type="checkbox" name="AddEvent[id_activity1]" value="1" class="ah-activ2 styled" id="ah-activ22">
                                            <label for="ah-activ22" class="">Научно-исследовательское</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper5">
                                        <div class="formwrapper5box checkbox checkbox-info">
                                            <input type="hidden" name="AddEvent[id_activity2]" value="">
                                            <input type="checkbox" name="AddEvent[id_activity2]" value="2" class="ah-activ3" id="ah-activ32">
                                            <label for="ah-activ32" class="">Творческое</label>
                                        </div>
                                        <div class="formwrapper5box checkbox checkbox-success">
                                            <input type="hidden" name="AddEvent[id_activity3]" value="">
                                            <input type="checkbox" name="AddEvent[id_activity3]" value="3" class="ah-activ4" id="ah-activ42">
                                            <label for="ah-activ42" class="">Спортивное</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <span class="ah-span padd">Тип мероприятия:</span>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper6">
                                        <div class="formwrapper6box checkbox checkbox-danger">
                                            <input type="hidden" name="AddEvent[id_eventtype0]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype0]" value="0" class="ah-eventtype1" id="ah-eventtype12">
                                            <label for="ah-eventtype12" class="">Организационное</label>
                                        </div>
                                        <div class="formwrapper6box checkbox checkbox-warning">
                                            <input type="hidden" name="AddEvent[id_eventtype1]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype1]" value="1" class="ah-eventtype2" id="ah-eventtype22">
                                            <label for="ah-eventtype22" class="">Воспитательное/<br>Патриотическое</label>
                                        </div>  
                                        <div class="formwrapper6box checkbox checkbox-primary">
                                            <input type="hidden" name="AddEvent[id_eventtype2]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype2]" value="2" class="ah-eventtype3" id="ah-eventtype32">
                                            <label for="ah-eventtype32" class="">Благотворительное</label>
                                        </div>  
                                        <div class="formwrapper6box checkbox checkbox-info">
                                            <input type="hidden" name="AddEvent[id_eventtype3]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype3]" value="3" class="ah-eventtype4" id="ah-eventtype42">
                                            <label for="ah-eventtype42" class="">Конкурс/Соревнование</label>
                                        </div>  
                                        <div class="formwrapper6box checkbox checkbox-success">
                                            <input type="hidden" name="AddEvent[id_eventtype4]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype4]" value="4" class="ah-eventtype5" id="ah-eventtype52">
                                            <label for="ah-eventtype52" class="">Концертная программа</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="formwrapper6">
                                        <div class="formwrapper6box checkbox checkbox-danger">
                                            <input type="hidden" name="AddEvent[id_eventtype5]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype5]" value="5" class="ah-eventtype6" id="ah-eventtype62">
                                            <label for="ah-eventtype62" class="">Приуроченная акция<br>(не благотворительная)</label>
                                        </div>
                                        <div class="formwrapper6box checkbox checkbox-warning">
                                            <input type="hidden" name="AddEvent[id_eventtype6]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype6]" value="6" class="ah-eventtype7" id="ah-eventtype72">
                                            <label for="ah-eventtype72" class="">Выпуск периодического<br>продукта</label>
                                        </div>
                                        <div class="formwrapper6box checkbox checkbox-primary">
                                            <input type="hidden" name="AddEvent[id_eventtype7]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype7]" value="7" class="ah-eventtype8" id="ah-eventtype82">
                                            <label for="ah-eventtype82" class="">Форум/Конференция</label>
                                        </div>
                                        <div class="formwrapper6box checkbox checkbox-info">
                                            <input type="hidden" name="AddEvent[id_eventtype8]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventtype8]" value="8" class="ah-eventtype9" id="ah-eventtype92">
                                            <label for="ah-eventtype92" class="">Прием/Почетная встреча</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <span class="ah-span padd ah-border">Сложность мероприятия:</span>
                                    <div class="formwrapper7">
                                        <div class="textbox">
                                            <p class="ah-span2 ah-color"><span>"Тяжелое" мероприятие</span> – нечастое, требующее длительной подготовки мероприятие или требующее большой ответственности на протяжении длительного времени</p>
                                        </div>
                                        <div class="checkbox checkbox-info">
                                            <input type="hidden" name="AddEvent[id_eventcomp]" value="">
                                            <input type="checkbox" name="AddEvent[id_eventcomp]" value="1" class="ah-eventcomp" id="ah-eventcomp">
                                            <label for="ah-eventcomp" class="">"Тяжелое" мероприятие</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="ah-border1"></div>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <span class="ah-span">Комментарий:</span>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="formwrapper7">
                                        <textarea name="AddEvent[comment]"></textarea>
                                        <input type="submit" value="Добавить" class="ah-formsubmit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </section>
</div>

<div id="addGroup" class="window">
    <div class="registr">
            <div class="an-exit">
                <span class="an-exit__krest"><i class="fa fa-times" aria-hidden="true"></i></span>
            </div>
            <div class="titregbox ah_titregbox">
                <span class="titreg">Добавить группу</span>
            </div>
            <form action="/site/groups" class="common-form ah_form form5" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="formwrapper ah_formwrapper">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="ah_upinput" class="ah_uplabel">Название группы</label>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?= Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>
                            <input type="text"  name="AddGroup[uname]" id="ah_upinput" class="az-evname" value="">
                            <input type="hidden"  name="AddGroup[id]" id="ah_upinput" class="az-evname" value="-1">
                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="hidden" name="AddGroup[imageFile]" >
                            <input type="file" id="f1" class="az-none az-file" accept="image/*" name="AddGroup[imageFile]" value="">
                            <label for="f1" class="az-file2">Прикрепить фото</label>
                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="ah_btn">ОК</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>

<div id="changeGroup" class="window">
    <div class="registr">
            <div class="an-exit">
                <a href="#group" rel="modal" class="an-exit__krest"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <div class="titregbox ah_titregbox">
                <span class="titreg">Изменить группу</span>
            </div>
            <form action="/site/groups" class="common-form ah_form form5" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="formwrapper ah_formwrapper">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label for="ah_upinput" class="ah_uplabel">Название группы</label>
                        </div>

                        <div class="clearfix"></div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <?= Html::hiddenInput(\Yii::$app->getRequest()->csrfParam, \Yii::$app->getRequest()->getCsrfToken(), []); ?>
                            <input type="text"  name="AddGroup[uname]" id="ah_upinput" class="az-evname" value="">
                            <input type="hidden"  name="AddGroup[id]" id="ah_upinput" class="az-evname" value="">

                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="hidden" name="AddGroup[imageFile]" >
                            <input type="file" id="f2" class="az-none az-file" accept="image/*" name="AddGroup[imageFile]" value="">
                            <label for="f2" class="az-file2">Прикрепить фото</label>
                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="ah_btn">ОК</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>

<div id="usersadd" class="window">
    <div class="registr">
        <div class="an-exit">
            <a href="#" rel="modal" class="an-exit__krest"><i class="fa fa-times " aria-hidden="true"></i></a>
        </div>
        <div class="titregbox ah_titregbox">
            <span class="titreg">Добавить список студентов</span>
        </div>
        <form action="" class="common-form ah_form form1">
            <div class="row">
                <div class="formwrapper ah_formwrapper">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- <label for="ah_upinput" class="ah_uplabel">Текст для заголовка input-a</label> -->
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" name="uname" class="az-evname2" id="finduser" value="">
                        <input type="hidden" name="status" class="az-evname2" id="" value="">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <p id="finduser2"></p>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <select multiple class="ah-form-control" id="selectuser">
                        </select>
                    </div>

                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="ah_btn" id="selectuserbtn">Выбрать</button>
                    </div>

                    <div class="clearfix"></div>
                    
                    <div id="usersadded">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="ah_btn" id="selectuseraddbtn">Добавить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="activeadd" class="window">
    <div class="registr">
        <div class="an-exit">
            <a href="#" rel="modal" class="an-exit__krest"><i class="fa fa-times " aria-hidden="true"></i></a>
        </div>
        <div class="titregbox ah_titregbox">
            <span class="titreg">Добавить список участников</span>
        </div>
        <form action="" class="common-form ah_form form1">
            <div class="row">
                <div class="formwrapper ah_formwrapper">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- <label for="ah_upinput" class="ah_uplabel">Текст для заголовка input-a</label> -->
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" name="uname" class="az-evname2" id="findactive" value="">
                        <input type="hidden" name="status" class="az-evname2" id="" value="">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <p id="findactive2"></p>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <select size="4" class="ah-form-control" id="selectactive">
                        </select>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <select size="1" class="ah-form-control" id="selectactiverole" name="id_status">
                            <option value="1">Участник</option>
                            <option value="2">Помощник организатора</option>
                            <option value="3">Организатор</option>
                            <option value="4">Главный организатор</option>
                        </select>
                    </div>

                    <div class="clearfix"></div>
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="ah_btn" id="selectactivebtn">Выбрать</button>
                    </div>

                    <div class="clearfix"></div>
                    
                    <div id="activeadded">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <button type="submit" class="ah_btn" id="selectactiveaddbtn">Добавить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<?php //$this->endBody() ?>
<script src="../../views/js/common.js"></script>
</body>
</html>
<?php $this->endPage() ?>
