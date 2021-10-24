<?php

namespace Modules\User\Src\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_family',
        'email',
        'phone_number',
        'std_number',
        'password',
        'others'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'phone_number_verified_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function schema()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name_family');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('phone_number',false,true)->unique();
            $table->timestamp('phone_number_verified_at')->nullable();
            $table->integer("std_number")->unique()->unsigned();
            $table->string('password');
            $table->json("others")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
