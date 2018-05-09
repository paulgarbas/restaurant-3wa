<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Main;

class Dish extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'description', 'image', 'price', 'main_id'];

    public function menu() {
        return $this->belongsTo(Main::class, 'main_id');
    }

}
