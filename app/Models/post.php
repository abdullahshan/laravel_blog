<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory, HasTags;


    public function user(){

        return  $this->belongsTo(user::class);
    }

    public function category(){

        return $this->belongsTo(category::class);
    }


    public function subcategory(){

        return $this->belongsTo(subcategory::class);
    }
}
