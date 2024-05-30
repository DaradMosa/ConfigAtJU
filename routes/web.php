<?php
$formsDBS = ['academicprogram','department','departmentnamechange','college'];
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    
    return view('homepage');
})->middleware('auth');

Route::get('/form1', function () {
    return view('form1');
})->middleware('auth');
;

Route::get('/form2', function () {
    return view('form2');
})->middleware('auth');
;

Route::get('/form3', function () {
    return view('form3');
})->middleware('auth');
;

Route::get('/form4', function () {
    return view('form4');
})->middleware('auth');

Route::post('/form1', function () {
    $userId = auth()->id();
    $user = DB::table('users')
    ->where('id', $userId)
    ->first();
    $lastInsertId = DB::table('forms')->insertGetId([
        'level' => $user->level+1,
        'type' => 1
    ]);
    DB::table('department')->insert([
        'id_NUMBER' => $lastInsertId,
        'department_name' => request('department-name'),
        'college' => request('faculty'),
        'application_date' => request('date'),
        'description' => request('course-outline'),
        'university_relationship' => request('department-mission'),
        'reasons_for_creation' => request('justification'),
        'learning_outcomes' => request('learning-outcomes'),
        'academic_programs' => request('academic-programs'),
        'economic_research_feasibility' => request('economic-viability'),
        'required_academic_staff' => request('required-staff'),
        'required_facilities' => request('required-facilities'),
        'similar_departments' => request('similar-departments'),
        'agreements' => request('agreements'),
        'impact_on_other_departments' => request('impact-on-other-departments'),
        'internal_consultations' => request('consultation-file')
    ]);
    return redirect('/')->with('mssg','Form saved successfully');
})->middleware('auth');

Route::post('/form2', function () {
    $userId = auth()->id();
    $user = DB::table('users')
    ->where('id', $userId)
    ->first();
    $lastInsertId = DB::table('forms')->insertGetId([
        'level' => $user->level+1,
        'type' => 2
    ]);
    DB::table('college')->insert([
        'id_NUMBER' => $lastInsertId,
        'college_name' => request('department-name'),
        'application_date' => request('date'),
        'description' => request('course-outline'),
        'university_relationship' => request('department-mission'),
        'reasons_for_creation' => request('justification'),
        'academic_programs' => request('academic-programs'),
        'economic_research_feasibility' => request('economic-viability'),
        'required_academic_staff' => request('required-staff'),
        'required_facilities' => request('required-facilities'),
        'agreements' => request('similar-departments'),
        'internal_consultations' => request('consultation-file'),
       
    ]);
    return redirect('/')->with('mssg','Form saved successfully');
})->middleware('auth');

Route::post('/form3', function () {
    $userId = auth()->id();
    $user = DB::table('users')
    ->where('id', $userId)
    ->first();
    $lastInsertId = DB::table('forms')->insertGetId([
        'level' => $user->level+1,
        'type' => 3
    ]);
    DB::table('departmentnamechange')->insert([
        'id_NUMBER' => $lastInsertId,
        'college-name' => request('college-name'),
        'current_name' => request('current-department-name'),
        'proposed_name' => request('proposed-department-name'),
        'application_date' => request('date'),
        'description' => request('course-outline'),
        'university_relationship' => request('department-mission'),
        'reasons_for_change' => request('justification'),
        'economic_research_feasibility' => request('academic-programs'),
        'required_academic_staff' => request('required-staff'),
        'required_facilities' => request('required-facilities'),
        'impact_on_programs' => request('similar-departments'),
        'internal_consultations' => request('consultation-file'),
    ]);
    return redirect('/')->with('mssg','Form saved successfully');
})->middleware('auth');

Route::get('/view', function () {
    $formid = request('formid');
    $form_data = DB::table('forms')
                ->where('id', $formid)
                ->first();
  
    return view('form'.$form_data->type.'view',['form_data'=> $form_data] );
})->middleware('auth');

Route::get('/messegs', function () {
    $userId = auth()->id();
    $user = DB::table('users')
    ->select('level')
    ->where('id', $userId)
    ->first();
  
    $forms_for_confirmation = DB::table('forms')
                            ->where('level', $user->level)
                            ->orderBy('date', 'asc')
                            ->get();
    $forms_status = DB::table('forms')
                    ->where('level', '>', $user->level)
                    ->orderBy('date', 'asc')
                    ->get();
    
    $username = DB::table('users')
    ->select('name','level')
    ->get();
   

    return view('messegs',['userlvl' => $user->level,'forms_for_confirmation' => $forms_for_confirmation,'forms_status' =>$forms_status,'username' => $username]);
})->middleware('auth');



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


