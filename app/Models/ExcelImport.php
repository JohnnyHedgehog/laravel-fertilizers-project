<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Expr\FuncCall;

class ExcelImport extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = "excel_imports";
    protected $guarded = false;

    public function status() {
        return $this->belongsTo(ImportStatus::class, 'status_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Возвращаем дату создания в формате Carbon для удобства вывода
    public function createdAt() {
        return Carbon::parse($this->created_at);;
    }
}
