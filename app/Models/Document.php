<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    // use HasFactory;
    public function documentable()
    {
        return $this->morphTo();
    }

    

    // protected static function booted()
    // {
    //     static::addGlobalScope(new TenantScope);

    //     static::creating(function ($model) {
    //         if (session()->has('tenant_id')) {
    //             $model->tenant_id = session()->get('tenant_id');
    //         }
    //     });
    // }
}
