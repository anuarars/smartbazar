<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;
use Kyslik\ColumnSortable\Sortable;

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


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // ACCESSOR
    public function getAfterDiscountAttribute()
    {
        return ceil($this->priceAfterFee() - (($this->priceAfterFee() * $this->discount) / 100));
    }

    // Цена после коммисии от смартабазара
    public function priceAfterFee()
    {
        return $this->price + (($this->price * env('FEE')) / 100);
    }

    // Цена за товар со скидкой
    public function priceForCount()
    {
        if (!is_null($this->pivot)) {
            if (!empty($this->discount)) {
                return $this->pivot->count * $this->getafterDiscountAttribute();
            }
            return ceil($this->pivot->count * $this->priceAfterFee());
        }
        return ceil($this->priceAfterFee());
    }

    // Цена за товар без скидки
    public function priceForCountNoDiscount()
    {
        if (!is_null($this->pivot)) {
            return ceil($this->pivot->count * $this->priceAfterFee());
        }
        return ceil($this->priceAfterFee());
    }


    // Добавлен ли товар в избранное
    public function isFavoritedBy(): bool
    {

        return Auth::check() ? $this
            ->wishlist()
            ->where('user_id', Auth::id())
            ->get()->isNotEmpty() : false;
    }

    // Добавлен ли товар в корзину
    public function isAddedToCartBy(): bool
    {
        return Auth::check() ? $this
            ->orders()
            ->where('status_id', 1)
            ->where('user_id', Auth::id())
            ->get()->isNotEmpty() : false;
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
                ->whereHas('company', function ($query) use ($city) {
                    $query->where('city_id', $city->id);
                });
        });
    }
}
