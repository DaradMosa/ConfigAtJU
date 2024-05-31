
@extends('layouts.view')

@section('content')
    <div class="contain">
        <div class="header">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/36/University_of_Jordan_Logo.svg" alt="شعار الجامعة" class="logo">
            <h1>تعديل مسمى قسم أكاديمي / كلية</h1>
            <img src="logo2.png" alt="شعار آخر" class="logo">
        </div>

        <div class="form-group">
            <label for="college-name">اسم الكلية</label>
            <input type="text" id="college-name" name="college-name" value="{{$form_values->college_name}}"readonly>
        </div>
        <div class="form-group">
            <label for="current-department-name">اسم القسم / الكلية الحالي</label>
            <input type="text" id="current-department-name" name="current-department-name" value="{{$form_values->current_name}}"readonly>
        </div>
        <div class="form-group">
            <label for="proposed-department-name">اسم القسم / الكلية المقترح</label>
            <input type="text" id="proposed-department-name" name="proposed-department-name" value="{{$form_values->proposed_name}}"readonly>
        </div>
        <div class="form-group">
            <label for="date">تاريخ تقديم الطلب:</label>
            <input type="text" id="date" name="date" value="{{$form_values->application_date}}"readonly>
        </div>
        <div class="form-group">
            <label for="course-outline">نبذة عن القسم / الكلية:</label>
            <textarea id="course-outline" name="course-outline" value="{{$form_values->description}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="department-mission">بيان علاقة القسم / الكلية برسالة الجامعة وخطتها الاستراتيجية:</label>
            <textarea id="department-mission" name="department-mission" value="{{$form_values->university_relationship}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="justification">مبررات تعديل مسمى القسم / الكلية:</label>
            <textarea id="justification" name="justification" value="{{$form_values->reasons_for_change}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="academic-programs">الجدوى الاقتصادية والبحثية المرجوة من التعديل:</label>
            <textarea id="academic-programs" name="academic-programs" value="{{$form_values->economic_research_feasibility}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="required-staff">الكوادر الأكاديمية والإدارية المطلوبة بعد تعديل المسمى:</label>
            <textarea id="required-staff" name="required-staff" value="{{$form_values->required_academic_staff}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="required-facilities">المرافق والمعدات والأجهزة المطلوبة لتعديل المسمى:</label>
            <textarea id="required-facilities" name="required-facilities" value="{{$form_values->required_facilities}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="similar-departments">مدى تأثير تعديل المسمى على البرامج المطروحة في القسم او الكلية من حيث الحاجة الى تعديل مسمياتها او / و تعديل خططها واعتمادها الخاص و على غيره من الأقسام او الكليات في الجامعة :</label>
            <textarea id="similar-departments" name="similar-departments" value="{{$form_values->impact_on_programs}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="internal-consultations">الاستشارات داخل الجامعة:</label>
            <p>يرجى التزويد بما يثبت استشارة القائمين على استحداث قسم للجهات المعنية في الجامعة مثل مركز الاعتماد وضمان الجودة ، ووحدة الشؤون المالية ، ووحدة القبول والتسجيل ، وعمادة البحث العلمي ، وكلية الدراسات العليا ، وغيرها... </p>
            <textarea type="file" id="consultation-file" name="consultation-file" value="{{$form_values->internal_consultations}}"readonly></textarea>
        </div>
        
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
       
        
    </div>
    
</body>
</html>
@endsection()