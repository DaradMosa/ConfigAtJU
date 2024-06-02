<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FormSubmissionController extends Controller
{
    public function submitForm1(Request $request)
    {
        $userId = Auth::id();
        $user = DB::table('users')
            ->select('level', 'college')
            ->where('id', $userId)
            ->first();

        $lastInsertId = DB::table('forms')->insertGetId([
            'level' => $user->level + 1,
            'date' => date("Y/m/d"),
            'type' => 1,
            'name' => '(' . $request->input('department-name') . ') استحداث قسم أكاديمي',
            'college' => $user->college,
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
            'internal_consultations' => $request->input('consultation-file'),
        ]);

        return redirect('/')->with('mssg', 'Form saved successfully');
    }

    public function submitForm2(Request $request)
    {
        $userId = Auth::id();
        $user = DB::table('users')
            ->select('level', 'college')
            ->where('id', $userId)
            ->first();

        $lastInsertId = DB::table('forms')->insertGetId([
            'level' => $user->level + 1,
            'date' => date("Y/m/d"),
            'type' => 2,
            'name' => '(' . $request->input('department-name') . ') استحداث كلية',
            'college' => $user->college,
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

    public function submitForm3(Request $request)
    {
        $userId = Auth::id();
        $user = DB::table('users')
            ->select('level', 'college')
            ->where('id', $userId)
            ->first();

        $lastInsertId = DB::table('forms')->insertGetId([
            'level' => $user->level + 1,
            'date' => date("Y/m/d"),
            'type' => 3,
            'name' => '(' . $request->input('current-department-name') . ') تعديل مسمى قسم أكاديمي / كلية',
            'college' => $user->college,
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

    public function submitForm4(Request $request)
    {
        $userId = Auth::id();
        $user = DB::table('users')
            ->select('level', 'college')
            ->where('id', $userId)
            ->first();

        $lastInsertId = DB::table('forms')->insertGetId([
            'level' => $user->level + 1,
            'type' => 4,
            'date' => date("Y/m/d"),
            'name' => '(' . $request->input('program-name-ar') . ') مقترح استحداث برنامج أكاديمي',
            'college' => $user->college,
        ]);

        DB::table('academicprogram')->insert([
            'id_NUMBER' => $lastInsertId,
            'program_name_ar' => $request->input('program-name-ar'),
            'program_name_en' => $request->input('program-name-en'),
            'program_level' => $request->input('program-level'),
            'degree_awarded' => $request->input('degree'),
            'college' => $request->input('faculty'),
            'department' => $request->input('department'),
            'department_recommendation' => $request->input('department-recommendation'),
            'college_recommendation' => $request->input('faculty-recommendation'),
            'other_departments_involved' => $request->input('other-departments'),
            'program_duration' => $request->input('program-duration'),
            'language_of_instruction' => $request->input('language'),
            'application_date' => $request->input('submission-date'),
            'program_description' => $request->input('college-name'),
            'bachelor_start_date' => $request->input('bachelor-start-date'),
            'bachelor_current_students' => $request->input('bachelor-current-students'),
            'bachelor_graduates_last_3_years' => $request->input('bachelor-graduates-last-3-years'),
            'masters_start_date' => $request->input('masters-start-date'),
            'masters_current_students' => $request->input('masters-current-students'),
            'masters_graduates_last_3_years' => $request->input('masters-graduates-last-3-years'),
            'diploma_start_date' => $request->input('diploma-start-date'),
            'diploma_current_students' => $request->input('diploma-current-students'),
            'diploma_graduates_last_3_years' => $request->input('diploma-graduates-last-3-years'),
            'phd_start_date' => $request->input('phd-start-date'),
            'phd_current_students' => $request->input('phd-current-students'),
            'phd_graduates_last_3_years' => $request->input('phd-graduates-last-3-years'),
            'university_relationship' => $request->input('current-department-name'),
            'reasons_for_creation' => $request->input('proposed-department-name'),
            'program_goals' => $request->input('program-status'),
            'program_importance' => $request->input('attachment'),
            'learning_outcomes' => $request->input('proposed-department-name'),
            'similar_programs' => $request->input('similar-programs'),
            'differences' => $request->input('differences'),
            'similar_programs_international' => $request->input('similar-programs-international'),
            'estimated_student_enrollment' => $request->input('expected-students'),
            'potential_beneficiaries' => $request->input('beneficiary-organizations'),
            'reasons_for_program' => $request->input('reasons-for-program'),
            'economic_research_feasibility' => $request->input('economic-feasibility-study'),
            'related_specialization' => $request->input('related-specialization'),
            'unemployment_statistics' => $request->input('unemployment-statistics'),
            'proposed_tuition_fee' => $request->input('tuition-fees'),
            'financial_contributions_plan' => $request->input('course-outline'),
            'agreements' => $request->input('department-mission'),
            'program_impact' => $request->input('justification'),
            'plan_committee_department' => $request->input('plan-committee-department'),
            'department_head' => $request->input('department-head'),
            'plan_committee_college' => $request->input('plan-committee-college'),
            'dean' => $request->input('dean'),
        ]);

        $this->insertRelatedData($request, $lastInsertId);

        return redirect('/')->with('mssg', 'Form saved successfully');
    }

    private function insertRelatedData(Request $request, $lastInsertId)
    {
        $this->insertFaculty($request->input('facultys'), $lastInsertId);
        $this->insertResearches($request->input('researches'), $lastInsertId);
        $this->insertTechnicians($request->input('technicians'), $lastInsertId);
        $this->insertAdmins($request->input('admins'), $lastInsertId);
        $this->insertLabs($request->input('current_labs'), 'dep_concerns', $lastInsertId);
        $this->insertLabs($request->input('proposed_labs'), 'dep_concerns_scintific', $lastInsertId);
        $this->insertReferences($request->input('references'), $lastInsertId);
        $this->insertStudents($request->input('students'), $lastInsertId);
    }

    private function insertFaculty($facultys, $lastInsertId)
    {
        if ($facultys) {
            foreach ($facultys as $member) {
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
    }

    private function insertResearches($researches, $lastInsertId)
    {
        if ($researches) {
            foreach ($researches as $research) {
                DB::table('edu_instituation')->insert([
                    'id_num' => $lastInsertId,
                    'Num' => $research['number'],
                    'Quad_name' => $research['full_name'],
                    'search_name' => $research['research_name'],
                    'journal_name' => $research['journal_name'],
                    'page_num' => $research['issue_number'],
                    'database_published' => $research['database_name'],
                ]);
            }
        }
    }

    private function insertTechnicians($technicians, $lastInsertId)
    {
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
    }

    private function insertAdmins($admins, $lastInsertId)
    {
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
    }

    private function insertLabs($labs, $tableName, $lastInsertId)
    {
        if ($labs) {
            foreach ($labs as $lab) {
                DB::table($tableName)->insert([
                    'id_num' => $lastInsertId,
                    'name' => $lab['lab_name'],
                    'comment' => $lab['notes'],
                ]);
            }
        }
    }

    private function insertReferences($references, $lastInsertId)
    {
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
    }

    private function insertStudents($students, $lastInsertId)
    {
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
    }
}
