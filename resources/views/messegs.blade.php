
@extends('layouts.messegs')

@section('content')

<div class="list-container">
    @if($forms_for_confirmation->isEmpty())
        @else
            @foreach ($forms_for_confirmation as $form)
            <div class="form-item" id="list1">
            <a href="/view/{{ $form->id }}">
            <div>{{ $form->id }} {{ $form->date }}</div>
            <div class="stats">
                <p>waiting your confirmation</p>
            </div>
        </a>
    </div>
            @endforeach
    @endif
    @if($forms_status->isEmpty())
            @else
                @foreach ($forms_status as $form)
                    <div class="form-item" id="list1">
                            <a href="/view/{{ $form->id }}">
                            <div>{{ $form->id }} {{ $form->date }}</div>
                            <div class="stats">
                                <p>status: waiting confirmation from 
                                @foreach ($username as $user)
                                @if ($user->level == $form->level &&($user->college ==  $form->college ||$user->college ==  'UJ'))
                                    {{ $user->name }}
                                @endif
                                @endforeach
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
   
   
</div>

@endsection