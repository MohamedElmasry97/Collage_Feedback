<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    // Start Admin Routes
    Route::get('login', 'MainController@adminLogin')->name('admin.form');
    Route::post('login', 'MainController@authenticate')->name('admin.login');

    Route::group(['middleware' => 'admin'], function () {
        Route::get('index', 'MainController@index')->name('admin.index');
        Route::post('logout', 'MainController@logout')->name('admin.logout');

        // End admin Routes
        //  Start Student Routes
        Route::resource('student', 'StudentController');
        Route::get('students/listStudents', 'StudentController@allStudent')->name('all.student');
        Route::get('students/excel', 'StudentController@uploadExcel')->name('student.excel');
        Route::post('students/excel', 'StudentController@StudentExcel')->name('student.store.excel');
        Route::post('students/{studentId}/course', 'StudentController@addCourse')->name('addCourse');
        Route::post('students/{id}/remove-course', 'StudentController@detachCourse')->name('detachCourse');
        // End Student Routes
        //  Start instructor routes
        Route::resource('instructor', 'InstructorController');
        Route::get('instructors/listInstructors', 'InstructorController@allInstructor')->name('all.instructor');
        Route::get('instructors/excel', 'InstructorController@uploadExcel')->name('instructor.excel');
        Route::post('instructors/excel', 'InstructorController@InstructorExcel')->name('instructor.store.excel');
        Route::post('instructors/{instructorId}/course/{courseId}', 'InstructorController@addCourse')->name('instructor.addCourse');
        Route::post('instructors/{id}/remove-course', 'InstructorController@detachCourse')->name('instructor.detachCourse');
        //  End instructor routes
        //  Start course routes
        Route::resource('course', 'CourseController');
        Route::get('courses/listCourses', 'CourseController@allCourse')->name('all.course');
        Route::get('courses/excel', 'CourseController@uploadExcel')->name('course.excel');
        Route::post('courses/excel', 'CourseController@CourseExcel')->name('course.store.excel');
        //  End course routes

        //  Start feedback routes
        Route::resource('feedback', 'FeedbackController');
        Route::get('feedbacks/all_feedback', 'FeedbackController@allFeedbacks')->name('feedback.all');
        Route::get('feedbacks/excel', 'FeedbackController@uploadExcel')->name('feedback.excel');
        Route::post('feedbacks/excel', 'FeedbackController@FeedbackExcel')->name('feedback.store.excel');
        //  End feedback routes
        //  Start statistics routes
        Route::resource('statistic', 'StatisticsController');
        Route::get('statistics/allStatistics', 'StatisticsController@allCourses')->name('statistics.all');
        Route::get('statistics/{id}/missfeedback', 'StatisticsController@missFeedback')->name('statistics.missFeedback');
        //  End statistics routes
        //  Start  Chart routes
        Route::get('chart-line', 'ChartController@chartLine')->name('chartLine');
        // End Chart routes
    });
});

Route::group(['prefix' => 'student', 'namespace' => 'Student'], function () {
    Route::get('login', 'AuthController@index')->name('student.form');
    Route::post('login', 'AuthController@loginStudent')->name('student.login');
    Route::get('forget_password', 'AuthController@forgetPassword')->name('student.forget_password');
    Route::get('reset_password', 'AuthController@resetPassword')->name('student.reset_password');
    Route::post('update_password', 'AuthController@updateStudentPassword')->name('student.update_password');

    Route::group(['middleware' => 'student'], function () {
        Route::get('list_courses', 'MainController@listCourses');
        Route::get('{studentId}/feedback_form/{courseId}', 'MainController@feedbackForm');
        Route::post('{studentId}/feedback_form/{courseId}', 'MainController@submitFeedbackForm');
        Route::get(' {id}/feedback_form', 'MainController@feedbackForm');
        Route::post('logout', 'AuthController@logout')->name('student.logout');
    });
});

Route::group(['prefix' => 'instructor', 'namespace' => 'Instructor'], function () {
    Route::get('login', 'AuthController@index')->name('instructor.form');
    Route::post('login', 'AuthController@loginInstructor')->name('instructor.login');
    Route::get('forget_password', 'AuthController@forgetPassword')->name('instructor.forget_password');
    Route::get('reset_password', 'AuthController@resetPassword')->name('instructor.reset_password');
    Route::post('update_password', 'AuthController@updateInstructorPassword')->name('instructor.update_password');

    Route::group(['middleware' => 'instructor'], function () {
        Route::get('list_courses', 'MainController@listCourses');
        Route::get('report/{id}', 'MainController@show')->name('instructor.report');
        Route::post('logout', 'AuthController@logout')->name('instructor.logout');
    });
});
