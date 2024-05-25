
@extends('layouts.app2')

@section('content')

    <main class="main">
        
        <div class="last-buttons">
            <span id="last-buttons"></span>
            <button class="nav-button" onclick="buttonPressed('messegs', 'messegs')">forms for confirmation</button>

        </div>
        <div class="button-row">
            <button class="form-button" onclick="buttonPressed('Form 1', 'form2')">استحداث كلية</button>
            <button class="form-button" onclick="buttonPressed('Form 2', 'form1')">استحداث قسم اكاديمي</button>
        </div>
        <div class="button-row">
            <button class="form-button" onclick="buttonPressed('Form 3', 'form4')">استحداث برنامج اكاديمي</button>
            <button class="form-button" onclick="buttonPressed('Form 4', 'form3')">تعديل مسمى اكاديمي أو كلية</button>
        </div>
    </main>
    <script src="stylesheet.js"></script>
@endsection