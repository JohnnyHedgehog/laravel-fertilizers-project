<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model {
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table = "clients";
    protected $guarded = false;

    // Возвращаем дату подписания в формате Carbon для удобства вывода
    public function dateOfSigned() {
        return Carbon::parse($this->date_of_signed)->locale('ru_RU');
    }

    // Возвращаем сумму договора в красивом формате
    public function purchaseFormatted() {
        return number_format($this->purchase, 2, ',', ' ');
    }
}
