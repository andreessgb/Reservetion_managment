<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Game extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'steam_appid',
        'name',
        'price',
        'steam_price',
        'developers',
        'release_date',
        'type',
        'stock',
        'header_img',
        'trailer'
    ];

    public function categories(){
        return $this->belongsToMany(Category::class, "games_categories");
    }

    public function platforms(){
        return $this->belongsToMany(Platform::class, "games_platforms");
    }
}
