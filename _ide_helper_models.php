<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $student_id user_id=student_id
 * @property int|null $roll
 * @property int|null $class_id
 * @property int|null $year_id
 * @property int|null $group_id
 * @property int|null $shift_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\StudentClass|null $class
 * @property-read \App\Models\DiscountStudent|null $discount
 * @property-read \App\Models\DiscountStudent|null $feecategory
 * @property-read \App\Models\StudentGroup|null $group
 * @property-read \App\Models\StudentShift|null $shift
 * @property-read \App\Models\User|null $student
 * @property-read \App\Models\StudentMark|null $studentmark
 * @property-read \App\Models\StudentYear|null $year
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent whereRoll($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignStudent whereYearId($value)
 */
	class AssignStudent extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $class_id
 * @property int $subject_id
 * @property float $full_mark
 * @property float $pass_mark
 * @property float $get_mark
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\StudentClass|null $studentclass
 * @property-read \App\Models\StudentSubject|null $studentsubject
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject whereFullMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject whereGetMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject wherePassMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AssignSubject whereUpdatedAt($value)
 */
	class AssignSubject extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Designation whereUpdatedAt($value)
 */
	class Designation extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $assign_student_id
 * @property int|null $fee_category_id
 * @property float|null $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AssignStudent|null $assignstudent
 * @property-read \App\Models\FeeCategory|null $feecategory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DiscountStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DiscountStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DiscountStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DiscountStudent whereAssignStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DiscountStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DiscountStudent whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DiscountStudent whereFeeCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DiscountStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DiscountStudent whereUpdatedAt($value)
 */
	class DiscountStudent extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamType query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ExamType whereUpdatedAt($value)
 */
	class ExamType extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $fee_category_id
 * @property int $class_id
 * @property float $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\FeeCategory|null $feecategories
 * @property-read \App\Models\StudentClass|null $studentclass
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeAmount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeAmount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeAmount query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeAmount whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeAmount whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeAmount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeAmount whereFeeCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeAmount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeAmount whereUpdatedAt($value)
 */
	class FeeAmount extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FeeCategory whereUpdatedAt($value)
 */
	class FeeCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentClass newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentClass newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentClass query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentClass whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentClass whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentClass whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentClass whereUpdatedAt($value)
 */
	class StudentClass extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $grade_name
 * @property string $grade_point
 * @property string $start_marks
 * @property string $end_marks
 * @property string $start_point
 * @property string $end_point
 * @property string $remarks
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereEndMarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereEndPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereGradeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereGradePoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereStartMarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereStartPoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGrade whereUpdatedAt($value)
 */
	class StudentGrade extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentGroup whereUpdatedAt($value)
 */
	class StudentGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $student_id
 * @property string $id_no
 * @property string $year_id
 * @property string $class_id
 * @property string $assign_subject_id
 * @property string $exam_type_id
 * @property string $mark
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AssignSubject|null $assignsubject
 * @property-read \App\Models\StudentClass|null $class
 * @property-read \App\Models\ExamType|null $examtype
 * @property-read \App\Models\User|null $student
 * @property-read \App\Models\StudentYear|null $year
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereAssignSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereClassId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereExamTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereIdNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereMark($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentMark whereYearId($value)
 */
	class StudentMark extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentShift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentShift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentShift query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentShift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentShift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentShift whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentShift whereUpdatedAt($value)
 */
	class StudentShift extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentSubject newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentSubject newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentSubject query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentSubject whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentSubject whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentSubject whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentSubject whereUpdatedAt($value)
 */
	class StudentSubject extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentYear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentYear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentYear query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentYear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentYear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentYear whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StudentYear whereUpdatedAt($value)
 */
	class StudentYear extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $usertype Student,Employee,Admin
 * @property string $name
 * @property string $email
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $mobile
 * @property string|null $address
 * @property string|null $gender
 * @property string|null $fname
 * @property string|null $mname
 * @property string|null $religion
 * @property string|null $id_no
 * @property string|null $dob
 * @property string|null $code
 * @property string|null $join_date
 * @property int|null $designation_id
 * @property float|null $salary
 * @property string|null $role admin=head of sotware,operator=computer operator,user=employee
 * @property int $status 0=inactive,1=active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\AssignStudent|null $assignstudent
 * @property-read \App\Models\StudentMark|null $marks
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDesignationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereFname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIdNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereJoinDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereReligion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsertype($value)
 */
	class User extends \Eloquent {}
}

