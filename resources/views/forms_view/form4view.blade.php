@extends('layouts.view4')

@section('content')


    <div class="contain">
        <div class="header">
            <h1>مقترح استحداث برنامج أكاديمي</h1>
        </div>
        <div class="table-responsive">
        <table class="styled-table">
            <tr>
                <th>اسم البرنامج باللغة العربية</th>
                <td><input type="text" id="program-name-ar" name="program-name-ar" readonly value='{{$form_values->program_name_ar}}'></td>
            </tr>
            <tr>
                <th>اسم البرنامج باللغة الإنجليزية</th>
                <td><input type="text" id="program-name-en" name="program-name-en" readonly value='{{$form_values->program_name_en}}'></td>
            </tr>
            <tr>
                <th>مستوى البرنامج</th>
                <td><input type="text" id="program-level" name="program-level" readonly value='{{$form_values->program_level}}'></td>
            </tr>
            <tr>
                <th>الدرجة العلمية للبرنامج</th>
                <td><input type="text" id="degree" name="degree" readonly value='{{$form_values->degree_awarded}}'></td>
            </tr>
            <tr>
                <th>الكلية</th>
                <td><input type="text" id="faculty" name="faculty" readonly value='{{$form_values->college}}'></td>
            </tr>
            <tr>
                <th>القسم</th>
                <td><input type="text" id="department" name="department" readonly value='{{$form_values->department}}'></td>
            </tr>
            <tr>
                <th>توصية مجلس القسم (يذكر رقم الجلسة، رقم القرار وتاريخه)</th>
                <td><input type="text" id="department-recommendation" name="department-recommendation" readonly value='{{$form_values->department_recommendation}}'></td>
            </tr>
            <tr>
                <th>توصية مجلس الكلية (يذكر رقم الجلسة، رقم القرار وتاريخه)</th>
                <td><input type="text" id="faculty-recommendation" name="faculty-recommendation" readonly value='{{$form_values->college_recommendation}}'></td>
            </tr>
            <tr>
                <th>الأقسام الأخرى المشتركة في تدريس البرنامج</th>
                <td><input type="text" id="other-departments" name="other-departments" readonly value='{{$form_values->other_departments_involved}}'></td>
            </tr>
            <tr>
                <th>مدة البرنامج</th>
                <td><input type="text" id="program-duration" name="program-duration" readonly value='{{$form_values->program_duration}}'></td>
            </tr>
            <tr>
                <th>لغة التدريس</th>
                <td><input type="text" id="language" name="language" readonly value='{{$form_values->language_of_instruction}}'></td>
            </tr>
            <tr>
                <th>تاريخ تقديم الطلب</th>
                <td><input type="date" id="submission-date" name="submission-date" readonly value='{{$form_values->application_date}}'></td>
            </tr>
        </table>
        </div>
        <div class="form-group">
            <label for="college-name">نبذة عن البرنامج المقترح</label>
            <input type="text" id="college-name" name="college-name" readonly value='{{$form_values->program_description}}'>
        </div>
        <div class="table-responsive">
        <table class="current-programs-table">
            <tr>
                <th>البرنامج</th>
                <th>تاريخ بداية البرنامج</th>
                <th>أعداد الملتحقين حالياً</th>
                <th>أعداد الخريجين خلال الثلاث سنوات الأخيرة</th>
            </tr>
            <tr>
                <td>بكالوريوس</td>
                <td><input type="date" name="bachelor-start-date" readonly value='{{$form_values->bachelor_start_date}}'></td>
                <td><input type="number" name="bachelor-current-students" readonly value='{{$form_values->bachelor_current_students}}'></td>
                <td><input type="number" name="bachelor-graduates-last-3-years" readonly value='{{$form_values->bachelor_graduates_last_3_years	}}'></td>
            </tr>
            <tr>
                <td>ماجستير</td>
                <td><input type="date" name="masters-start-date" readonly value='{{$form_values->masters_start_date}}'></td>
                <td><input type="number" name="masters-current-students" readonly value='{{$form_values->masters_current_students}}'></td>
                <td><input type="number" name="masters-graduates-last-3-years" readonly value='{{$form_values->masters_graduates_last_3_years}}'></td>
            </tr>
            <tr>
                <td>دبلوم عالي</td>
                <td><input type="date" name="diploma-start-date" readonly value='{{$form_values->diploma_start_date}}'></td>
                <td><input type="number" name="diploma-current-students" readonly value='{{$form_values->diploma_current_students}}'></td>
                <td><input type="number" name="diploma-graduates-last-3-years" readonly value='{{$form_values->diploma_graduates_last_3_years}}'></td>
            </tr>
            <tr>
                <td>دكتوراه</td>
                <td><input type="date" name="phd-start-date" readonly value='{{$form_values->phd_start_date}}'></td>
                <td><input type="number" name="phd-current-students" readonly value='{{$form_values->phd_current_students}}'></td>
                <td><input type="number" name="phd-graduates-last-3-years" readonly value='{{$form_values->phd_graduates_last_3_years}}'></td>
            </tr>
        </table>
        </div>
        <div class="notes">
            <p>ملاحظات هامة:</p>
            <p>* لا يجوز لأي جامعة البدء في برنامج ماجستير إلا بعد أن يكون قد خرجًّت الجامعة ثلاث دفعات من برنامج البكالوريوس المماثل (يستثنى من ذلك البرامج متعددة التخصصات).</p>
            <p>** لا يجوز لأي جامعة التقدم بطلب استحداث برنامج الدكتوراه إلا بعد أن تكون قد خرجًّت الجامعة ثلاث دفعات من برنامج الماجستير المماثل على الأقل (يستثنى من ذلك البرامج متعددة التخصصات).</p>
            <p>*، ** حسب ما هو مذكور في طلب الاستحداث المعتمد من وزارة التعليم العالي والبحث العلمي.</p>
            <p>*** الالتزام بما جاء في كتاب وزارة التعليم العالي والبحث العلمي وارد رئاسة رقم 1248 فيما يخص استحداث برامج الدكتوراه المشتركة مع جامعات عالمية مرموقة أن تكون وفقاً لأسس البرامج المشتركة المقرة من قِبل مجلس التعليم العالي وشريطة أن لا تكون برامج راكدة ومشبعة أو مكررة.</p>
        </div>

        
        <div class="form-group">
            <label for="current-department-name">بيان علاقة البرنامج برسالة الجامعة وخطتها الاستراتيجية</label>
            <input type="text" id="current-department-name" name="current-department-name" readonly value='{{$form_values->university_relationship}}'>
        </div>
        <div class="form-group">
            <label for="proposed-department-name">مبررات استحداث البرنامج</label>
            <input type="text" id="proposed-department-name" name="proposed-department-name" readonly value='{{$form_values->reasons_for_creation}}'>
        </div>
        <div class="form-group">
            <label for="program-goals">أهداف البرنامج:</label>
            <textarea id="program-goals" name="program-goals" rows="4" readonly value='{{$form_values->program_goals}}'></textarea>
        </div>
        
        <div class="form-group">
            <label for="program-status">البرنامج:</label>
            <select id="program-status" name="program-status" readonly value='{{$form_values->program_importance}}'>
                <option value="راكد">راكد</option>
                <option value="مشبع">مشبع</option>
                <option value="مكرر">مكرر</option>
                <option value="غير ذلك">غير ذلك</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="proposed-department-name">نتاجات التعلّم المستهدفة</label>
            <input type="text" id="proposed-department-name" name="proposed-department-name" readonly value='{{$form_values->learning_outcomes}}'>
        </div>
        <div class="form-group">
            <label for="similar-programs">البرامج المشابهة في الجامعات الأخرى:</label>
            <textarea id="similar-programs" name="similar-programs" rows="4" readonly value='{{$form_values->similar_programs}}'></textarea>
            <small>يُرجى توضيح البرامج المشابهة من حيث الاسم والمحتوى إذا كانت معروفة.</small>
        </div>
        <div class="form-group">
            <label for="differences">مدى اختلاف البرنامج والنقاط الرئيسية:</label>
            <textarea id="differences" name="differences" rows="6" readonly value='{{$form_values->differences}}'></textarea>
            <small>يرجى توضيح النقاط الرئيسية التي تميز البرنامج المقترح عن البرامج المشابهة في الجامعات الأخرى.</small>
        </div>
        <div class="form-group">
            <label for="similar-programs-international">أمثلة على البرامج المشابهة في الجامعات الخارجية:</label>
            <textarea id="similar-programs-international" name="similar-programs-international" rows="4" readonly value='{{$form_values->similar_programs_international}}'></textarea>
            <small>يرجى توضيح أمثلة على البرامج المشابهة للبرنامج المقترح من حيث الاسم والمحتوى في الجامعات خارج المملكة.</small>
        </div>
        <div class="form-group">
            <label for="expected-students">تقدير عدد الطلاب المتوقع قبولهم في البرنامج:</label>
            <input type="number" id="expected-students" name="expected-students" readonly value='{{$form_values->estimated_student_enrollment}}'>
        </div>
        
        <div class="form-group">
            <label for="beneficiary-organizations">الجهات المستفيدة من البرنامج:</label>
            <textarea id="beneficiary-organizations" name="beneficiary-organizations" rows="4" readonly value='{{$form_values->potential_beneficiaries}}'></textarea>
        </div>
        
        <div class="form-group">
            <label for="reasons-for-program">أسباب أخرى تستدعي استحداث البرنامج:</label>
            <textarea id="reasons-for-program" name="reasons-for-program" rows="6" readonly value='{{$form_values->reasons_for_program}}'></textarea>
        </div>
        
        <div class="form-group">
            <label for="related-specialization">هل سيتم إلغاء تخصص أخر مشابه أو ذو علاقة أو سيتم اتخاذ إجراءات خاصة بذلك؟</label>
            <textarea id="related-specialization" name="related-specialization" rows="4" readonly value='{{$form_values->related_specialization}}'></textarea>
        </div>
        <div class="form-group">
            <label for="economic-feasibility-study">الجدوى الاقتصادية والبحثية للبرنامج:</label>
            <textarea id="economic-feasibility-study" name="economic-feasibility-study" rows="8" readonly value='{{$form_values->economic_research_feasibility}}'></textarea>
        </div>
        <div class="form-group">
            <label for="unemployment-statistics">الإحصائيات والمسوحات حول نسبة البطالة في التخصص:</label>
            <textarea id="unemployment-statistics" name="unemployment-statistics" rows="6" readonly value='{{$form_values->unemployment_statistics}}'></textarea>
        </div>
        <div class="form-group">
            <label for="tuition-fees">الرسوم الدراسية المقترحة للساعة المعتمدة:</label>
            <input type="number" id="tuition-fees" name="tuition-fees"  readonly value='{{$form_values->proposed_tuition_fee}}'>
        </div>
        <div class="form-group">
            <label for="course-outlin">خطة القسم للحصول على مساهمات مالية للبرنامج</label>
            <textarea id="course-outline" name="course-outline" readonly value='{{$form_values->financial_contributions_plan}}'></textarea>
        </div>
        
        <div class="form-group">
            <label for="research-list">قائمة أعضاء هيئة التدريس:</label>
            <div class="table-responsive">
            <table id="faculty-table">
                <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>الاســــم الرباعي</th>
                        <th>تاريخ الميلاد</th>
                        <th>الجنسية</th>
                        <th>المؤهلات العلمية</th>
                        <th>مجال التخصص الدقيق</th>
                        <th>سنة التخرج</th>
                        <th>الجامعة المتخرج فيها</th>
                        <th>الرتبة الأكاديمية</th>
                        <th>تاريخ منح الرتبة</th>
                        <th>الجهة المانحة للرتبة</th>
                        <th>سنة التعيين بالقسم</th>
                        <th>ملاحظات</th>
                    </tr>
                </thead>
                <tbody id="faculty-data">
                @if($edu_instituation_sec->isEmpty())
                @else
                @php $num = 1 @endphp
                    @foreach ($edu_instituation_sec as $form)
                    <tr>
                        <td><input type="text" name="facultys[${rowCount}][number]" readonly value='{{$num}}' ></td>
                        <td><input type="text" name="facultys[${rowCount}][full_name]" readonly value='{{$form->Quad_name}}' ></td>
                        <td><input type="date" name="facultys[${rowCount}][birth_date]" readonly value='{{$form->birth_date}}' ></td>
                        <td><input type="text" name="facultys[${rowCount}][nationality]" readonly value='{{$form->Nationality}}' ></td>
                        <td><input type="text" name="facultys[${rowCount}][qualifications]" readonly value='{{$form->qualfication}}' ></td>
                        <td><input type="text" name="facultys[${rowCount}][specialization]" readonly value='{{$form->Specialization}}'></td>
                        <td><input type="number" name="facultys[${rowCount}][graduation_year]" readonly value='{{$form->Graduate_year}}' ></td>
                        <td><input type="text" name="facultys[${rowCount}][university]" readonly value='{{$form->university_graduated}}' ></td>
                        <td><input type="text" name="facultys[${rowCount}][academic_rank]" readonly value='{{$form->academic_rank}}'></td>
                        <td><input type="date" name="facultys[${rowCount}][rank_date]" readonly value='{{$form->Date_rank_granted}}'></td>
                        <td><input type="text" name="facultys[${rowCount}][rank_grantor]" readonly value='{{$form->rank_awarding}}'></td>
                        <td><input type="date" name="facultys[${rowCount}][appointment_year]" readonly value='{{$form->yaer_of_appointment}}' ></td>
                        <td><input type="text" name="facultys[${rowCount}][notes]" readonly value='{{$form->comments}}' ></td>
                    </tr>
                    @php $num++ @endphp
                    @endforeach
                @endif
                </tbody>
            </table>
            </div>
            <script src="script.js"></script>
        </div>
        
        
        <div class="form-group">
        <label for="research-list">قائمة بأبحاث أعضاء هيئة التدريس:</label>
        <div class="table-responsive">
        <table id="researches-table">
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>الاســــم الرباعي</th>
                    <th>اسم البحث</th>
                    <th>اسم المجلة</th>
                    <th>رقم العدد (رقم الصفحة)</th>
                    <th>قاعدة البيانات المنشور فيها</th>
                </tr>
            </thead>
            <tbody id="researches-data">
            @if($edu_instituation->isEmpty())
                @else
                @php $num = 1 @endphp
                    @foreach ($edu_instituation as $form)
                    <tr>
                        <td><input type="number" name="researches" readonly value='{{$num}}'></td>
                        <td><input type="text" name="researches" readonly value='{{$form->Quad_name}}'></td>
                        <td><input type="text" name="researches"readonly value='{{$form->search_name}}'></td>
                        <td><input type="text" name="researches"readonly value='{{$form->journal_name}}'></td>
                        <td><input type="number" name="researches" readonly value='{{$form->page_num}}'></td>
                        <td><input type="text" name="researches" readonly value='{{$form->database_published}}'></td>
                    </tr>
                    @php $num++ @endphp
                    @endforeach
            @endif
            </tbody>
        </table>
        </div>
        <script src="researches.js"></script>
    </div>
        
        <div class="form-group">
            <label for="technical-administrative-staff">قائمة بالكادر الفني والإداري:</label>
            <div id="technicians-container">
                <label>الفنيون</label>
                <div class="table-responsive">
                <table id="technicians-table">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>الاسم الرباعي</th>
                            <th>الجنسية</th>
                            <th>المؤهل الفني</th>
                            <th>عدد سنوات الخبرة</th>
                            <th>العمل الحالي</th>
                            <th>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody id="technicians-data">
                    @if($technicians_genralsec->isEmpty())
                    @else
                    @php $num = 1 @endphp
                        @foreach ($technicians_genralsec as $form)
                        <tr>
                            <td><input type="number" name="researches" readonly value='{{$num}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][full_name]"readonly value='{{$form->Quad_name}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][nationality]" readonly value='{{$form->Nationality}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][qualification]" readonly value='{{$form->qualfication_TEC_ADMIN}}'></td>
                            <td><input type="number" name="technicians[${technicianNumber}][experience_years]" readonly value='{{$form->year_of_Experiecne}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][current_job]" readonly value='{{$form->CURRENT_Work}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][notes]" readonly value='{{$form->comments}}'></td>
                        </tr>
                        @php $num++ @endphp
                            @endforeach
                @endif                    
                </tbody>
                </table>
                </div>
                
            </div>
        
            <div id="admins-container">
                <label>الإداريون</label>
                <div class="table-responsive">
                <table id="admins-table">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>الاسم الرباعي</th>
                            <th>الجنسية</th>
                            <th>المؤهل الإداري</th>
                            <th>عدد سنوات الخبرة</th>
                            <th>العمل الحالي</th>
                            <th>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody id="admins-data">
                    @if($administrators_genralsec->isEmpty())
                    @else
                    @php $num = 1 @endphp
                        @foreach ($administrators_genralsec as $form)
                        <tr>
                            <td><input type="number" name="researches" readonly value='{{$num}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][full_name]"readonly value='{{$form->Quad_name}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][nationality]" readonly value='{{$form->Nationality}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][qualification]" readonly value='{{$form->qualfication_TEC_ADMIN}}'></td>
                            <td><input type="number" name="technicians[${technicianNumber}][experience_years]" readonly value='{{$form->year_of_Experiecne}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][current_job]" readonly value='{{$form->CURRENT_Work}}'></td>
                            <td><input type="text" name="technicians[${technicianNumber}][notes]" readonly value='{{$form->comments}}'></td>
                        </tr>
                        @php $num++ @endphp
                            @endforeach
                @endif                                      </tbody>
                </table>
                </div>
                 <script src="technicians_admins.js"></script>
            </div>
        
           
        </div>

        <div class="form-group">
            <label for="research-list">قائمة بالمرافق والمعدات والأجهزة المطلوبة:</label>

            <div id="current-labs-container">
                <label>المشغلات/المختبرات الحالية</label>
                <div class="table-responsive">
                <table id="current-labs-table">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>اسم المشغل/المختبر</th>
                            <th>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody id="current-labs-data">
                    @if($dep_concerns->isEmpty())
                    @else
                    @php $num = 1 @endphp
                        @foreach ($dep_concerns as $form)
                        <tr>
                            <td><input type="number" name="researches" readonly value='{{$num}}'></td>
                            <td><input type="text" name="current_labs[${currentLabNumber}][lab_name]" readonly value='{{$form->name}}'></td>
                            <td><input type="text" name="current_labs[${currentLabNumber}][notes]" readonly value='{{$form->comment}}'></td>
                        </tr>
                        @php $num++ @endphp
                        @endforeach
                @endif                         </tbody>
                </table>
                </div>
            </div>
        
            <div id="proposed-labs-container">
                <label>المشغلات/المختبرات المقترحة</label>
                <div class="table-responsive">
                <table id="proposed-labs-table">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>اسم المشغل/المختبر</th>
                            <th>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody id="proposed-labs-data">
                    @if($dep_concerns_scintific->isEmpty())
                    @else
                    @php $num = 1 @endphp
                        @foreach ($dep_concerns_scintific as $form)
                        <tr>
                            <td><input type="number" name="researche" readonly value='{{$num}}'></td>
                            <td><input type="text" name="current_labs[${currentLabNumber}][lab_name]" readonly value='{{$form->name}}'></td>
                            <td><input type="text" name="current_labs[${currentLabNumber}][notes]" readonly value='{{$form->comment}}'></td>
                        </tr>
                        @php $num++ @endphp
                        @endforeach
                @endif                       </tbody>
                </table>
                </div>
            </div>
        
            <script src="labs.js"></script>
                </div>

        <div class="form-group">
            <label for="required-references-list">قائمة بالمراجع المطلوبة للبرنامج:</label>

    <div id="references-container">
    <div class="table-responsive">
        <table id="references-table">
            <thead>
                <tr>
                    <th>الرقم</th>
                    <th>المرجع المطلوب</th>
                    <th>متوفر/غير متوفر</th>
                    <th>ملاحظات</th>
                </tr>
            </thead>
            <tbody id="references-data">
            @if($program_ref->isEmpty())
                    @else
                    @php $num = 1 @endphp
                        @foreach ($program_ref as $form)
                        <tr>
                            <td><input type="number" name="researches" readonly value='{{$num}}'></td>
                            <td><input type="text" name="references[${referenceNumber}][required_reference]" readonly value='{{$form->ref_required}}'></td>
                            <td><input type="text" name="references[${referenceNumber}][status]" readonly value='{{$form->avilable_OR_not}}'></td>
                            <td><input type="text" name="references[${referenceNumber}][notes]" readonly value='{{$form->comments}}'></td>
                        </tr>
                        @php $num++ @endphp
                        @endforeach
                @endif 
            </tbody>
        </table>
    </div>
    </div>
     <script src="references.js"></script>
        </div>
        <div class="form-group">
            <label for="sending-plan-table">جدول خطة الإيفاد:</label>

            <div id="students-container">
            <div class="table-responsive">
                <table id="students-table">
                    <thead>
                        <tr>
                            <th>اسم الطالب الموفد</th>
                            <th>التخصص الدقيق</th>
                            <th>القسم /الكلية</th>
                            <th>عدد سنوات الابتعاث</th>
                            <th>اسم الجامعة</th>
                            <th>التصنيف العالمي للجامعة (QS , ARWU)</th>
                        </tr>
                    </thead>
                    <tbody id="students-data">
                    @if($international_students->isEmpty())
                    @else
                    @php $num = 1 @endphp
                        @foreach ($international_students as $form)
                        <tr>
                            <td><input type="text" name="students" readonly value='{{$form->stu_name}}'></td>
                            <td><input type="text" name="students" readonly value='{{$form->Specialization}}'></td>
                            <td><input type="text" name="students" readonly value='{{$form->collgeORsec}}'></td>
                            <td><input type="number" name="students" readonly value='{{$form->NO_scholarship}}'></td>
                            <td><input type="text" name="students" readonly value='{{$form->university_name}}'></td>
                            <td><input type="text" name="students" readonly value='{{$form->university_QR}}'></td>
                        </tr>
                        @php $num++ @endphp
                        @endforeach
                @endif                     </tbody>
                </table>
            </div>
            </div>
            <script src="students.js"></script>
        </div>
        <div class="form-group">
            <label for="department-mission">إتفاقيات ومحادثات مشتركة مع جهات أخرى حول البرنامج</label>
            <textarea id="department-mission" name="department-mission" readonly value='{{$form_values->agreements}}'></textarea>
        </div>
        <div class="form-group">
            <label for="justification">مدى تأثير البرنامج على غيره من البرامج الأكاديمية في الجامعة:</label>
            <textarea id="justification" name="justification" readonly value='{{$form_values->program_impact}}'></textarea>
        </div>
      
        <footer>
            <div class="signature-section">
                <div class="signature-line">
                    <label for="plan-committee-department">مقرر لجنة الخطة/ القسم:</label>
                    <input type="text" id="plan-committee-department" name="plan-committee-department"  readonly value='{{$form_values->plan_committee_department}}'placeholder="ادخل الاسم">
                </div>
                <div class="signature-line">
                    <label for="department-head">رئيس القسم:</label>
                    <input type="text" id="department-head" name="department-head" readonly value='{{$form_values->department_head}}' placeholder="ادخل الاسم">
                </div>
                <div class="signature-line">
                    <label for="plan-committee-college">مقرر لجنة الخطة/ الكلية:</label>
                    <input type="text" id="plan-committee-college" name="plan-committee-college" readonly value='{{$form_values->plan_committee_college}}' placeholder="ادخل الاسم">
                </div>
                <div class="signature-line">
                    <label for="dean">العميد:</label>
                    <input type="text" id="dean" name="dean"  readonly value='{{$form_values->dean}}'placeholder="ادخل الاسم">
                </div>
                
            </div>
        </footer>
        @if($userlvl ==$formlvl)
        <form id="myform" action="{{ url()->current() }}" method="POST">
            @csrf
            <div class="comment-section">
            <textarea id="comment" name="comment" placeholder="Add a comment"></textarea>
            </div>
            <div class="form-buttons">
                <button name="accept" class="accept-btn" value="1" >Accept</button>
                <button name="reject" class="reject-btn" value="1">Reject</button>
            </div>
            
        </form>
        @else
        <div class="comment-section">
            <textarea id="comment" value="{{$form_comments}}"readonly></textarea>
        </div>
        @endif
            

@endsection