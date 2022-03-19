<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;

class Mentor extends Model
{

    protected $fillable = [
        'user_id',
        'tenant_id',
        'address',
        'profession',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentor_accounts()
    {
        return $this->morphMany(Account::class, 'accountable');
    }

    public function mentor_active_account()
    {
        return $this->morphOne(Account::class, 'accountable')->where('account_status','ACTIVE');

    }
    
    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);

        static::creating(function ($model){
            if (session()->has('tenant_id')) {
                $model->tenant_id = session()->get('tenant_id');
            }
        });
    }
}
