<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

class Company extends Model
{
    use LaravelVueDatatableTrait;

    protected $dataTableColumns = [
        'id' => [],
        'name' => [
            'searchable' => true,
        ],
        'phone' => [
            'searchable' => true,
        ],
        'code' => [],
        'bin' => [],

    ];

    protected $dataTableRelationships = [
        'belongsTo' => [
            'city' => [
                'model' => City::class,
                'foreign_key' => 'city_id',
                'columns' => [
                    'name' => [
                        'searchable' => true
                    ]
                ]
            ]
        ]
    ];

    protected $appends = [
        'email_name',
    ];
    protected $fillable = [
        'name', 'code', 'phone', 'email', 'description', 'bin', 'image', 'city_id'
    ];

    public function getEmailNameAttribute()
    {
        return optional($this->email)->name;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('discount', 'price', 'count', 'isPublished', 'views')->withTimestamps();
    }

    public function worktimes()
    {
        return $this->hasMany(WorkTime::class);
    }

    public function address()
    {
        return $this->morphOne('App\Models\Address', 'addressable');
    }

    public function email()
    {
        return $this->morphOne('App\Models\Email', 'emailable');
    }

    public function mall()
    {
        return $this->belongsTo(Mall::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', true);
        });
    }
}
