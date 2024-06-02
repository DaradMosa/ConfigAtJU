@extends('layouts.view')

@section('content')
<form action="/form3" method="POST">
    @csrf
    <div class="contain">
        <div class="header">
            <h1>تعديل مسمى قسم أكاديمي / كلية</h1>
        </div>

        <div class="form-group">
            <label for="college-name">اسم الكلية</label>
            <input type="text" id="college-name" required name="college-name">
        </div>
        <div class="form-group">
            <label for="current-department-name">اسم القسم / الكلية الحالي</label>
            <input type="text" id="current-department-name" required name="current-department-name">
        </div>
        <div class="form-group">
            <label for="proposed-department-name">اسم القسم / الكلية المقترح</label>
            <input type="text" id="proposed-department-name" required name="proposed-department-name">
        </div>
        <div class="form-group">
            <label for="date">تاريخ تقديم الطلب:</label>
            <input type="date" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="course-outline">نبذة عن القسم / الكلية:</label>
            <textarea id="course-outline" name="course-outline"></textarea>
        </div>
        <div class="form-group">
            <label for="department-mission">بيان علاقة القسم / الكلية برسالة الجامعة وخطتها الاستراتيجية:</label>
            <textarea id="department-mission" name="department-mission"></textarea>
        </div>
        <div class="form-group">
            <label for="justification">مبررات تعديل مسمى القسم / الكلية:</label>
            <textarea id="justification" name="justification"></textarea>
        </div>
        <div class="form-group">
            <label for="academic-programs">الجدوى الاقتصادية والبحثية المرجوة من التعديل:</label>
            <textarea id="academic-programs" name="academic-programs"></textarea>
        </div>
        <div class="form-group">
            <label for="required-staff">الكوادر الأكاديمية والإدارية المطلوبة بعد تعديل المسمى:</label>
            <textarea id="required-staff" name="required-staff"></textarea>
        </div>
        <div class="form-group">
            <label for="required-facilities">المرافق والمعدات والأجهزة المطلوبة لتعديل المسمى:</label>
            <textarea id="required-facilities" name="required-facilities"></textarea>
        </div>
        <div class="form-group">
            <label for="similar-departments">مدى تأثير تعديل المسمى على البرامج المطروحة في القسم او الكلية من حيث الحاجة الى تعديل مسمياتها او / و تعديل خططها واعتمادها الخاص و على غيره من الأقسام او الكليات في الجامعة :</label>
            <textarea id="similar-departments" name="similar-departments"></textarea>
        </div>
        <div class="form-group">
            <label for="internal-consultations">الاستشارات داخل الجامعة:</label>
            <p>يرجى التزويد بما يثبت استشارة القائمين على استحداث قسم للجهات المعنية في الجامعة مثل مركز الاعتماد وضمان الجودة ، ووحدة الشؤون المالية ، ووحدة القبول والتسجيل ، وعمادة البحث العلمي ، وكلية الدراسات العليا ، وغيرها... </p>
            <textarea id="consultation-file" name="consultation-file"></textarea>
        </div>
      
        <div class="centered-button">
            <button class="submit-button">Submit</button>
          </div>
    </div>
</form>
@endsection