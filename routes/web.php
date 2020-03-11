<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login',function(){
   return view("login");
});


Route::get('/registration',function(){
   return view("registration");
});

Route::get('add_account_interface',function(){
   return view("dashboard.add_account_interface");
});


Route::get('add_account_interface_account',function(){
   return view("account.add_account_interface");
});

Route::get('add_income_interface',function(){
   return view("dashboard.add_income_interface");
});

Route::get('add_income_interface_account',function(){
   return view("account.add_income_interface");
});


Route::get('view_account_interface',function(){
   return view("dashboard.view_account_interface");
});





Route::get('view_account_interface_account',function(){
   return view("account.view_account_interface");
});


Route::get('view_income_interface',function(){
   return view("dashboard.view_income_interface");
});

Route::get('view_income_interface_account',function(){
   return view("account.view_income_interface");
});


Route::get('account',function(){
   return view("account.index");
});


Route::get('view_profit_interface',function(){
   return view("dashboard.view_profit_interface");
});


Route::get('view_profit_interface_account',function(){
   return view("account.view_profit_interface");
});




Route::get('/forgot_password',function(){
   return view("forgot_password");
});

Route::get('teacher_attendance_check_interface',function(){
   return view("dashboard.view_attendance_teacher");
});




// Route::get('/about',function(){
//   return view("about");
// });


Route::get('about','SchoolRegistration@about');

Route::get("school_signout",function()

  {
      $this->auth->logout();
        Session::flush();
        return redirect('/');
  }
);

Route::get('/signout', function(){
   Auth::logout();
   Session::flush();
   return Redirect::to('login');
});


Route::get('/signout_teacher', function(){
   Auth::logout();
   Session::flush();
   return Redirect::to('teacher');
});


Route::get('/signout_account', function(){
   Auth::logout();
   Session::flush();
   return Redirect::to('account');
});



Route::get('/signout_admin', function(){
   Auth::logout();
   Session::flush();
   return Redirect::to('admin');
});


Route::post('change_password_update','SchoolRegistration@change_password_update');









Route::get('view_all_fees_interface','FeesController@view_all_fees_interface');
Route::get('teacher','TeacherController@show_teacher_login');



Route::get('admin','adminController@show_admin_login');

Route::post('school_registration','SchoolRegistration@register');
Route::post('school_login','SchoolRegistration@login');
Route::post('school_forgot_password','SchoolRegistration@forgot_password');
Route::get('school_request','SchoolRegistration@show_school_request');

Route::get('show_school','SchoolRegistration@show_school');

Route::post('confirm_school','SchoolRegistration@confirm_school');
Route::get('save_admin','adminController@save_admin');

Route::get('update_school_information_interface',"SchoolRegistration@update_school_information_interface");

Route::get('change_password','SchoolRegistration@change_password');

Route::post('update_school_information','SchoolRegistration@update_school_information');

Route::post('admin_login','adminController@login');
Route::post('teacher_login','TeacherController@login');

Route::post('account_login','TeacherController@account_login');


Route::get('view_message','adminController@view_message');

Route::get('read_admin_message/{id}','adminController@read_message');

 Route::get('laravel-send-email', 'EmailController@sendEMail');




// Route::get('/dashboards',function(){
//   return view("dashboard.main_page");
// });


Route::get('dashboards', 'SchoolRegistration@view_dashboard');

Route::get('student_list', 'StudentListController@create');
Route::get('show_student','StudentListController@show_student');


Route::post('show_student_table','StudentListController@show_student_table');

Route::post('show_payment_table','SchoolRegistration@show_payment_table');
Route::post('show_payment_table_account','SchoolRegistration@show_payment_table_account');
Route::post('show_income_table','SchoolRegistration@show_income_table');

Route::post('show_income_table_account','SchoolRegistration@show_income_table_account');

Route::post('show_profit_table','SchoolRegistration@show_profit_table');


Route::post('show_account_update_modal','SchoolRegistration@show_account_update_modal');
Route::post('show_income_update_modal','SchoolRegistration@show_income_update_modal');

Route::post('update_account_information','SchoolRegistration@update_account_information');

Route::post('update_income_information','SchoolRegistration@update_income_information');
Route::post('delete_account_information','SchoolRegistration@delete_account_information');
Route::post('delete_income_information','SchoolRegistration@delete_income_information');

Route::post('show_update_modal','StudentListController@show_update_modal');

Route::post('update_student_data','StudentListController@update_student_data');

Route::post('delete_student_data','StudentListController@delete_student_data');

Route::get('view_student_information_interface','StudentListController@view_student_information_interface');

Route::post('show_individual_information','StudentListController@show_individual_information');

Route::get('view_all_student_interface','StudentListController@view_all_student_interface');

Route::get('view_all_student_interface_admin','adminController@view_all_student_interface');


Route::post('saveStudentRecord','StudentListController@store');

Route::post('save_account_information','SchoolRegistration@save_account_information');
Route::post('save_income_information','SchoolRegistration@save_income_information');

