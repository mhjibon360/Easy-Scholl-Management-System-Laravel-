<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssignSubject extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the student class that owns the AssignSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentclass(): BelongsTo
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    /**
     * Get the student subject that owns the AssignSubject
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentsubject(): BelongsTo
    {
        return $this->belongsTo(studentsubject::class, 'subject_id', 'id');
    }
}
