<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DiscountStudent extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the user that owns the DiscountStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assignstudent(): BelongsTo
    {
        return $this->belongsTo(AssignStudent::class, 'assign_student_id', 'id');
    }

    /**
     * Get the user that owns the DiscountStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feecategory(): BelongsTo
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }
}
