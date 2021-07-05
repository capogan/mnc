<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
//class User extends Authenticatable
{
    use Notifiable;

    /**s
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','group','level','phone_number_verified','otp_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function business_lender()
    {
        return $this->hasOne(LenderBusiness::class , 'uid');
    }

    public function individuinfo()
    {
        return $this->hasOne(LenderIndividualPersonalInfo::class , 'uid')
                ->with('educations')
                ->with('marital_status')
                ->with('status_of_residences')
                ->with('provinces')
                ->with('cities')
                ->with('districts')
                ->with('villagess')
                ->with('individubank')
                ->with('individubusiness')
                ->with('individuemergency')
                ->with('individufile')
                ->with('individualjob');
    }

    public function digisignInfo(){
        return $this->hasOne(LenderDirectorData::class , 'uid' ,'id')->where('position' ,'0')
        ->with('provinces')
        ->with('cities')
        ->with('districts')
        ->with('villagess');

    }

    public function digisignInfocommisioner(){
        return $this->hasOne(LenderCommissionerData::class , 'uid' ,'id')->where('sequence' ,'0')
        ->with('provinces')
        ->with('cities')
        ->with('districts')
        ->with('villagess');

    }

    public function lenderbusiness(){
        return $this->hasOne(LenderDirectorData::class , 'uid' ,'id')->where('position' ,'0')
        ->with('provinces')
        ->with('cities')
        ->with('districts')
        ->with('villagess');
    }

    public function business(){
        return $this->hasOne(LenderDirectorData::class , 'uid' ,'id')->where('position' ,'0')
        ->with('provinces')
        ->with('cities')
        ->with('districts')
        ->with('villagess');
    }

    public function commissioners(){
        return $this->hasMany(LenderCommissionerData::class , 'uid' ,'id')
        ->with('provinces')
        ->with('cities')
        ->with('districts')
        ->with('villagess');
    }

    public function directors(){
        return $this->hasMany(LenderDirectorData::class , 'uid' ,'id')
        ->with('provinces')
        ->with('cities')
        ->with('districts')
        ->with('villagess');
    }

    public function document(){
        return $this->hasOne(LenderAttachmentData::class , 'uid' ,'id');
    }

    public function digisigndata(){
        return $this->hasOne(DigisignActivation::class , 'uid' ,'id');
    }

    public function borrower_file(){
        return $this->hasOne(UsersFile::class , 'uid' ,'id');
    }
    public function borrower_personal_info(){
        return $this->hasOne(PersonalInfo::class , 'uid' ,'id')
        ->with('provinces')
        ->with('cities')
        ->with('districts')
        ->with('villagess');
    }



}