Route::post('getStudent','StudentListController@getStudent');
Route::post('getStudentTermExam','StudentListController@getStudentTermExam');

Route::get('class_section', 'ClassSectionController@show_form');

Route::post('class_section','ClassSectionController@save_data');

Route::post('getSection','ClassSectionController@getSection');

Route::post('getSectionTeacher','ClassSectionController@getSectionTeacher');


Route::post('getSubject','SubjectListController@getSubject');

Route::post('getSubjectTeacher','SubjectListController@getSubjectTeacher');

Route::get('view_class_section','ClassSectionController@view_class_section');
Route::post('show_update_modal_class_section','ClassSectionController@show_update_modal_class_section');

Route::post('update_class_section','ClassSectionController@update_class_section');

Route::post('delete_class_section','ClassSectionController@delete_class_section');


Route::get('subject_add_interface','SubjectListController@subject_add_interface');

Route::get('view_subject_interface','SubjectListController@view_subject_interface');

Route::post('add_subject','SubjectListController@add_subject');
Route::post('show_subject_table','SubjectListController@show_subject_table');
Route::post('show_subject_update_modal','SubjectListController@show_subject_update_modal');

Route::post('update_subject','SubjectListController@update_subject');
Route::post('delete_subject','SubjectListController@delete_subject');

Route::get('add_class_test_marks_interface','ClassTestMarksController@add_class_test_marks_interface');
Route::get('view_class_test_result_interface','ClassTestMarksController@view_class_test_result_interface');
Route::post('save_class_test_marks','ClassTestMarksController@save_class_test_marks');

Route::post('getClassTest','ClassTestMarksController@getClassTest');

Route::post('show_class_test_marks','ClassTestMarksController@show_class_test_marks');

Route::post('show_class_test_marks_modal','ClassTestMarksController@show_class_test_marks_modal');

Route::post('update_class_test_marks','ClassTestMarksController@update_class_test_marks');
Route::post('delete_class_test_marks','ClassTestMarksController@delete_class_test_marks');
Route::post('show_term_exam_marks','ClassTestMarksController@show_term_exam_marks');


Route::get("add_news_interface","NewsController@add_news_interface");
Route::get("view_news_interface","NewsController@view_news_interface");


Route::post("submit_news","NewsController@submit_news");










Route::get('add_term_exam_marks_interface','TermExamMarksController@add_term_exam_marks_interface');

Route::get('view_term_exam_marks_interface','TermExamMarksController@view_term_exam_marks_interface');

Route::get('view_individual_marks_interface','TermExamMarksController@view_individual_marks_interface');

Route::post('show_term_exam_marks','TermExamMarksController@show_term_exam_marks');
Route::post('show_term_exam_marks_modal','TermExamMarksController@show_term_exam_marks_modal');

Route::post('show_individual_marks','TermExamMarksController@show_individual_marks');

Route::post('update_term_exam_marks','TermExamMarksController@update_term_exam_marks');

Route::post('delete_term_exam_marks','TermExamMarksController@delete_term_exam_marks');

Route::get('view_add_attendance_interface','AttendanceController@view_add_attendance_interface');

Route::get('view_add_attendance_interface_teacher','AttendanceController@view_add_attendance_interface_teacher');


Route::get('view_add_attendance_interface_teacher_out','AttendanceController@view_add_attendance_interface_teacher_out');


Route::get('add_teacher_attendance_interface',function()
{
  return view('dashboard.add_attendance_teacher');
});



Route::get('view_teacher_attendance_interface','TeacherController@view_teacher_attendance_interface');





Route::get('view_attendance_interface','AttendanceController@view_attendance_interface');

Route::get('view_attendance_interface_teacher','AttendanceController@view_attendance_interface_teacher');
Route::get('view_attendance_interface_teacher_out','AttendanceController@view_attendance_interface_teacher_out');

Route::post('add_attendance','AttendanceController@add_attendance');
Route::post('add_teacher_attendance','TeacherController@add_teacher_attendance');

Route::post('check_teacher_attendance','AttendanceController@check_teacher_attendance');


Route::post('add_attendance_teacher','AttendanceController@add_attendance_teacher');


Route::post('add_attendance_teacher_out','AttendanceController@add_attendance_teacher_out');

Route::post('present_check','AttendanceController@present_check');
Route::post('present_check_teacher','AttendanceController@present_check_teacher');

Route::post('present_check_teacher_out','AttendanceController@present_check_teacher_out');

Route::post('teacher_present_check','TeacherController@teacher_present_check');


Route::post('teacher_absent_check','TeacherController@teacher_absent_check');

Route::post('absent_check','AttendanceController@absent_check');
Route::post('absent_check_teacher','AttendanceController@absent_check_teacher');
Route::post('absent_check_teacher_out','AttendanceController@absent_check_teacher_out');

Route::post('submit_attendance','AttendanceController@submit_attendance');

Route::post('submit_teacher_attendance','TeacherController@submit_teacher_attendance');

Route::post('submit_attendance_teacher','AttendanceController@submit_attendance_teacher');


