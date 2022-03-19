<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // use HasFactory;

    public function address()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function present_address()
    {
        return $this->morphOne(Address::class, 'addressable')->where('address_type', 'PRESENT');
    }

    public function permanent_address()
    {
        return $this->morphOne(Address::class, 'addressable')->where('address_type', 'PERMANENT');
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    public function student_documents()
    {
        return  $this->documents();
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class);
    }

    public function degree_information()
    {
        return $this->hasOne(Degree::class);
    }

    public function scholarships()
    {
        return $this->belongsToMany(Scholarship::class, 'scholarship_student')->withoutGlobalScopes()->withPivot('is_approve');
    }

    public function student_accounts()
    {
        return $this->morphMany(Account::class, 'accountable');
    }

    public function student_active_account()
    {
        return $this->morphMany(Account::class, 'accountable')->where('account_status','ACTIVE');

    }

    public function monthly_statements()
    {
        return $this->hasMany(MonthlyStatement::class);
    }


    //    protected static function booted()
    //    {
    //        static::addGlobalScope(new TenantScope);
    //
    //        static::creating(function ($model){
    //            if (session()->has('tenant_id')) {
    //                $model->tenant_id = session()->get('tenant_id');
    //            }
    //        });
    //    }
}
