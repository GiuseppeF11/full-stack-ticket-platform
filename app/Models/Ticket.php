<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        "operator_id",
        "date",
        "status",
        "title",
        "description",
    ];


    public function operator(): BelongsTo{
        return $this->belongsTo(Operator::class);

    }
}
