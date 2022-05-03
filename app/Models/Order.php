<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    const STATUS_WAIT_CONFIRM = 0; // Chờ xác nhận
    const STATUS_DELIVERY = 1; // Chờ lấy hàng
    const STATUS_DELIVERING = 2; // Đang giao
    const STATUS_DELIVERED = 3; // Đã giao
    const STATUS_CANCELLED = 4; // Đã hủy

    public static $status = [
        self::STATUS_WAIT_CONFIRM => 'Chờ xác nhận',
        self::STATUS_DELIVERY => 'Chờ lấy hàng',
        self::STATUS_DELIVERING => 'Đang giao',
        self::STATUS_DELIVERED => 'Đã giao',
        self::STATUS_CANCELLED => 'Đã hủy'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'payment_id',
        'order_code',
        'name',
        'phone',
        'email',
        'address',
        'note',
        'status',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relationship belongsTo with User
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship belongsTo with Payment
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails() {
        return $this->hasMany(OrderDetail::class);
    }
}
