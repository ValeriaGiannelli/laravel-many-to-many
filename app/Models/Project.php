<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Project extends Model
{
    use HasFactory;
    protected $casts = [
        "start_date" => "datetime",
        "end_date" => "datetime",
    ];

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'img',
        'slug',
        'description',
        'type_id'
    ];

    // funzione per mettere in relazione Project con Type
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
