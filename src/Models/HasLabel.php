<?php

namespace Qihucms\UserLabel\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasLabel
{
    /**
     * @return BelongsToMany
     */
    public function labels(): BelongsToMany
    {
        return $this->belongsToMany('Qihucms\UserLabel\Models\Label', 'label_user', 'user_id', 'label_id');
    }
}