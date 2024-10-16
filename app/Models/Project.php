<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'image',
        'slug',
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
    
    public $timestamps = true;
}
