<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    public function status(): HasOne
    {
        return $this->hasOne(Status::class, 'status_id', 'status');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'manager_id');
    }

    public function service(): HasOne
    {
        return $this->hasOne(Service::class, 'id', 'service');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function($query) use ($term){
            $query->where('client_login', 'like', $term)
                ->orWhere('model', 'like', $term)
                ->orWhere('model_full_name', 'like', $term)
                ->orWhere('code', 'like', $term)
                ->orWhere('client_phone', 'like', $term)
                ->orWhere('id', 'like', $term);
        });
    }
}
