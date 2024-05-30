<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    public function form1()
    {
        return view('forms_entry.form1');
    }

    public function form2()
    {
        return view('forms_entry.form2');
    }

    public function form3()
    {
        return view('forms_entry.form3');
    }

    public function form4()
    {
        return view('forms_entry.form4');
    }

    public function storeForm1(Request $request)
    {
        $userId = auth()->id();
        $user = DB::table('users')
            ->select('level', 'college')
            ->where('id', $userId)
            ->first();
        $lastInsertId = DB::table('forms')->insertGetId([
            'level' => $user->level + 1,
            'type' => 1,
            'college' => $user->college
        ]);
        DB::table('department')->insert([
            'id_NUMBER' => $lastInsertId,
            'department_name' => $request->input('department-name'),
            'college' => $request->input('faculty'),
            'application_date' => $request->input('date'),
            'description' => $request->input('course-outline'),
            'university_relationship' => $request->input('department-mission'),
            'reasons_for_creation' => $request->input('justification'),
            'learning_outcomes' => $request->input('learning-outcomes'),
            'academic_programs' => $request->input('academic-programs'),
            'economic_research_feasibility' => $request->input('economic-viability'),
            'required_academic_staff' => $request->input('required-staff'),
            'required_facilities' => $request->input('required-facilities'),
            'similar_departments' => $request->input('similar-departments'),
            'agreements' => $request->input('agreements'),
            'impact_on_other_departments' => $request->input('impact-on-other-departments'),
            'internal_consultations' => $request->input('consultation-file')
        ]);
        return redirect('/')->with('mssg', 'Form saved successfully');
    }

    public function storeForm2(Request $request)
    {
        $userId = auth()->id();
        $user = DB::table('users')
            ->select('level', 'college')
            ->where('id', $userId)
            ->first();
        $lastInsertId = DB::table('forms')->insertGetId([
            'level' => $user->level + 1,
            'type' => 2,
            'college' => $user->college
        ]);
        DB::table('college')->insert([
            'id_NUMBER' => $lastInsertId,
            'college_name' => $request->input('department-name'),
            'application_date' => $request->input('date'),
            'description' => $request->input('course-outline'),
            'university_relationship' => $request->input('department-mission'),
            'reasons_for_creation' => $request->input('justification'),
            'academic_programs' => $request->input('academic-programs'),
            'economic_research_feasibility' => $request->input('economic-viability'),
            'required_academic_staff' => $request->input('required-staff'),
            'required_facilities' => $request->input('required-facilities'),
            'agreements' => $request->input('similar-departments'),
            'internal_consultations' => $request->input('consultation-file'),
        ]);
        return redirect('/')->with('mssg', 'Form saved successfully');
    }

    public function storeForm3(Request $request)
    {
        $userId = auth()->id();
        $user = DB::table('users')
            ->select('level', 'college')
            ->where('id', $userId)
            ->first();
        $lastInsertId = DB::table('forms')->insertGetId([
            'level' => $user->level + 1,
            'type' => 3,
            'college' => $user->college
        ]);
        DB::table('departmentnamechange')->insert([
            'id_NUMBER' => $lastInsertId,
            'college-name' => $request->input('college-name'),
            'current_name' => $request->input('current-department-name'),
            'proposed_name' => $request->input('proposed-department-name'),
            'application_date' => $request->input('date'),
            'description' => $request->input('course-outline'),
            'university_relationship' => $request->input('department-mission'),
            'reasons_for_change' => $request->input('justification'),
            'economic_research_feasibility' => $request->input('academic-programs'),
            'required_academic_staff' => $request->input('required-staff'),
            'required_facilities' => $request->input('required-facilities'),
            'impact_on_programs' => $request->input('similar-departments'),
            'internal_consultations' => $request->input('consultation-file'),
        ]);
        return redirect('/')->with('mssg', 'Form saved successfully');
    }
    

   
}
