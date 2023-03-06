<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'youtube_channel',
        'business_email',
        'business_description',
        'language',
        'competitive_channel',
        'keyword',
        'active',
        'active_stage1',
        'active_stage2',
        'password',
        'verification_code',
        'token'
    ];

    
    
    public function setCompetitiveChannelAttribute($value)
    {
        $this->attributes['competitive_channel'] = json_encode($value);
  
    }
  
    public function getCompetitiveChannelAttribute($value)
    {
        return $this->attributes['competitive_channel'] = json_decode($value);
    }

    public function setKeywordChannelAttribute($value)
    {
        $this->attributes['keyword'] = json_encode($value);
  
    }
  
    public function getKeywordChannelAttribute($value)
    {
        return $this->attributes['keyword'] = json_decode($value);
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
