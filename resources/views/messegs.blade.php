
@extends('layouts.messegs')

@section('content')

<div class="list-container">
    @if($forms_for_confirmation->isEmpty())
        @else
            <p>In need of action</p>
            @foreach ($forms_for_confirmation as $form)
            <div class="form-item" id="list1">
            <a href="/view/{{ $form->id }}">
            <div>{{ $form->name }} submited at: {{ $form->date }}</div>
            <div class="stats">
                <p>waiting your confirmation</p>
            </div>
        </a>
    </div>
            @endforeach
    @endif
    @if($forms_status->isEmpty())
            @else
                <p>Awaiting response</p>
                @foreach ($forms_status as $form)
                    <div class="form-item" id="list1">
                            <a href="/view/{{ $form->id }}">
                            <div>{{ $form->name }}  submited at: {{ $form->date }}</div>
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
            @if($forms_status_fin->isEmpty())
            @else
            <p>Finalized requests</p>
                @foreach ($forms_status_fin as $form)
                    <div class="form-item" id="list1">
                            <a href="/view/{{ $form->id }}">
                            <div>{{ $form->name }}  submited at: {{ $form->date }}</div>
                            <div class="stats">
                                <p>status: {{$form->status}} by
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