<template>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Добавить товар из каталога</h4>
        </div>
        <div class="card-body p-4">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Найти товар" v-model="searchInput" v-on:keyup="searchProduct">
                            <ul class="list-group" v-if="searchShow">
                                <li class="list-group-item d-flex justify-content-between align-items-center" v-for="(product, index) in searchResult">
                                    {{product.title}}
                                    <a href="#" class="badge badge-primary badge-pill" v-on:click="selectProduct(index)">
                                        Выбрать
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12" v-if="selectedProduct">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="author-box-left">
                                        <img alt="image" :src="selectedProduct.galleries[0].image" class="w-100">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="author-box-details">
                                        <div class="author-box-name">
                                            <h3>{{selectedProduct.title}}</h3>
                                        </div>
                                        <div class="author-box-job"><b>Категория:</b> {{selectedProduct.category.title}}</div>
                                        <div class="author-box-description">
                                            <p v-html="selectedProduct.description"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Статус</label>
                            <select v-model="create.isPublished" class="form-control">
                                <option v-for="option in options" v-bind:value="option.value">
                                    {{ option.text }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Цена</label>
                            <input type="number" class="form-control" v-model="create.price" placeholder="Цена" v-on:keyup="priceAfterFee(create.price)">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Количество</label>
                            <input type="number" class="form-control" v-model="create.count" placeholder="Количество">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Скидка в % не обязательно</label>
                            <input type="number" class="form-control" id="discountPercent" v-model="create.discount" placeholder="Скидка в % не обязательно" v-on:keyup="priceAfterCalc()">
                            <div v-if="create.discount != 0" class="text-success font-weight-bold">Цена после скидки {{discountPrice}} тг.</div>
                            <div v-if="create.price != 0" class="text-warning font-weight-bold">Цена после комиссии {{finalPrice}} тг.</div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3 text-center">
                        <button class="btn btn-primary" v-on:click="addProduct()">Добавить товар</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    props:[
        'home_url'
    ],
    data() {
        return {
            searchInput: '',
            searchResult: '',
            searchShow: false,
            selectedProduct: '',
            discountPrice: '',
            finalPrice: '',
            create:{
                price: '',
                isPublished: '1',
                discount: 0,
                count: '',
            },
            options: [
                { text: 'Опубликован', value: '1' },
                { text: 'Не опубликован', value: '0' },
            ],
        }
    },
    methods:{
        searchProduct(){
            this.searchResult = '';
            this.searchShow = true;
            axios.post(this.home_url + 'search/product', {
                searchInput: this.searchInput,
            }).then(response => {
                this.searchResult = response.data;
                setTimeout(() => {
                    this.searchResult = '';
                    this.searchShow = false;
                }, 20000)
            });
        },
        selectProduct: function(index) {
            this.selectedProduct = this.searchResult[index];
            this.searchShow = false;
        },
        addProduct(){
            axios.post(this.home_url + 'company/product', {
                price: this.create.price,
                isPublished: this.create.isPublished,
                discount: this.create.discount,
                count: this.create.count,
                product_id: this.selectedProduct.id
            }).then(response => {
                console.log(response.data);
                if(response.data=='Created'){
                    this.selectedProduct = '';
                    this.create.price = '',
                    this.create.discount = 0,
                    this.create.count = ''
                    this.$toaster.success('Товар успешно добавлен');
                }
                if(response.data=='Updated'){
                    this.selectedProduct = '';
                    this.create.price = '',
                    this.create.discount = 0,
                    this.create.count = ''
                    this.$toaster.warning('Товар успешно обновлен');
                }
            });
        },
        priceAfterCalc(){
            const formatter = new Intl.NumberFormat('en-US', {maximumFractionDigits: 0});
            var discountPrice = (this.create.price * this.create.discount)/100;
            var priceAfterDiscount = this.create.price - discountPrice;
            this.priceAfterFee(priceAfterDiscount);
            if(priceAfterDiscount > 0){
                this.discountPrice = formatter.format(priceAfterDiscount);
            }else{
                this.discountPrice = 0;
            }
        },
        priceAfterFee(price){
            const formatter = new Intl.NumberFormat('en-US', {maximumFractionDigits: 0});
            var feePrice = Number(price)*Number(this.$parent.fee)/100;
            this.finalPrice = Number(price) + feePrice;
            this.finalPrice = formatter.format(this.finalPrice)
        }
    },
}
</script>
