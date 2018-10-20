<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zapcontactbasicinfo extends Model
{
    //use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'contact_id','title','first_name','middle_name','last_name','email',
        'home_phone','mobile_phone','secondery_phone','ssn','drivers_license',
        'drivers_license_state','primary_email','secondery_email','contact_image',   
        'status','created_by','update_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
