@extends('layouts.app3')

@section('content')
<form action="/form2" method="POST">
    @csrf
    <div class="contain">
        <div class="header">
            <h1>استحداث كلية</h1>
        </div>

        <div class="form-group">
            <label for="department-name">اسم الكلية</label>
            <input type="text" id="department-name" name="department-name">
        </div>
        <div class="form-group">
            <label for="date">تاريخ تقديم الطلب:</label>
            <input type="date" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="course-outline">نبذة عن الكلية:</label>
            <textarea id="course-outline" name="course-outline"></textarea>
        </div>
        <div class="form-group">
            <label for="department-mission">بيان علاقة الكلية برسالة الجامعة وخطتها الاستراتيجية:</label>
            <textarea id="department-mission" name="department-mission"></textarea>
        </div>
        <div class="form-group">
            <label for="justification">أسباب استحداث الكلية:</label>
            <textarea id="justification" name="justification"></textarea>
        </div>
        <div class="form-group">
            <label for="academic-programs">البرامج الأكاديمية المنوي إنشاؤها داخل الكلية:</label>
            <textarea id="academic-programs" name="academic-programs"></textarea>
        </div>
        <div class="form-group">
            <label for="economic-viability">الجدوى الاقتصادية والبحثية للكلية:</label>
            <textarea id="economic-viability" name="economic-viability"></textarea>
        </div>
        <div class="form-group">
            <label for="required-staff">الكوادر الأكاديمية والإدارية المطلوبة لاستحداث الكلية:</label>
            <textarea id="required-staff" name="required-staff"></textarea>
        </div>
        <div class="form-group">
            <label for="required-facilities">المرافق والمعدات والأجهزة المطلوبة لاستحداث الكلية:</label>
            <textarea id="required-facilities" name="required-facilities"></textarea>
        </div>
        <div class="form-group">
            <label for="similar-departments">إتفاقيات ومحادثات مشتركة مع جهات أخرى حول الكلية:</label>
            <textarea id="similar-departments" name="similar-departments"></textarea>
        </div>
        <div class="form-group">
            <label for="internal-consultations">الاستشارات داخل الجامعة:</label>
            <p>يرجى التزويد بما يثبت استشارة القائمين على استحداث قسم للجهات المعنية في الجامعة مثل مركز الاعتماد وضمان الجودة ، ووحدة الشؤون المالية ، ووحدة القبول والتسجيل ، وعمادة البحث العلمي ، وكلية الدراسات العليا ، وغيرها... </p>
            <textarea id="consultation-file" name="consultation-file"></textarea>
        </div>
        <div class="footer">
            <p contenteditable="true">مركز الاعتماد وضمان الجودة:____________________________ التوقيع____________________________</p>
            <p contenteditable="true">مجلس العمداء:____________________________ التوقيع____________________________</p>
            <p contenteditable="true">مجلس الأمناء:____________________________ التوقيع____________________________</p>
        </div>
        <div class="centered-button">
            <button class="submit-button">Submit</button>
          </div>
    </div>
</form>

@endsection