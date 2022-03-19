<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Builder;


class MonthlyStatement extends Model
{

    // protected $primaryKey = 'id';
    // public $incrementing = false;


    const payment_status = array('PENDING', 'PAID');

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    protected static function booted()
    {
        static::creating(function ($model){
            $id = MonthlyStatement::max('id');
            if (!$id){
                $id = 1;
            }
            $model->id = $id+1;
        });
    }

    
}
