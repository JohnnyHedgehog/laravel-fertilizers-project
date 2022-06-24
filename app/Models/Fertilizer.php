<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fertilizer extends Model {
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table = "fertilizers";
    protected $guarded = false;

    // Связываем модель удобрений с группой культур
    public function culture() {
        return $this->belongsTo(Culture::class, 'culture_id', 'id');
    }
}
