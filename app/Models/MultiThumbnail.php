<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiThumbnail extends Model
{
    use HasFactory;

    protected $table = 'multi_thumbnails';

    protected $guarded = [];


    public function portofolio()
    {
        return $this->belongsTo(Portfolio::class, 'portofolio_id', 'id');
    }
}
