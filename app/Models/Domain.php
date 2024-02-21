<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Stancl\Tenancy\Database\Models\Domain as ModelsDomain;
use Illuminate\Support\Str;
class Domain extends ModelsDomain
{
    use HasFactory;

    protected $guarded = [];

    public static function booted()
    {
        static::creating(function ($domain) {
            $domain->domain =  Str::slug($domain->domain) . '.' . config('tenancy.central_domains')[1];
        });
    }
}
