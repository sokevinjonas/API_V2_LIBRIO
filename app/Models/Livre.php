<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livre extends Model
{
    /** @use HasFactory<\Database\Factories\LivreFactory> */
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'cover_image', 'url', 'category_id',
        'has_digital_version', 'langage', 'nbr_page', 'bio_author', 
        'author', 'price',
    ];

    /**
     * Get the user that owns the Livre
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