Route::post('submit_attendance_teacher_out','AttendanceController@submit_attendance_teacher_out');


Route::post('view_attendance','AttendanceController@view_attendance');

Route::post('view_attendance_teacher','AttendanceController@view_attendance_teacher');

Route::post('view_attendance_teacher_out','AttendanceController@view_attendance_teacher_out');



Route::get('add_notice_class_interface','NoticeController@add_notice_class_interface');

Route::get('add_notice_all_interface','NoticeController@add_notice_all_interface');
Route::get('add_notice_interface_teacher','NoticeController@add_notice_interface_teacher');

Route::get('view_notice_class_interface','NoticeController@view_notice_class_interface');

Route::get('view_notice_interface_teacher','NoticeController@view_notice_interface_teacher');


Route::get('view_notice_all_interface','NoticeController@view_notice_all_interface');


Route::post('submit_notice_class','NoticeController@submit_notice_class');

Route::post('submit_notice_teacher','NoticeController@submit_notice_teacher');

Route::post('submit_notice_all','NoticeController@submit_notice_all');
Route::post('send_complain','NoticeController@send_complain');

Route::post('show_notice_modal','NoticeController@show_notice_modal');
Route::post('update_notice','NoticeController@update_notice');
Route::post('delete_notice','NoticeController@delete_notice');

Route::post('show_notice_list','NoticeController@show_notice_list');
Route::post('show_notice_list_teacher','NoticeController@show_notice_list_teacher');


Route::post('get_total_student',"StudentListController@get_total_student");



Route::post('save_term_exam_marks','TermExamMarksController@save_term_exam_marks');


Route::get("add_fees_interface","FeesController@add_fees_interface");
Route::get("view_fees_interface","FeesController@view_fees_interface");
Route::post("submit_fees","FeesController@submit_fees");
Route::post("show_fees_modal","FeesController@show_fees_modal");

Route::post("update_fees","FeesController@update_fees");
Route::post("delete_fees","FeesController@delete_fees");
Route::post("show_fees_table","FeesController@show_fees_table");




Route::get("add_payment_interface",'PaymentController@add_payment_interface');
Route::get("view_individual_payment_interface",'PaymentController@view_individual_payment_interface');

Route::get("view_class_wise_payment_interface",'PaymentController@view_class_wise_payment_interface');

Route::get("view_school_payment_interface",'PaymentController@view_school_payment_interface');


Route::post('get_payment_form','PaymentController@get_payment_form');
Route::post('show_total_form','PaymentController@show_total_form');




Route::post('save_payment_info','PaymentController@save_payment_info');

Route::post('view_payment_school','PaymentController@view_payment_school');

Route::post('view_payment_class','PaymentController@view_payment_class');


Route::post("update_teacher_data","TeacherController@update_teacher_data");

Route::post("update_accountant_data","TeacherController@update_accountant_data");

Route::post("delete_teacher_data","TeacherController@delete_teacher_data");

Route::post("delete_accountant_data","TeacherController@delete_accountant_data");

Route::post("show_update_modal_teacher",'TeacherController@show_update_modal_teacher');

Route::post("show_update_modal_accountant",'TeacherController@show_update_modal_accountant');


Route::get('add_teacher_interface','TeacherController@add_teacher_interface');

Route::get('add_accountant_interface','TeacherController@add_accountant_interface');

Route::get('view_teacher_interface','TeacherController@view_teacher_interface');

Route::get('view_accountant_interface','TeacherController@view_accountant_interface');

Route::post('add_teacher','TeacherController@add_teacher');

Route::post('add_accountant','TeacherController@add_accountant');

Route::post('getTeachersForm',"TeacherController@getTeachersForm");

Route::post('aafmUssd','UssdController@ussd')->defaults('app_id','APP_018275')->defaults('app_password','a7e54f09b0d5eae5dd481deb4a637b53');
Route::post('rasgcUssd','UssdController@ussd')->defaults('app_id','APP_019079')->defaults('app_password','08df4ed9d3e6e401fee23f9672459138');
Route::post('cnscUssd','UssdController@ussd')->defaults('app_id','APP_019695')->defaults('app_password','dba5127e2046dfa6a59c1ca16ef1e6db');
Route::post('amisUssd','UssdController@ussd')->defaults('app_id','APP_020173')->defaults('app_password','71ca88466b68f9efaef22bd2f4928dc8');
Route::post('spsncUssd','UssdController@ussd')->defaults('app_id','APP_020175')->defaults('app_password','96bee211e55a1a1f96e076eb46cdaf71');
Route::post('rlsUssd','UssdController@ussd')->defaults('app_id','APP_019961')->defaults('app_password','154159ae2138ffcbd98095fba59c008e');




Route::post('cnscSubscription','UssdController@cnscSubscription');
Route::post('spsncSubscription','UssdController@spsncSubscription');
Route::post('amisSubscription','UssdController@amisSubscription');
Route::post('rlsSubscription','UssdController@rlsSubscription');
Route::post('aafmSubscription','UssdController@aafmSubscription');

Route::get('sub','UssdController@sub');