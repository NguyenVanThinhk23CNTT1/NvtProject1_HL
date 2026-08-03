<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvtCustomer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'CustomerId';
    public $timestamps = false;

    protected $fillable = [
        'FullName',
        'Username',
        'Email',
        'Password',
        'Phone',
        'Address',
        'Role',
    ];

    /**
     * Quan hệ: Một khách hàng có nhiều đơn hàng
     */
    public function orders()
    {
        return $this->hasMany(NvtOrder::class, 'CustomerId', 'CustomerId');
    }
}
