<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NvtProduct extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'ProductId';
    public $timestamps = false;

    protected $fillable = [
        'ProductName',
        'CategoryId',
        'Price',
        'StockQuantity',
        'Description',
        'Image',
    ];

    /**
     * Quan hệ: Sản phẩm thuộc về 1 danh mục
     */
    public function category()
    {
        return $this->belongsTo(NvtCategory::class, 'CategoryId', 'CategoryId');
    }

    /**
     * Accessor: Lấy tên danh mục (dùng trong blade $product->CategoryName)
     */
    public function getCategoryNameAttribute()
    {
        return $this->category ? $this->category->CategoryName : 'Chưa phân loại';
    }

    /**
     * Accessor: Tương thích với blade dùng $product->Stock
     */
    public function getStockAttribute()
    {
        return $this->StockQuantity;
    }
}
