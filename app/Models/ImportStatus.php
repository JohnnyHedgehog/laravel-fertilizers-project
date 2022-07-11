<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportStatus extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $table = "import_statuses";
    protected $guarded = false;
}
