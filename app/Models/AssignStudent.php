<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssignStudent extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the student that owns the AssignStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    /**
     * Get the student that owns the AssignStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class(): BelongsTo
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    /**
     * Get the student that owns the AssignStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function year(): BelongsTo
    {
        return $this->belongsTo(StudentYear::class, 'year_id', 'id');
    }

    /**
     * Get the student that owns the AssignStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(StudentGroup::class, 'group_id', 'id');
    }

    /**
     * Get the student that owns the AssignStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shift(): BelongsTo
    {
        return $this->belongsTo(StudentShift::class, 'shift_id', 'id');
    }



    /**
     * Get the user that owns the DiscountStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function discount(): BelongsTo
    {
        return $this->belongsTo(DiscountStudent::class, 'id', 'assign_student_id');
    }

    /**
     * Get the user that owns the DiscountStudent
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feecategory(): BelongsTo
    {
        return $this->belongsTo(DiscountStudent::class, 'id', 'assign_student_id');
    }
}
