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
        'name' => '('.request('program-name-ar').')مقترح استحداث برنامج أكاديمي',
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
        'bachelor_graduates_last_3_years' => request('bachelor-graduates-last-3-years'),
        'masters_start_date' => request('masters-start-date'),
        'masters_current_students' => request('masters-current-students'),
        'masters_graduates_last_3_years' => request('masters-graduates-last-3-years'),
        'diploma_start_date' => request('diploma-start-date'),
        'diploma_current_students' => request('diploma-current-students'),
        'diploma_graduates_last_3_years' => request('diploma-graduates-last-3-years'),
        'phd_start_date' => request('phd-start-date'),
        'phd_current_students' => request('phd-current-students'),
        'phd_graduates_last_3_years' => request('phd-graduates-last-3-years'),
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
        'reasons_for_program' => request('reasons-for-program'),
        'economic_research_feasibility' => request('economic-feasibility-study'),
        'related_specialization' => request('related-specialization'),
        'unemployment_statistics' => request('unemployment-statistics'),
        'proposed_tuition_fee' => request('tuition-fees'),
        'financial_contributions_plan' => request('course-outline'),
        'agreements' => request('department-mission'),
        'program_impact' => request('justification'),
        'plan_committee_department' => request('plan-committee-department'),
        'department_head' => request('department-head'),
        'plan_committee_college' => request('plan-committee-college'),
        'dean' => request('dean'),

    ]);

    $faculty = request('facultys');
    
    if ($faculty) {
        foreach ($faculty as $member) {
            DB::table('edu_instituation_sec')->insert([
                'id_num' => $lastInsertId,
                'num' => $member['number'],
                'Quad_name' => $member['full_name'],
                'birth_date' => $member['birth_date'],
                'Nationality' => $member['nationality'],
                'qualfication' => $member['qualifications'],
                'Specialization' => $member['specialization'],
                'Graduate_year' => $member['graduation_year'],
                'university_graduated' => $member['university'],
                'academic_rank' => $member['academic_rank'],
                'Date_rank_granted' => $member['rank_date'],
                'rank_awarding' => $member['rank_grantor'],
                'yaer_of_appointment' => $member['appointment_year'],
                'comments' => $member['notes'],
            ]);
        }
    }

    $researches = request('researches');

    if ($researches) {
        foreach ($researches as $research) {
            DB::table('edu_instituation')->insert([
                'id_num' => $lastInsertId,
                'Num' => $research['number'],
                'Quad_name' => $research['full_name'],
                'search_name' => $research['research_name'],
                'journal_name' => $research['journal_name'],
                'page_num' => $research['issue_number'],
                'database_published' => $research['database_name']
            ]);
        }
    }

    $technicians = request('technicians');
    $admins = request('admins');
    
    if ($technicians) {
        foreach ($technicians as $technician) {
            DB::table('technicians_genralsec')->insert([
                'id_num' => $lastInsertId,
                'Quad_name' => $technician['full_name'],
                'Nationality' => $technician['nationality'],
                'qualfication_TEC_ADMIN' => $technician['qualification'],
                'year_of_Experiecne' => $technician['experience_years'],
                'CURRENT_Work' => $technician['current_job'],
                'comments' => $technician['notes'],
            ]);
        }
    }
    if ($admins) {
        foreach ($admins as $admin) {
            DB::table('administrators_genralsec')->insert([
                'id_num' => $lastInsertId,
                'Quad_name' => $admin['full_name'],
                'Nationality' => $admin['nationality'],
                'qualfication_TEC_ADMIN' => $admin['qualification'],
                'year_of_Experiecne' => $admin['experience_years'],
                'CURRENT_Work' => $admin['current_job'],
                'comments' => $admin['notes'],
            ]);
        }
    }

    $currentLabs = request('current_labs');
    $proposedLabs = request('proposed_labs');
    
    if ($currentLabs) {
        foreach ($currentLabs as $lab) {
            DB::table('dep_concerns')->insert([
                'id_num' => $lastInsertId,
                'name' => $lab['lab_name'],
                'comment' => $lab['notes'],
            ]);
        }
    }

    if ($proposedLabs) {
        foreach ($proposedLabs as $lab) {
            DB::table('dep_concerns_scintific')->insert([
                'id_num' => $lastInsertId,
                'name' => $lab['lab_name'],
                'comment' => $lab['notes'],
            ]);
        }
    }

    $references = request('references');
    
    if ($references) {
        foreach ($references as $reference) {
            DB::table('program_ref')->insert([
                'id_num' => $lastInsertId,
                'ref_required' => $reference['required_reference'],
                'avilable_OR_not' => $reference['status'],
                'comments' => $reference['notes'],
            ]);
        }
    }

    $students = request('students');

    if ($students) {
        foreach ($students as $student) {
            DB::table('international_students')->insert([
                'id_num' => $lastInsertId,
                'stu_name' => $student['student_name'],
                'Specialization' => $student['specialization'],
                'collgeORsec' => $student['department'],
                'NO_scholarship' => $student['years'],
                'university_name' => $student['university'],
                'university_QR' => $student['ranking'],
            ]);
        }
    }

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
    if($form_data->type == '4'){

        $administrators_genralsec = DB::table('administrators_genralsec')
                ->where('id_num', $formID)
                ->get();
        $dep_concerns = DB::table('dep_concerns')
                ->where('id_num', $formID)
                ->get();
        $dep_concerns_scintific = DB::table('dep_concerns_scintific')
                ->where('id_num', $formID)
                ->get();
        $edu_instituation = DB::table('edu_instituation')
                ->where('id_num', $formID)
                ->get();
        $edu_instituation_sec = DB::table('edu_instituation_sec')
                ->where('id_num', $formID)
                ->get();
        $international_students = DB::table('international_students')
                ->where('id_num', $formID)
                ->get();
        $program_ref = DB::table('program_ref')
                ->where('id_num', $formID)
                ->get();
        $technicians_genralsec = DB::table('technicians_genralsec')
                ->where('id_num', $formID)
                ->get();
    
    
                return view('forms_view/form'.$form_data->type.'view',['form_values'=> $form_values,'formlvl' => $form_data->level,'userlvl'=>$user->level,'form_comments' => $form_data->comments,
                'administrators_genralsec' =>$administrators_genralsec,  'dep_concerns' =>$dep_concerns,  'dep_concerns_scintific' =>$dep_concerns_scintific,
                  'edu_instituation' =>$edu_instituation,  'edu_instituation_sec' =>$edu_instituation_sec,  'international_students' =>$international_students,
                    'program_ref' =>$program_ref,  'technicians_genralsec' =>$technicians_genralsec,] );

    }

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
                            ->orderBy('id', 'desc')
                            ->get();
        $forms_status = DB::table('forms')
                            ->where('level', '>', $user->level)
                            ->where('status', 'pending')
                            ->orderBy('id', 'desc')
                            ->get();

        $forms_status_fin = DB::table('forms')
                            ->where('level', '>', $user->level -1)
                            ->where('status', 'rejected')
                            ->orwhere('status', 'accepted')
                            ->orderBy('id', 'desc')
                            ->get();
    }
    else{
        $forms_for_confirmation = DB::table('forms')
                            ->where('level', $user->level)
                            ->where('college', $user->college)
                            ->where('status', 'pending')
                            ->orderBy('id', 'desc')
                            ->get();
        $forms_status = DB::table('forms')
                            ->where('level', '>', $user->level)
                            ->where('college', $user->college)
                            ->where('status', 'pending')
                            ->orderBy('id', 'desc')
                            ->get();

        $forms_status_fin = DB::table('forms')
                            ->where('level', '>', $user->level -1)
                            ->where('college', $user->college)
                            ->where('status', 'rejected')
                            ->orwhere('status', 'accepted')
                            ->orderBy('id', 'desc')
                            ->get();
    }
    
    
    $username = DB::table('users')
    ->select('name','level','college')
    ->get();
   

    return view('messegs',['userlvl' => $user->level,'forms_for_confirmation' => $forms_for_confirmation,'forms_status' =>$forms_status,'username' => $username,'forms_status_fin'=>$forms_status_fin]);
})->middleware('auth');



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


