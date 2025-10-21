<?php

namespace App\Models;

use App\Models\User;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\AssignSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentMark extends Model
{
    protected $guarded = ['id'];

    /**
     * Get the user that owns the StudentMark
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
     * Get the examtype that owns the
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function examtype(): BelongsTo
    {
        return $this->belongsTo(ExamType::class, 'exam_type_id', 'id');
    }

    /**
     * Get the examtype that owns the
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function assignsubject(): BelongsTo
    {
        return $this->belongsTo(AssignSubject::class, 'assign_subject_id', 'id');
    }
}
