<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\OrderStatus;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_id',
        'customer_id',
        'total',
        'status',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function scopeCurrent($query): void
    {
        $query->whereIn('status', [
            OrderStatus::PENDING,
            OrderStatus::PREPARING,
        ]);
    }

    public function scopePast($query): void
    {
        $query->whereIn('status', [
            OrderStatus::READY,
            OrderStatus::CANCELLED,
        ]);
    }
}
