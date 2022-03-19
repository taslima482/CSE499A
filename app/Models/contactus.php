<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;





class contactus extends Model

{

    use HasFactory;


    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'name',
        'email',
        'phone',
        'message',
    ];



    /**

     * The attributes that should be hidden for arrays.

     *

     * @var array

     */

    



    /**

     * The attributes that should be cast to native types.

     *

     * @var array

     */

    

    

}
