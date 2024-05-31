
@extends('layouts.app2')

@section('content')

    <main class="main">
        
        <div class="last-buttons">
            <p>{{session('mssg')}}</p>
            <span id="last-buttons"></span>
            <button class="nav-button" onclick="buttonPressed('messegs', 'messegs')">forms for confirmation</button>

        </div>
        <div class="button-row">
            <button class="form-button" onclick="buttonPressed('Form 1', 'form2')">استحداث كلية</button>
            <button class="form-button" onclick="buttonPressed('Form 2', 'form1')">استحداث قسم اكاديمي</button>
        </div>
        <div class="button-row">
            <button class="form-button" onclick="buttonPressed('Form 3', 'form4')" 
            @foreach($no_permission as $lvl)
                @if($lvl == $userlvl)
                    disabled style="background-color:#d6d6d6;">استحداث برنامج اكاديمي</button>
                @endif
            @endforeach
            <button class="form-button" onclick="buttonPressed('Form 4', 'form3')">تعديل مسمى اكاديمي أو كلية</button>
        
        </div>
    </main>
    <script src="stylesheet.js"></script>
@endsection