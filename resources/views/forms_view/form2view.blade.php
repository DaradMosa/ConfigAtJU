@extends('layouts.view')

@section('content')
<body>
    <div class="contain">
        <div class="header">
            <h1>استحداث كلية</h1>
        </div>

        <div class="form-group">
            <label for="department-name">اسم الكلية</label>
            <input type="text" id="department-name" name="department-name" value="{{$form_values->college_name}}"readonly>
        </div>
        <div class="form-group">
            <label for="date">تاريخ تقديم الطلب:</label>
            <input type="date" id="date" name="date" value="{{$form_values->application_date}}"readonly>
        </div>
        <div class="form-group">
            <label for="course-outline">نبذة عن الكلية:</label>
            <textarea id="course-outline" name="course-outline"value="{{$form_values->description}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="department-mission">بيان علاقة الكلية برسالة الجامعة وخطتها الاستراتيجية:</label>
            <textarea id="department-mission" name="department-mission" value="{{$form_values->university_relationship}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="justification">أسباب استحداث الكلية:</label>
            <textarea id="justification" name="justification"value="{{$form_values->reasons_for_creation}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="academic-programs">البرامج الأكاديمية المنوي إنشاؤها داخل الكلية:</label>
            <textarea id="academic-programs" name="academic-programs"value="{{$form_values->academic_programs}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="economic-viability">الجدوى الاقتصادية والبحثية للكلية:</label>
            <textarea id="economic-viability" name="economic-viability"value="{{$form_values->economic_research_feasibility}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="required-staff">الكوادر الأكاديمية والإدارية المطلوبة لاستحداث الكلية:</label>
            <textarea id="required-staff" name="required-staff"value="{{$form_values->required_academic_staff}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="required-facilities">المرافق والمعدات والأجهزة المطلوبة لاستحداث الكلية:</label>
            <textarea id="required-facilities" name="required-facilities"value="{{$form_values->required_facilities}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="similar-departments">إتفاقيات ومحادثات مشتركة مع جهات أخرى حول الكلية:</label>
            <textarea id="similar-departments" name="similar-departments"value="{{$form_values->agreements}}"readonly></textarea>
        </div>
        <div class="form-group">
            <label for="internal-consultations">الاستشارات داخل الجامعة:</label>
            <p>يرجى التزويد بما يثبت استشارة القائمين على استحداث قسم للجهات المعنية في الجامعة مثل مركز الاعتماد وضمان الجودة ، ووحدة الشؤون المالية ، ووحدة القبول والتسجيل ، وعمادة البحث العلمي ، وكلية الدراسات العليا ، وغيرها... </p>
            <textarea  id="consultation-file" name="consultation-file"value="{{$form_values->internal_consultations}}"readonly></textarea>
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

@endsection
