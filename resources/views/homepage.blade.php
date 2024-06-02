
@extends('layouts.app2')

@section('content')
    @php
        $isDisabled1 = in_array($userlvl, $no_permission1);
        $isDisabled2 = in_array($userlvl, $no_permission2);
        $isDisabled3 = in_array($userlvl, $no_permission3);
        $isDisabled4 = in_array($userlvl, $no_permission4);

    @endphp
        
        <div class="last-buttons">
            <p>{{session('mssg')}}</p>
            <span id="last-buttons"></span>
            <button class="nav-button" onclick="buttonPressed('messegs', 'messegs')" >forms for confirmation</button>

        </div>
        <div class="button-row">
            <button class="form-button"
            @if($isDisabled1) 
                disabled 
                style="background-color:#d6d6d6;" 
            @endif  
    onclick="buttonPressed('Form 1', 'form2')" >استحداث كلية</button>
            <button class="form-button"    
            @if($isDisabled2) 
                disabled 
                style="background-color:#d6d6d6;" 
            @endif
     onclick="buttonPressed('Form 2', 'form1')" >استحداث قسم اكاديمي</button>
        </div>
        <div class="button-row">
            <button class="form-button"    
            @if($isDisabled3) 
                disabled 
                style="background-color:#d6d6d6;" 
            @endif
     onclick="buttonPressed('Form 3', 'form4')" >استحداث برنامج اكاديمي</button>
            <button class="form-button"    
            @if($isDisabled4) 
                disabled 
                style="background-color:#d6d6d6;" 
            @endif
     onclick="buttonPressed('Form 4', 'form3')" >تعديل مسمى اكاديمي أو كلية</button>
        
        </div>
    </main>
    <script src="stylesheet.js"></script>
@endsection