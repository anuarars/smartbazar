@extends('layouts.default')

@section('content')
<div class="site__body">
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html">Главная</a>
                            <svg class="breadcrumb-arrow" width="6px" height="9px">
                                <use xlink:href="{{asset('template/images/sprite.svg#arrow-rounded-right-6x9')}}"></use>
                            </svg>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Одежда</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="container">
            <div class="product product--layout--standard" data-layout="standard">
                <div class="product__content">
                    <!-- .product__gallery -->
                    
                    <!-- .product__gallery / end -->
                    <!-- .product__info -->
                    <div class="product__info">
                        <div class="product__wishlist-compare">
                            <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                                <svg width="16px" height="16px">
                                    <use xlink:href="{{asset('template/images/sprite.svg#wishlist-16')}}"></use>
                                </svg>
                            </button>
                        </div>
                        <h1 class="product__name">Бутик 27</h1>
                        <div class="product__rating">
                            <div class="product__rating-stars">
                                <div class="rating">
                                    <div class="rating__body">
                                        <star-component></star-component>
                                    </div>
                                </div>
                            </div>
                            <div class="product__rating-legend">
                                <a href="">Отзывы: 3</a><span>/</span><a href="#tab-reviews">Оставить отзыв</a>
                            </div>
                        </div>
                        <div class="product__description" style="margin-top: 20px;">
                            Бутик находится в центре рынка Алем. В бутике продаются одежды для всех возрастных групп.
							Товары в основном казахстанских производителей, но так же в аасортименте имееются товары с Турции и Китая.
                        </div>
                        
                        <ul class="product__meta">
                            <li class="product__meta-availability">Рейтинг <span class="text-success">ААА</span></li>
                            <!--<li>Производитель: <a href="">{{$product->brand->title ?? ""}}</a></li>-->
                        </ul>
                    </div>
                    <!-- .product__info / end -->
                    <!-- .product__sidebar -->
					<!--
                    <div class="product__sidebar">
                        <div class="product__availability">
                            В наличии: <span class="text-success">Да</span>
                        </div>
                        <div class="product__prices">
                            1000 тг.
                        </div>
					-->
                        <!-- .product__options -->
						<!--
                        <form class="product__options">
                            <div class="form-group product__option">
                                <label class="product__option-label" for="product-quantity">Кол-во</label>
                                <div class="product__actions">
                                    <div class="product__actions-item">
                                        <div class="input-number product__quantity">
                                            <input id="product-quantity" class="input-number__input form-control form-control-lg" type="number" min="1" value="1">
                                            <div class="input-number__add"></div>
                                            <div class="input-number__sub"></div>
                                        </div>
                                    </div>
                                    <div class="product__actions-item product__actions-item--addtocart">
                                        <button class="btn btn-primary btn-lg">В корзину</button>
                                    </div>
                                    <div class="product__actions-item product__actions-item--wishlist">
                                        <button type="button" class="btn btn-secondary btn-svg-icon btn-lg" data-toggle="tooltip" title="Wishlist">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="{{asset('template/images/sprite.svg#wishlist-16')}}"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
							
                    </div>
					-->
					<!-- .product__options / end -->
                    <!-- .product__end -->
					<!--
                    <div class="product__footer">
						What are you doing man?
                    </div>
					-->
                </div>
            </div>
            <div class="product-tabs  product-tabs--sticky">
                <div class="product-tabs__list">
                    <div class="product-tabs__list-body">
                        <div class="product-tabs__list-container container">
                            <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Описание</a>
                            <a href="#tab-reviews" class="product-tabs__item">Отзывы</a>
							<a href="#tab-specification" class="product-tabs__item">График работы</a>
                        </div>
                    </div>
                </div>
                <div class="product-tabs__content">
                    <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                        <div class="typography">
                            <h3>Описание товара</h3>
                            <p>
                                Бутик находится в центре рынка Алем. В бутике продаются одежды для всех возрастных групп.
								Товары в основном казахстанских производителей, но так же в аасортименте имееются товары с Турции и Китая.
                            </p>
                        </div>
                    </div>
                    <div class="product-tabs__pane" id="tab-specification">
                        <div class="spec">
                            <h3 class="spec__header">График работы</h3>
                            <div class="reviews-list">
								<ol class="reviews-list__content" style="display: flex; flex-direction: row; ">
									<div class="reviews-list__content_info">
										<p>Понедельник: </p>
										<p>Вторник: </p>
										<p>Среда: </p>
										<p>Четверг: </p>
										<p>Пятница: </p>
										<p>Суббота: </p>
										<p>Воскресенье: </p>
									</div>  
									<div class="reviews-list__content_info" style="margin-left: 10%;">
										<p>09:00-18:00</p>
										<p>09:00-18:00</p>
										<p>09:00-18:00</p>
										<p>09:00-18:00</p>
										<p>09:00-18:00</p>
										<p>09:00-18:00</p>
										<p>09:00-18:00</p>
										
									</div>                                   
									
								</ol>
								

								
                                {{-- <h4 class="spec__section-title">General</h4>
                                <div class="spec__row">
                                    <div class="spec__name">Material</div>
                                    <div class="spec__value">Aluminium, Plastic</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Engine Type</div>
                                    <div class="spec__value">Brushless</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Battery Voltage</div>
                                    <div class="spec__value">18 V</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Battery Type</div>
                                    <div class="spec__value">Li-lon</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Number of Speeds</div>
                                    <div class="spec__value">2</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Charge Time</div>
                                    <div class="spec__value">1.08 h</div>
                                </div>
                                <div class="spec__row">
                                    <div class="spec__name">Weight</div>
                                    <div class="spec__value">1.5 kg</div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs__pane" id="tab-reviews">
                        <div class="reviews-view">
                            <div class="reviews-view__list">
                                <h3 class="reviews-view__header">Информация о продавце</h3>
                                <div class="reviews-list">
                                    <ol class="reviews-list__content" style="display: flex; flex-direction: row; ">
                                        <div class="reviews-list__content_info">
                                            <p>Имя: </p>
                                            <p>Бутик: </p>
                                            <p>Категория: </p>
                                            <p>На рынке: </p>
                                            <p>Продаваемые товары: </p>
                                            <p>Номер телефона: </p>
                                        </div>  
                                        <div class="reviews-list__content_info" style="margin-left: 10%;">
                                            <p>Сакен Габит</p>
                                            <p>27</p>
                                            <p>AAA</p>
                                            <p>5 лет</p>
                                            <p>хозяйственные товары</p>
                                            <p>8 (701) 962-36-74</p>
                                        </div>                                   
                                        
                                    </ol>
                                    <div class="reviews-list__pagination">
            
                                        <button class="btn btn-primary btn-lg">Написать продавцу</button>
                                        
                                    </div>	
                                </div>
                            </div>
                            @guest
                                <div class="row mt-5">
                                    <div class="col-md-12 text-center">
                                        <a href="#" class="reviews-view__header text-success">Войти, чтобы оставить отзыв</a>
                                    </div>
                                </div>
                            @else
                                <h3 class="reviews-view__header">Оставить отзыв</h3>
                                <div class="row">
                                    <rate-component
                                        :home_url = "homeUrl"
                                        :product = "{{$product}}"
                                    ></rate-component>
                                </div>
                            @endguest                       
                        </div>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection