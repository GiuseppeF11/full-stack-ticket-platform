<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function categories(): BelongsToMany{
        return $this->belongsToMany(Category::class,'ticket_to_category');
    }
}
