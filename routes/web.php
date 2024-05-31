<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $no_permission =['4'];
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

Route::post('/form4', function () {
    $userId = auth()->id();
    $user = DB::table('users')
    ->select('level','college')
    ->where('id', $userId)
    ->first();
  
    $lastInsertId = DB::table('forms')->insertGetId([
        'level' => $user->level+1,
        'type' => 4,
        'name' => '('.request('program-name-ar').')تعديل مسمى قسم أكاديمي / كلية',
        'college' => $user->college
    ]);
    DB::table('academicprogram')->insert([
        'id_NUMBER' => $lastInsertId,
        'program_name_ar' => request('program-name-ar'),
        'program_name_en' => request('program-name-en'),
        'program_level' => request('program-level'),
        'degree_awarded' => request('degree'),
        'college' => request('faculty'),
        'department' => request('department'),
        'department_recommendation' => request('department-recommendation'),
        'college_recommendation' => request('faculty-recommendation'),
        'other_departments_involved' => request('other-departments'),
        'program_duration' => request('program-duration'),
        'language_of_instruction' => request('language'),
        'application_date' => request('submission-date'),
        'program_description' => request('college-name'),
        'bachelor_start_date' => request('bachelor-start-date'),
        'bachelor_current_students' => request('bachelor-current-students'),
        'bachelor_graduates_last-3-years' => request('bachelor-graduates-last-3-years'),
        'masters_start_date' => request('masters-start-date'),
        'masters_current_students' => request('masters-current-students'),
        'masters_graduates_last-3-years' => request('masters-graduates-last-3-years'),
        'diploma_start_date' => request('diploma-start-date'),
        'diploma_current_students' => request('diploma-current-students'),
        'diploma_graduates_last-3-years' => request('diploma-graduates-last-3-years'),
        'phd_start_date' => request('phd-start-date'),
        'phd_current_students' => request('phd-current-students'),
        'phd_graduates_last_3-years' => request('phd-graduates-last-3-years'),
        'university_relationship' => request('current-department-name'),
        'reasons_for_creation' => request('proposed-department-name'),
        'program_goals' => request('program-status'),
        'program_importance' => request('attachment'),
        'learning_outcomes' => request('proposed-department-name'),
        'similar_programs' => request('similar-programs'),
        'differences' => request('differences'),
        'similar_programs_international' => request('similar-programs-international'),
        'estimated_student_enrollment' => request('expected-students'),
        'potential_beneficiaries' => request('beneficiary-organizations'),
        'economic_research_feasibility' => request('reasons-for-program'),
        'related_specialization' => request('related-specialization'),
        'unemployment_statistics' => request('economic-feasibility-study'),
        'proposed_tuition_fee' => request('tuition-fees'),
        'financial_contributions_plan' => request('course-outline'),
        'additional_staff_required' => request(''),
        'required_facilities' => request(''),
        'required_references' => request(''),
        'scholarship_plan' => request(''),
        'agreements' => request('department-mission'),
        'program_impact' => request('justification'),
        'plan_committee_department' => request('plan-committee-department'),
        'department_head' => request('department-head'),
        'plan_committee_college' => request('plan-committee-college'),
        'dean' => request('dean'),

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


