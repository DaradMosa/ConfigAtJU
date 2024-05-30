
@extends('layouts.messegs')

@section('content')
    <div class="container">
        <div class="logo-section">
            <img src="https://upload.wikimedia.org/wikipedia/commons/3/36/University_of_Jordan_Logo.svg" alt="Logo" class="logo">
        </div>
        <div>
        <ul>
            @if($forms_for_confirmation->isEmpty())
            @else
                @foreach ($forms_for_confirmation as $form)
                <li><a href="view?formid={{ $form->id }}">{{ $form->id }} and {{ $form->date }}</a></li>
                @endforeach
            @endif
            @if($forms_status->isEmpty())
            @else
                @foreach ($forms_status as $form)
                    <li> <a href="view?formid={{ $form->id }}">{{ $form->id }} and {{ $form->date }} staus waiting confirmation from 
                        @foreach ($username as $user)
                        @if ($user->level == $form->level)
                            {{ $user->name }}
                        @endif
                        @endforeach
                    </a></li>
                @endforeach
            @endif
        </ul>
        </div>
    </div>
</body>
</html>
@endsection