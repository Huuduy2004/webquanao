<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        "name","password","status"
    ] ;
    public function comment(){
        $this->hasMany(Comment::class,"id");
    }
}
