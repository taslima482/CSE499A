<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Scopes\TenantScope;

class Account extends Model
{

    use HasFactory;

    const payees = array('STUDENT', 'MENTOR');
    const account_types = array('BANK', 'BKASH', 'NAGAD', 'ROCKET', 'UPAY');

    
    public function accountable()
    {
        return $this->morphTo();
    }

    // public function monthly_statements()
    // {
    //     return $this->hasMany(Account::class);
    // }

    // protected static function booted()
    // {
    //     static::addGlobalScope(new TenantScope);

    //     static::creating(function ($model){
    //         if (session()->has('tenant_id')) {
    //             $model->tenant_id = session()->get('tenant_id');
    //         }
    //     });
    // }
}
