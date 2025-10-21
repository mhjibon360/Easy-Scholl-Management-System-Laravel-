<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Setup\StudentController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Setup\FeeAmountController;
use App\Http\Controllers\Student\RegisterController;
use App\Http\Controllers\Setup\DesignationController;
use App\Http\Controllers\Setup\FeeCategoryController;
use App\Http\Controllers\Setup\StudentYearController;
use App\Http\Controllers\Backend\UsermanageController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\Mark\StudentMarkController;
use App\Http\Controllers\Setup\StudentGroupController;
use App\Http\Controllers\Setup\StudentShiftController;
use App\Http\Controllers\Setup\AssignSubjectController;
use App\Http\Controllers\Setup\StudentSubjectController;
use App\Http\Controllers\Student\RollGenerateController;
use App\Http\Controllers\Setup\StudentExamtypeController;
use App\Http\Controllers\Student\GradeController;
use App\Http\Controllers\Student\IdCardController;
use App\Http\Controllers\Student\MarkSheetController;
use App\Http\Controllers\Student\RegistrationfeeController;

Route::get('/', function () {
    // return(Hash::make('111'));
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(BackendController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/profile', 'edit')->name('edit.profile');
        Route::put('/profile/update', 'update')->name('update.profile');
        Route::put('/password/change', 'changepassword')->name('change.password');
    });

    Route::controller(UsermanageController::class)->group(function () {
        Route::get('/manage/user', 'manageuser')->name('manage.user');
        Route::get('/add/user', 'adduser')->name('add.user');
        Route::post('/store/user', 'storeuser')->name('store.user');
        Route::get('/edit/user/{id}', 'edituser')->name('edit.user');
        Route::put('/update/user/{id}', 'updateuser')->name('update.user');
        Route::delete('/delete/user/{id}', 'deleteuser')->name('delete.user');
    });


    Route::prefix('setup')->as('setup.')->group(function () {

        // studnet class all routes
        Route::controller(StudentController::class)->group(function () {
            Route::get('/all/student/class/view', 'studentview')->name('student.class.view');
            Route::get('/student/class/add', 'studentadd')->name('student.class.add');
            Route::post('/student/class/store', 'studentstore')->name('student.class.store');
            Route::get('/student/class/edit/{id}', 'studentedit')->name('student.class.edit');
            Route::put('/student/class/update/{id}', 'studentupdate')->name('student.class.update');
            Route::delete('/student/class/delete/{id}', 'studentdelete')->name('student.class.delete');
        });

        // studnet  year all routes
        Route::controller(StudentYearController::class)->group(function () {
            Route::get('/all/student/year/view', 'studentyearview')->name('student.year.view');
            Route::get('/student/year/add', 'studentyearadd')->name('student.year.add');
            Route::post('/student/year/store', 'studentyearstore')->name('student.year.store');
            Route::get('/student/year/edit/{id}', 'studentyearedit')->name('student.year.edit');
            Route::put('/student/year/update/{id}', 'studentyearupdate')->name('student.year.update');
            Route::delete('/student/year/delete/{id}', 'studentyeardelete')->name('student.year.delete');
        });

        // studnet  group all routes
        Route::controller(StudentGroupController::class)->group(function () {
            Route::get('/all/student/group/view', 'studentgroupview')->name('student.group.view');
            Route::get('/student/group/add', 'studentgroupadd')->name('student.group.add');
            Route::post('/student/group/store', 'studentgroupstore')->name('student.group.store');
            Route::get('/student/group/edit/{id}', 'studentgroupedit')->name('student.group.edit');
            Route::put('/student/group/update/{id}', 'studentgroupupdate')->name('student.group.update');
            Route::delete('/student/group/delete/{id}', 'studentgroupdelete')->name('student.group.delete');
        });

        // student  shift all routes
        Route::controller(StudentShiftController::class)->group(function () {
            Route::get('/all/student/shift/view', 'studentshiftview')->name('student.shift.view');
            Route::get('/student/shift/add', 'studentshiftadd')->name('student.shift.add');
            Route::post('/student/shift/store', 'studentshiftstore')->name('student.shift.store');
            Route::get('/student/shift/edit/{id}', 'studentshiftedit')->name('student.shift.edit');
            Route::put('/student/shift/update/{id}', 'studentshiftupdate')->name('student.shift.update');
            Route::delete('/student/shift/delete/{id}', 'studentshiftdelete')->name('student.shift.delete');
        });

        // fee category all routes
        Route::controller(FeeCategoryController::class)->group(function () {
            Route::get('/all/feecategory', 'studentfeecategoryview')->name('student.feecategory.view');
            Route::get('/feecategory/add', 'studentfeecategoryadd')->name('student.feecategory.add');
            Route::post('/feecategory/store', 'studentfeecategorystore')->name('student.feecategory.store');
            Route::get('/feecategory/edit/{id}', 'studentfeecategoryedit')->name('student.feecategory.edit');
            Route::put('/feecategory/update/{id}', 'studentfeecategoryupdate')->name('student.feecategory.update');
            Route::delete('/feecategory/delete/{id}', 'studentfeecategorydelete')->name('student.feecategory.delete');
        });

        // fee amount all routes
        Route::controller(FeeAmountController::class)->group(function () {
            Route::get('/all/feeamount', 'studentfeeamountview')->name('student.feeamount.view');
            Route::get('/feeamount/add', 'studentfeeamountadd')->name('student.feeamount.add');
            Route::post('/feeamount/store', 'studentfeeamountstore')->name('student.feeamount.store');
            Route::get('/feeamount/edit/{id}', 'studentfeeamountedit')->name('student.feeamount.edit');
            Route::put('/feeamount/update/{id}', 'studentfeeamountupdate')->name('student.feeamount.update');
            Route::get('/feeamount/details/{id}', 'studentfeeamountdetails')->name('student.feeamount.details');
        });

        // studnet  examtype all routes
        Route::controller(StudentExamtypeController::class)->group(function () {
            Route::get('/all/student/examtype/view', 'studentexamtypeview')->name('student.examtype.view');
            Route::get('/student/examtype/add', 'studentexamtypeadd')->name('student.examtype.add');
            Route::post('/student/examtype/store', 'studentexamtypestore')->name('student.examtype.store');
            Route::get('/student/examtype/edit/{id}', 'studentexamtypeedit')->name('student.examtype.edit');
            Route::put('/student/examtype/update/{id}', 'studentexamtypeupdate')->name('student.examtype.update');
            Route::delete('/student/examtype/delete/{id}', 'studentexamtypedelete')->name('student.examtype.delete');
        });

        // studnet  subject all routes
        Route::controller(StudentSubjectController::class)->group(function () {
            Route::get('/all/student/subject/view', 'studentsubjectview')->name('student.subject.view');
            Route::get('/student/subject/add', 'studentsubjectadd')->name('student.subject.add');
            Route::post('/student/subject/store', 'studentsubjectstore')->name('student.subject.store');
            Route::get('/student/subject/edit/{id}', 'studentsubjectedit')->name('student.subject.edit');
            Route::put('/student/subject/update/{id}', 'studentsubjectupdate')->name('student.subject.update');
            Route::delete('/student/subject/delete/{id}', 'studentsubjectdelete')->name('student.subject.delete');
        });

        // assign subjects all routes
        Route::controller(AssignSubjectController::class)->group(function () {
            Route::get('/all/assign/subject', 'studentassignsubjectview')->name('student.assignsubject.view');
            Route::get('/assign/subject/add', 'studentassignsubjectadd')->name('student.assignsubject.add');
            Route::post('/assign/subject/store', 'studentassignsubjectstore')->name('student.assignsubject.store');
            Route::get('/assign/subject/edit/{id}', 'studentassignsubjectedit')->name('student.assignsubject.edit');
            Route::put('/assign/subject/update/{id}', 'studentassignsubjectupdate')->name('student.assignsubject.update');
            Route::get('/assign/subject/details/{id}', 'studentassignsubjectdetails')->name('student.assignsubject.details');
        });

        // studnet  designation all routes
        Route::controller(DesignationController::class)->group(function () {
            Route::get('/all/student/designation/view', 'studentdesignationview')->name('student.designation.view');
            Route::get('/student/designation/add', 'studentdesignationadd')->name('student.designation.add');
            Route::post('/student/designation/store', 'studentdesignationstore')->name('student.designation.store');
            Route::get('/student/designation/edit/{id}', 'studentdesignationedit')->name('student.designation.edit');
            Route::put('/student/designation/update/{id}', 'studentdesignationupdate')->name('student.designation.update');
            Route::delete('/student/designation/delete/{id}', 'studentdesignationdelete')->name('student.designation.delete');
        });
    });


    Route::prefix('student')->as('student.')->group(function () {
        Route::controller(RegisterController::class)->group(function () {
            Route::get('/account/list', 'studentaccountlist')->name('account.list');
            Route::get('/account/create', 'studentaccountcreate')->name('account.create');
            Route::post('/account/store', 'studentaccountstore')->name('account.store');
            Route::get('/account/edit/{id}', 'studentaccountedit')->name('account.edit');
            Route::put('/account/update/{id}', 'studentaccountupdate')->name('account.update');
            Route::delete('/account/delete/{id}', 'studentaccountdelete')->name('account.delete');
            Route::get('/account/promotion/{id}', 'studentaccountpromotion')->name('account.promotion');
            Route::put('/account/promotion/store/{id}', 'studentaccountpromotionstore')->name('account.promotion.store');
            Route::get('/account/view/{id}', 'studentaccountview')->name('account.view');
        });

        Route::controller(RollGenerateController::class)->group(function () {
            Route::get('/roll/generate', 'rollgenerate')->name('roll.generate');
            Route::get('/roll/generate/result', 'rollgenerateresult')->name('roll.generate.result');
            Route::post('/roll/generate/store', 'rollgeneratestore')->name('roll.generate.store');
        });

        Route::controller(RegistrationfeeController::class)->group(function () {
            Route::get('/registrationfe/generate', 'registrationfegenerate')->name('registrationfe.generate');
            Route::get('/registrationfe/generate/result', 'registrationfegenerateresult')->name('registrationfe.generate.result');
            Route::get('/registrationfe/generate/store/{id}', 'registrationfegeneratestore')->name('registrationfe.generate.store');
        });

        Route::controller(StudentMarkController::class)->group(function () {
            Route::get('/manage/mark', 'markshow')->name('manage.mark');
            Route::get('/find/mark', 'markfind')->name('find.mark');
            Route::get('/edit/mark', 'markedit')->name('edit.mark');
            Route::get('/edit/mark/find', 'markeditfind')->name('edit.mark.find');
            Route::post('/edit/mark/update', 'markeditupdate')->name('edit.mark.update');
            Route::post('/store/mark', 'markstore')->name('store.mark');
        });



        // studnet  year all routes
        Route::controller(GradeController::class)->group(function () {
            Route::get('/all/student/grade/view', 'studentgradeview')->name('student.grade.view');
            Route::get('/student/grade/add', 'studentgradeadd')->name('student.grade.add');
            Route::post('/student/grade/store', 'studentgradestore')->name('student.grade.store');
            Route::get('/student/grade/edit/{id}', 'studentgradeedit')->name('student.grade.edit');
            Route::put('/student/grade/update/{id}', 'studentgradeupdate')->name('student.grade.update');
            Route::delete('/student/grade/delete/{id}', 'studentgradedelete')->name('student.grade.delete');
        });

        // studnet  year all routes
        Route::controller(MarkSheetController::class)->group(function () {
            Route::get('/student/marksheet/create', 'studentmarksheetcreate')->name('student.marksheet.create');
            Route::post('/student/marksheet/find', 'studentmarksheetfind')->name('student.marksheet.find');
        });

        // studnet  year all routes
        Route::controller(IdCardController::class)->group(function () {
            Route::get('/student/idcard/create', 'studentidcardcreate')->name('student.idcard.create');
            Route::post('/student/idcard/find', 'studentidcardfind')->name('student.idcard.find');
        });

        Route::controller(DefaultController::class)->group(function () {
            Route::get('/get-subject', 'getSubject')->name('get.subject');
        });
    });
});

require __DIR__ . '/auth.php';
