<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function issue()
    {
        return $this->belongsTo(Issue::class);
    }
}
