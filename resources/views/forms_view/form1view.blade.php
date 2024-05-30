@extends('layouts.view')

@section('content')
<div class="contain">
        <div class="header">
            <h1>استحداث قسم أكاديمي</h1>

        </div>
        <div class="form-group">
            <label for="department-name">اسم القسم</label>
            <input type="text" id="department-name" name="department-name" value="{{$form_values->department_name}}" readonly>
        </div>
        <div class="form-group">
            <label for="faculty">الكلية</label>
            <input type="text" id="faculty" name="faculty" value="{{$form_values->college}}" readonly>
        </div>
        <div class="form-group">
            <label for="date">تاريخ تقديم الطلب:</label>
            <input type="text" id="date" name="date" value="{{$form_values->application_date}}"readonly>
        </div>
        <div class="form-group">
            <label for="course-outline">نبذة عن القسم:</label>
            <textarea id="course-outline" name="course-outline"value="{{$form_values->description}}" readonly>Example outline...</textarea>
        </div>
        <div class="form-group">
            <label for="department-mission">بيان علاقة القسم برسالة الجامعة وخطتها الاستراتيجية:</label>
            <textarea id="department-mission" name="department-mission"value="{{$form_values->university_relationship}}" readonly>Example mission...</textarea>
        </div>
        <div class="form-group">
            <label for="justification">مبررات استحداث القسم:</label>
            <textarea id="justification" name="justification" value="{{$form_values->reasons_for_creation}}"readonly>Example justification...</textarea>
        </div>
        <div class="form-group">
            <label for="learning-outcomes">نتاجات التعلم المستهدفة:</label>
            <textarea id="learning-outcomes" name="learning-outcomes" value="{{$form_values->learning_outcomes}}"readonly>Example learning outcomes...</textarea>
        </div>
        <div class="form-group">
            <label for="academic-programs">البرامج الأكاديمية المنوي إنشاؤها في القسم:</label>
            <textarea id="academic-programs" name="academic-programs"value="{{$form_values->academic_programs}}" readonly>Example academic programs...</textarea>
        </div>
        <div class="form-group">
            <label for="economic-viability">الجدوى الاقتصادية والبحثية للقسم:</label>
            <textarea id="economic-viability" name="economic-viability" value="{{$form_values->economic_research_feasibility}}"readonly>Example economic viability...</textarea>
        </div>
        <div class="form-group">
            <label for="required-staff">الكوادر الأكاديمية والإدارية المطلوبة لاستحداث القسم:</label>
            <textarea id="required-staff" name="required-staff" value="{{$form_values->required_academic_staff}}"readonly>Example required staff...</textarea>
        </div>
        <div class="form-group">
            <label for="required-facilities">المرافق والمعدات والأجهزة المطلوبة لاستحداث القسم:</label>
            <textarea id="required-facilities" name="required-facilities" value="{{$form_values->required_facilities}}"readonly>Example required facilities...</textarea>
        </div>
        <div class="form-group">
            <label for="similar-departments">جامعات عالمية يوجد فيها أقسام أكاديمية بنفس المسمى:</label>
            <textarea id="similar-departments" name="similar-departments" value="{{$form_values->similar_departments}}"readonly>Example similar departments...</textarea>
        </div>
        <div class="form-group">
            <label for="agreements">اتفاقيات ومحادثات مشتركة مع جهات أخرى حول القسم:</label>
            <textarea id="agreements" name="agreements"value="{{$form_values->agreements}}" readonly>Example agreements...</textarea>
        </div>
        <div class="form-group">
            <label for="impact-on-other-departments">مدى تأثير القسم على غيره من الأقسام الأكاديمية في الجامعة:</label>
            <textarea id="impact-on-other-departments" value="{{$form_values->impact_on_other_departments}}"name="impact-on-other-departments" readonly>Example impact...</textarea>
        </div>
        <div class="form-group">
            <label for="internal-consultations">الاستشارات داخل الجامعة:</label>
            <p>يرجى التزويد بما يثبت استشارة القائمين على استحداث قسم للجهات المعنية في الجامعة مثل مركز الاعتماد وضمان الجودة ، ووحدة الشؤون المالية ، ووحدة القبول والتسجيل ، وعمادة البحث العلمي ، وكلية الدراسات العليا ، وغيرها...</p>
            <textarea type="file" id="consultation-file"value="{{$form_values->internal_consultations}}" name="consultation-file" redonly></textarea>
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
            <textarea id="comment" value="{{$form_comments}}"></textarea>
        </div>
        @endif
@endsection()