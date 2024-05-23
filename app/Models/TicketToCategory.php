<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TicketToCategory extends Model
{
    public $table = 'ticket_to_category';
    use HasFactory;
    protected $fillable = [
        'ticket_id',
        'category_id',
    ];


    public function ticket(){
        return $this->belongsTo(Ticket::class , 'ticket_id');
    }

    public function category(){
        return $this->belongsTo(Category::class ,'category_id');
    }
}
