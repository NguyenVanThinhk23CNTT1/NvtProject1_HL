<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvtOrder extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'OrderId';
    public $timestamps = false;

    protected $fillable = [
        'CustomerId',
        'OrderDate',
        'TotalAmount',
        'OrderStatus',
    ];

    /**
     * Quan hệ: Đơn hàng thuộc về 1 khách hàng
     */
    public function customer()
    {
        return $this->belongsTo(NvtCustomer::class, 'CustomerId', 'CustomerId');
    }
}
