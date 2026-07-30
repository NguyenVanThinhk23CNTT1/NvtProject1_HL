<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvtCategory extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'CategoryId';
    public $timestamps = false;

    protected $fillable = ['CategoryName', 'Description'];

    public function products()
    {
        return $this->hasMany(NvtProduct::class, 'CategoryId', 'CategoryId');
    }
}
