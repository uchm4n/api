<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Task extends Model
{
    use HasTranslations;

    protected  $guarded = ['id'];
    public $translatable = ['title'];

    public function user()
    {
        return $this->belongsTo('\App\User');
    }

}
