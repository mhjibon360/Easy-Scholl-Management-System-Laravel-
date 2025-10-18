<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeeAmount extends Model
{
    protected $guarded = ['id'];


    /**
     * get fee category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feecategories(): BelongsTo
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }

    /**
     * get fee category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentclass(): BelongsTo
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }
}
