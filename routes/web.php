<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormSubmissionController;
Route::get('/', function () {
    $no_permission1 =['1','4','5','6','7'];
    $no_permission2 =['4','5','6','7'];
    $no_permission3 =['4','5','6','7'];
    $no_permission4 =['4','5','6','7'];
    $userId = auth()->id();
    $user = DB::table('users')
    ->select('level')
    ->where('id', $userId)
    ->first();
    return view('homepage',['userlvl'=>$user->level,'no_permission1'=>$no_permission1,'no_permission2'=>$no_permission2
    ,'no_permission3'=>$no_permission3,'no_permission4'=>$no_permission4]);
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


Route::post('/form1', [FormSubmissionController::class, 'submitForm1'])->middleware('auth');
Route::post('/form2', [FormSubmissionController::class, 'submitForm2'])->middleware('auth');
Route::post('/form3', [FormSubmissionController::class, 'submitForm3'])->middleware('auth');
Route::post('/form4', [FormSubmissionController::class, 'submitForm4'])->middleware('auth');

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


