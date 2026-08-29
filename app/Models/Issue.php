<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    public function stories() {
        return $this->hasMany(Story::class);
    }

    public function syncStories(array $updatedStories) {

        $this->stories()
            ->whereNotIn('id', $updatedStories)
            ->update(['issue_id' => 1]);

        Story::whereIn('id', $updatedStories)
            ->update(['issue_id' => $this->id]);
    }
}
