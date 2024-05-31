<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $no_permission =['1','4','6'];
    $userId = auth()->id();
    $user = DB::table('users')
    ->select('level')
    ->where('id', $userId)
    ->first();
    return view('homepage',['userlvl'=>$user->level,'no_permission'=>$no_permission]);
})->middleware('auth');

Route::get('/form1', function () {
    return view('/forms_entry/form1');
})->middleware('auth');


Route::get('/form2', function () {
    return view('/forms_entry/form2');
})->middleware('auth');


Route::get('/form3', function () {
    return view('/forms_entry/form3');
})->middleware('auth');


Route::get('/form4', function () {
    return view('/forms_entry/form4');
})->middleware('auth');

Route::post('/form1', function () {
    $userId = auth()->id();
    $user = DB::table('users')
    ->select('level','college')
    ->where('id', $userId)
    ->first();
    $lastInsertId = DB::table('forms')->insertGetId([
        'level' => $user->level+1,  
        'type' => 1,
        'name' => '('.request('department-name').')استحداث قسم أكاديمي',
        'college' => $user->college
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
    ->select('level','college')
    ->where('id', $userId)
    ->first();
    $lastInsertId = DB::table('forms')->insertGetId([
        'level' => $user->level+1,
        'type' => 2,
        'name' => '('.request('department-name').')استحداث كلية',
        'college' => $user->college
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
    ->select('level','college')
    ->where('id', $userId)
    ->first();
  
    $lastInsertId = DB::table('forms')->insertGetId([
        'level' => $user->level+1,
        'type' => 3,
        'name' => '('.request('current-department-name').')تعديل مسمى قسم أكاديمي / كلية',
        'college' => $user->college
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

Route::post('/view/{formID}', function ($formID) {
    $formsDBS = ['department','college','departmentnamechange','academicprogram'];
    $userId = auth()->id();
    $form = DB::table('forms')
    ->where('id', $formID)
    ->first();

    if($form->level == 7 && request('accept')){
        DB::table('forms')
        ->where('id', $formID)
        ->update([
            'status' => 'accepted',
            'comments' => request('comment')
        ]);
    }
    elseif($form->level == 7){
        DB::table('forms')
        ->where('id', $formID)
        ->update([
            'status' => 'rejected',
            'comments' => request('comment')
        ]);
    }
    else if(request('accept')){
        DB::table('forms')
        ->where('id', $formID)
        ->update([
            'level' => DB::raw('level + 1'),
            'comments' => request('comment')
        ]);
    }
    else{
        DB::table('forms')
        ->where('id', $formID)
        ->update([
            'status' => 'rejected',
            'comments' => request('comment')
        ]);
    }


    return redirect('/')->with('mssg','Form saved successfully');
})->middleware('auth');

Route::get('/view/{formID}', function ($formID) {
    $formsDBS = ['department','college','departmentnamechange','academicprogram'];
    $userId = auth()->id();
    $user = DB::table('users')
                ->select('level','college','role')
                ->where('id', $userId)
                ->first();
    $form_data = DB::table('forms')
                ->select('type','level','comments')
                ->where('id', $formID)
                ->first();
    $form_values = DB::table($formsDBS[$form_data->type -1])
                ->where('id_NUMBER', $formID)
                ->first();

    return view('forms_view/form'.$form_data->type.'view',['form_values'=> $form_values,'formlvl' => $form_data->level,'userlvl'=>$user->level,'form_comments' => $form_data->comments] );
})->middleware('auth');
Route::get('/view', function () {
    $formid = request('formid');
    $form_data = DB::table('forms')
                ->where('id', $formid)
                ->first();
                
  
    return view('/forms_view/form'.$form_data->type.'view',['form_data'=> $form_data] );
})->middleware('auth');

Route::get('/messegs', function () {
    $userId = auth()->id();
    $user = DB::table('users')
    ->select('level','college','role')
    ->where('id', $userId)
    ->first();
  
    if($user->role == 'Vice_President' ||$user->role == 'Director_of_Accreditation_Department' ||$user->role == 'Director_of_AQAC'){
        $forms_for_confirmation = DB::table('forms')
                            ->where('level', $user->level)
                            ->where('status', 'pending')
                            ->orderBy('date', 'asc')
                            ->get();
        $forms_status = DB::table('forms')
                            ->where('level', '>', $user->level)
                            ->where('status', 'pending')
                            ->orderBy('date', 'asc')
                            ->get();

        $forms_status_fin = DB::table('forms')
                            ->where('level', '>', $user->level -1)
                            ->where('status', 'rejected')
                            ->orwhere('status', 'accepted')
                            ->orderBy('date', 'asc')
                            ->get();
    }
    else{
        $forms_for_confirmation = DB::table('forms')
                            ->where('level', $user->level)
                            ->where('college', $user->college)
                            ->where('status', 'pending')
                            ->orderBy('date', 'asc')
                            ->get();
        $forms_status = DB::table('forms')
                            ->where('level', '>', $user->level)
                            ->where('college', $user->college)
                            ->where('status', 'pending')
                            ->orderBy('date', 'asc')
                            ->get();

        $forms_status_fin = DB::table('forms')
                            ->where('level', '>', $user->level -1)
                            ->where('college', $user->college)
                            ->where('status', 'rejected')
                            ->orwhere('status', 'accepted')
                            ->orderBy('date', 'asc')
                            ->get();
    }
    
    
    $username = DB::table('users')
    ->select('name','level','college')
    ->get();
   

    return view('messegs',['userlvl' => $user->level,'forms_for_confirmation' => $forms_for_confirmation,'forms_status' =>$forms_status,'username' => $username,'forms_status_fin'=>$forms_status_fin]);
})->middleware('auth');



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


