<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use Sortable, LaravelVueDatatableTrait;

    protected $dataTableColumns = [
        'id' => [
            'searchable' => true
        ],
        'count' => [],
        'price' => [
            'orderable' => true
        ],
        'discount' => []
    ];

    protected $dataTableRelationships = [
        "belongsTo" => [
            "product" => [
                'model' => Product::class,
                "foreign_key" => "product_id",
                'columns' => [
                    'title' => [
                        'searchable' => true,
                        'orderable' => true,
                    ],

                ],
            ],

        ]
    ];

    protected $table = 'company_product';
    protected $fillable = ['views'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    // Цена после коммисии от смартабазара
    public function priceAfterFee(){
        return $this->price+(($this->price*env('FEE'))/100);
    }

    // ACCESSOR
    public function getafterDiscountAttribute(){
        return ceil($this->priceAfterFee() - (($this->priceAfterFee() * $this->discount)/100));
    }

    // Добавлен ли товар в избранное
    public function isFavoritedBy(){
        if ($user = User::find(Auth::id())) {
            return (bool) $user->wishlist()->where('item_id', $this->id)->first();
        }
    }

    // Добавлен ли товар в корзину
    public function isAddedToCartBy(): bool
    {
        if ($user = User::find(Auth::id())) {
            $order = $user->order()->where('status_id', 1)->get()->first();
        } else {
            return false;
        }
        if ($order == null) {
            return false;
        } else if ($order->items->contains($this->id)) {
            return true;
        } else {
            return false;
        }
    }

    // Цена за товар со скидкой
    public function priceForCount(){
        if(!is_null($this->pivot)){
            if(!empty($this->discount)){
                return $this->pivot->count * $this->getafterDiscountAttribute();
            }
            return ceil($this->pivot->count * $this->priceAfterFee());
        }
        return ceil($this->priceAfterFee());
    }

    // Цена за товар без скидки
    public function priceForCountNoDiscount(){
        if(!is_null($this->pivot)){
            return ceil($this->pivot->count * $this->priceAfterFee());
        }
        return ceil($this->priceAfterFee());
    }

    public function isReviewedByAuthUser(): bool
    {
        return $this->reviews()->where('user_id', Auth::id())->get()->isNotEmpty();
    }

    protected static function booted()
    {
        $city = session('city');
        static::addGlobalScope('city', function (Builder $builder) use ($city) {
            $builder
                ->join('companies', 'company_product.company_id', '=', 'companies.id')
                ->addSelect(DB::raw('company_product.*'))
                ->where('companies.city_id', '=', $city->id);
        });
    }
}
