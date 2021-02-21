@extends('layouts.app')

@section('content')
<div class="smb_breadcrumb">
    <ul>
        <li>Главная / </li>
        <li>Продавец /</li>
        <li>Slasti.kz</li>
    </ul>
</div>

    <div class="review">
        <div class="container">
            <div class="review_simple">
                <div class="review_top">
                    <div class="review_text">
                        <h3>Оценить продавца Slati.kz - <a href="#">Интернет-магазин оригинальных сладостей</a></h3>
                    </div>
                    <div class="review_section">
                        <h5>Отзыв можно оставить только после заказа через корзину. Если вы заказали не через корзину и столкнулись с проблемой, напишите в Службу контроля качества.</h5>
                    </div>
                </div> 

                <div class="review_center">
                    <div class="review_center_start">
                        <div class="review_center_one">
                            <h4>Цена товара (услуги) была указана правильно?</h4>
                            <div class="dontknow">
                                <input type="radio" id="dontknow" name="answer" value="dontknow">
                                <label for="dontknow">Не помню</label><br>
                            </div>
                            <div class="yes">
                                <input type="radio" id="yes" name="yes" value="yes">
                                <label for="yes">Да</label><br>
                            </div>
                            <div class="no">
                                <input type="radio" id="no" name="no" value="no">
                                <label for="no">Нет</label>
                            </div>
                        </div>
                        <div class="review_center_one">
                            <h4>Наличие товара (услуги) было указанно правильно?</h4>
                            <div class="dontknow">
                                <input type="radio" id="dontknow" name="answer" value="dontknow">
                                <label for="dontknow">Не помню</label><br>
                            </div>
                            <div class="yes">
                                <input type="radio" id="yes" name="yes" value="yes">
                                <label for="yes">Да</label><br>
                            </div>
                            <div class="no">
                                <input type="radio" id="no" name="no" value="no">
                                <label for="no">Нет</label>
                            </div>
                        </div>
                        <div class="review_center_one">
                            <h4>Описание товара (услуги) было актуальным?</h4>
                            <div class="dontknow">
                                <input type="radio" id="dontknow" name="answer" value="dontknow">
                                <label for="dontknow">Не помню</label><br>
                            </div>
                            <div class="yes">
                                <input type="radio" id="yes" name="yes" value="yes">
                                <label for="yes">Да</label><br>
                            </div>
                            <div class="no">
                                <input type="radio" id="no" name="no" value="no">
                                <label for="no">Нет</label>
                            </div>
                        </div>
                        <div class="review_center_one">
                            <h4>Заказ был выполнен в оговоренные сроки?</h4>
                            <div class="dontknow">
                                <input type="radio" id="dontknow" name="answer" value="dontknow">
                                <label for="dontknow">Не помню</label><br>
                            </div>
                            <div class="yes">
                                <input type="radio" id="yes" name="yes" value="yes">
                                <label for="yes">Да</label><br>
                            </div>
                            <div class="no">
                                <input type="radio" id="no" name="no" value="no">
                                <label for="no">Нет</label>
                            </div>
                        </div>
                        <div class="review_center_dropdown">
                            <h4>Как быстро с вами связались?</h4>
                            <select name="">
                                <option value="" selected>Не помню</option>
                                <option value="">Да</option>
                                <option value="">Нет</option>
                                <option value="">Не смотрел время</option>
                            </select>
                            <h4>При заказе в нерабочее время - отсчитывается от начала следующего рабочего дня.</h4>
                            
                        </div>
                        <div class="review_center_one">
                            <h4>Вы бы порекомендовали продавца своим друзьям?</h4>
                            <div class="dontknow">
                                <input type="radio" id="dontknow" name="answer" value="dontknow">
                                <label for="dontknow">Не помню</label><br>
                            </div>
                            <div class="yes">
                                <input type="radio" id="yes" name="yes" value="yes">
                                <label for="yes">Да</label><br>
                            </div>
                            <div class="no">
                                <input type="radio" id="no" name="no" value="no">
                                <label for="no">Нет</label>
                            </div>
                        </div>
                        <div class="review_center_one">
                            <h4>Общая оценка продавца</h4>
                            <review-star-component></review-star-component>
                        </div>
                    </div>   
                    <div class="review_center_end">
                        <div class="center_banner">
                            <div class="center_info">
                                <div class="center_info_text">
                                    <div class="center_info_text_title">
                                        <h1><span>100%</span></h1>
                                        <h3>положительных из 9 отзывов в год</h3>
                                    </div>
                                    <h5>Всего 18 отзывов за 3 года</h5>
                                    <review-star-component></review-star-component>
                                    <h3 class="grade_user">Оценки покупателей <span class="twelve">12 месяцев</span></h3>
                                </div>
                                <div class="criterion">
                                    <div class="criterion_block">
                                        <ul>
                                            <li><h4><span>Критерий</span></h4></li>
                                            <li><h4>Актуальность цены</h4></li>
                                            <li><h4>Актуальность наличия</h4></li>
                                            <li><h4>Актуальность описания</h4></li>
                                            <li><h4>Выполнение заказа в срок</h4></li>
                                        </ul>
                                    </div>
                                    <div class="criterion_block">
                                        <ul>
                                            <li><h4><span>% ответов "Да"</span></h4></li>
                                            <li><h4>100%</h4></li>
                                            <li><h4>75%</h4></li>
                                            <li><h4>100%</h4></li>
                                            <li><h4>100%</h4></li>
                                        </ul>
                                    </div>
                                    <div class="criterion_block">
                                        <li><h4><span>Кол-во ответов</span></h4></li>
                                        <li><h4>8</h4></li>
                                        <li><h4>8</h4></li>
                                        <li><h4>8</h4></li>
                                        <li><h4>8</h4></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review_bottom">
                    <div class="review_bottom_text">
                        <h4>Отзыв о продавце</h4>
                    </div>
                    <div class="comment">
                        <textarea name="text" id="text" rows="6" placeholder="Расскажите, почему вам понравился или не понравилось заказывать у этого продавца: - качественно ли вас обслуживали; -посоветовали бы вы этого продавца другим."></textarea>
                        <h5><span>Осталось 2000 символа(ов)</span></h5>
                    </div>
                    <div class="review_bottom_text">
                        <h4 class="author">Отзывы публикаются без фамилии автора</h4>
                    </div>
                    <div class="btn_click">
                        <button class="btn-pink-rounded">Добавить отзыв</button>
                        <h5><a href="#">Правила публикации отзыва</a></h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection