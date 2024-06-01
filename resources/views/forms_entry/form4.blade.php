@extends('layouts.view4')

@section('content')
<form action="/form4" method="POST">
    @csrf
    <div class="contain">
        <div class="header">
            <h1>مقترح استحداث برنامج أكاديمي</h1>
        </div>
        <div class="table-responsive">
        <table class="styled-table">
            <tr>
                <th>اسم البرنامج باللغة العربية</th>
                <td><input type="text" id="program-name-ar" name="program-name-ar"></td>
            </tr>
            <tr>
                <th>اسم البرنامج باللغة الإنجليزية</th>
                <td><input type="text" id="program-name-en" name="program-name-en"></td>
            </tr>
            <tr>
                <th>مستوى البرنامج</th>
                <td><input type="text" id="program-level" name="program-level"></td>
            </tr>
            <tr>
                <th>الدرجة العلمية للبرنامج</th>
                <td><input type="text" id="degree" name="degree"></td>
            </tr>
            <tr>
                <th>الكلية</th>
                <td><input type="text" id="faculty" name="faculty"></td>
            </tr>
            <tr>
                <th>القسم</th>
                <td><input type="text" id="department" name="department"></td>
            </tr>
            <tr>
                <th>توصية مجلس القسم (يذكر رقم الجلسة، رقم القرار وتاريخه)</th>
                <td><input type="text" id="department-recommendation" name="department-recommendation"></td>
            </tr>
            <tr>
                <th>توصية مجلس الكلية (يذكر رقم الجلسة، رقم القرار وتاريخه)</th>
                <td><input type="text" id="faculty-recommendation" name="faculty-recommendation"></td>
            </tr>
            <tr>
                <th>الأقسام الأخرى المشتركة في تدريس البرنامج</th>
                <td><input type="text" id="other-departments" name="other-departments"></td>
            </tr>
            <tr>
                <th>مدة البرنامج</th>
                <td><input type="text" id="program-duration" name="program-duration"></td>
            </tr>
            <tr>
                <th>لغة التدريس</th>
                <td><input type="text" id="language" name="language"></td>
            </tr>
            <tr>
                <th>تاريخ تقديم الطلب</th>
                <td><input type="date" id="submission-date" name="submission-date"></td>
            </tr>
        </table>
        </div>
        <div class="form-group">
            <label for="college-name">نبذة عن البرنامج المقترح</label>
            <input type="text" id="college-name" name="college-name">
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
                <td><input type="date" name="bachelor-start-date"></td>
                <td><input type="number" name="bachelor-current-students"></td>
                <td><input type="number" name="bachelor-graduates-last-3-years"></td>
            </tr>
            <tr>
                <td>ماجستير</td>
                <td><input type="date" name="masters-start-date"></td>
                <td><input type="number" name="masters-current-students"></td>
                <td><input type="number" name="masters-graduates-last-3-years"></td>
            </tr>
            <tr>
                <td>دبلوم عالي</td>
                <td><input type="date" name="diploma-start-date"></td>
                <td><input type="number" name="diploma-current-students"></td>
                <td><input type="number" name="diploma-graduates-last-3-years"></td>
            </tr>
            <tr>
                <td>دكتوراه</td>
                <td><input type="date" name="phd-start-date"></td>
                <td><input type="number" name="phd-current-students"></td>
                <td><input type="number" name="phd-graduates-last-3-years"></td>
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
            <input type="text" id="current-department-name" name="current-department-name">
        </div>
        <div class="form-group">
            <label for="proposed-department-name">مبررات استحداث البرنامج</label>
            <input type="text" id="proposed-department-name" name="proposed-department-name">
        </div>
        <div class="form-group">
            <label for="program-goals">أهداف البرنامج:</label>
            <textarea id="program-goals" name="program-goals" rows="4"></textarea>
        </div>
        
        <div class="form-group">
            <label for="program-status">البرنامج:</label>
            <select id="program-status" name="program-status">
                <option value="راكد">راكد</option>
                <option value="مشبع">مشبع</option>
                <option value="مكرر">مكرر</option>
                <option value="غير ذلك">غير ذلك</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="proposed-department-name">نتاجات التعلّم المستهدفة</label>
            <input type="text" id="proposed-department-name" name="proposed-department-name">
        </div>
        <div class="form-group">
            <label for="similar-programs">البرامج المشابهة في الجامعات الأخرى:</label>
            <textarea id="similar-programs" name="similar-programs" rows="4"></textarea>
            <small>يُرجى توضيح البرامج المشابهة من حيث الاسم والمحتوى إذا كانت معروفة.</small>
        </div>
        <div class="form-group">
            <label for="differences">مدى اختلاف البرنامج والنقاط الرئيسية:</label>
            <textarea id="differences" name="differences" rows="6"></textarea>
            <small>يرجى توضيح النقاط الرئيسية التي تميز البرنامج المقترح عن البرامج المشابهة في الجامعات الأخرى.</small>
        </div>
        <div class="form-group">
            <label for="similar-programs-international">أمثلة على البرامج المشابهة في الجامعات الخارجية:</label>
            <textarea id="similar-programs-international" name="similar-programs-international" rows="4"></textarea>
            <small>يرجى توضيح أمثلة على البرامج المشابهة للبرنامج المقترح من حيث الاسم والمحتوى في الجامعات خارج المملكة.</small>
        </div>
        <div class="form-group">
            <label for="expected-students">تقدير عدد الطلاب المتوقع قبولهم في البرنامج:</label>
            <input type="number" id="expected-students" name="expected-students">
        </div>
        
        <div class="form-group">
            <label for="beneficiary-organizations">الجهات المستفيدة من البرنامج:</label>
            <textarea id="beneficiary-organizations" name="beneficiary-organizations" rows="4"></textarea>
        </div>
        
        <div class="form-group">
            <label for="reasons-for-program">أسباب أخرى تستدعي استحداث البرنامج:</label>
            <textarea id="reasons-for-program" name="reasons-for-program" rows="6"></textarea>
        </div>
        
        <div class="form-group">
            <label for="related-specialization">هل سيتم إلغاء تخصص أخر مشابه أو ذو علاقة أو سيتم اتخاذ إجراءات خاصة بذلك؟</label>
            <textarea id="related-specialization" name="related-specialization" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="economic-feasibility-study">الجدوى الاقتصادية والبحثية للبرنامج:</label>
            <textarea id="economic-feasibility-study" name="economic-feasibility-study" rows="8"></textarea>
        </div>
        <div class="form-group">
            <label for="unemployment-statistics">الإحصائيات والمسوحات حول نسبة البطالة في التخصص:</label>
            <textarea id="unemployment-statistics" name="unemployment-statistics" rows="6"></textarea>
            <input type="text" id="unemployment-documents" name="unemployment-documents">
            <small>يرجى تقديم الإحصائيات والمسوحات الصادرة عن جهات رسمية تبين نسبة البطالة في هذا التخصص (إن وُجد) مع إرفاق الوثائق المطلوبة.</small>
        </div>
        <div class="form-group">
            <label for="tuition-fees">الرسوم الدراسية المقترحة للساعة المعتمدة:</label>
            <input type="number" id="tuition-fees" name="tuition-fees" >
        </div>
        <div class="form-group">
            <label for="course-outlin">خطة القسم للحصول على مساهمات مالية للبرنامج</label>
            <textarea id="course-outline" name="course-outline"></textarea>
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
                </tbody>
            </table>
            </div>
            <button  type="button" id="add-member-btn">إضافة عضو</button>
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
            </tbody>
        </table>
        </div>
        <button  type="button" id="add-research-btn">إضافة بحث</button>
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
                        <!-- الصفوف الموجودة في الجدول ستتم إضافتها هنا من خلال JavaScript -->
                    </tbody>
                </table>
                </div>
                <button  type="button" id="add-technician-btn">إضافة فني</button>
                
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
                        <!-- الصفوف الموجودة في الجدول ستتم إضافتها هنا من خلال JavaScript -->
                    </tbody>
                </table>
                </div>
                 <button  type="button" id="add-admin-btn">إضافة إداري</button> 
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
                        <!-- الصفوف الموجودة في الجدول ستتم إضافتها هنا من خلال JavaScript -->
                    </tbody>
                </table>
                </div>
                <button  type="button" id="add-current-lab-btn">إضافة مشغل/مختبر حالي</button>
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
                        <!-- الصفوف الموجودة في الجدول ستتم إضافتها هنا من خلال JavaScript -->
                    </tbody>
                </table>
                </div>
                <button  type="button" id="add-proposed-lab-btn">إضافة مشغل/مختبر مقترح</button>
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
                <!-- الصفوف الموجودة في الجدول ستتم إضافتها هنا من خلال JavaScript -->
            </tbody>
        </table>
    </div>
        <button  type="button" id="add-reference-btn">إضافة مرجع</button>
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
                        <!-- الصفوف الموجودة في الجدول ستتم إضافتها هنا من خلال JavaScript -->
                    </tbody>
                </table>
            </div>
                <button  type="button" id="add-student-btn">إضافة طالب موفد</button>
            </div>
            <script src="students.js"></script>
        </div>
        <div class="form-group">
            <label for="department-mission">إتفاقيات ومحادثات مشتركة مع جهات أخرى حول البرنامج</label>
            <textarea id="department-mission" name="department-mission"></textarea>
        </div>
        <div class="form-group">
            <label for="justification">مدى تأثير البرنامج على غيره من البرامج الأكاديمية في الجامعة:</label>
            <textarea id="justification" name="justification"></textarea>
        </div>
      
        <footer>
            <div class="signature-section">
                <div class="signature-line">
                    <label for="plan-committee-department">مقرر لجنة الخطة/ القسم:</label>
                    <input type="text" id="plan-committee-department" name="plan-committee-department" placeholder="ادخل الاسم">
                </div>
                <div class="signature-line">
                    <label for="department-head">رئيس القسم:</label>
                    <input type="text" id="department-head" name="department-head" placeholder="ادخل الاسم">
                </div>
                <div class="signature-line">
                    <label for="plan-committee-college">مقرر لجنة الخطة/ الكلية:</label>
                    <input type="text" id="plan-committee-college" name="plan-committee-college" placeholder="ادخل الاسم">
                </div>
                <div class="signature-line">
                    <label for="dean">العميد:</label>
                    <input type="text" id="dean" name="dean" placeholder="ادخل الاسم">
                </div>
                
            </div>
        </footer>
    <div class="centered-button">
        <button class="submit-button">Submit</button>
    </div>
            
    </form>
@endsection