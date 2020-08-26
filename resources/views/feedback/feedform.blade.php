@extends('layouts.app')


@section('content')

<i class="fas fa-check"></i>
<div class="sections feed">
    <div class="row">
        <div class="col-8">
        <div class="feedback  text-center section-header">
            @if (!empty($records))

            <form method="POST" action="/student/{{auth('student')->user()->id}}/feedback_form/{{$records->attributes['course_id']}}">
                <input name="instructor_id" type="hidden" value="{{$records->attributes['instructor_id']->get('0')}}">
                <input name="course_id" type="hidden" value="{{$records->attributes['course_id']}}">
                <input name="student_id" type="hidden" value="{{$records[0]->pivot->student_id}}">
                @csrf
                <div class=" feedback_header">
                    <h2> feedback for students </h2>
                    <div class="line">
                        <span></span>
                    </div>
                </div>
                @php
                $i = 1;
                @endphp
                <div>

                    <table>
                        <thead>
                            <tr>
                                <th class="head1">head</th>
                                <th><i class="far fa-angry fa-2x"></i></th>
                                <th><i class="far fa-frown fa-2x"></i></th>
                                <th><i class="far fa-grin fa-2x"></i></th>
                                <th><i class="far fa-grin-beam fa-2x"></i></th>
                            </tr>
                        </thead>

                        <tbody>
            @foreach ($records as $record)
                        <tr>
                            <td class="col-md-8">{{$record->question}} </td>
                            <td>
                                <input type="radio" id="check-{{$i}}"  name="record[{{$record->feedback_model_id}}][{{$record->id}}]" value="1">
                                <label for="check-{{$i}}" class="check-1"></label>
                            </td>
                            <td>
                                <input type="radio" id="check-{{$i += 1}}"  name="record[{{$record->feedback_model_id}}][{{$record->id}}]" value="2">
                                <label for="check-{{$i}}" class="check-2"></label>
                            </td>
                            <td>
                                <input type="radio" id="check-{{$i += 1}}"  name="record[{{$record->feedback_model_id}}][{{$record->id}}]" value="3">
                                <label for="check-{{$i}}" class="check-3"></label>
                            </td>
                            <td>
                                <input type="radio" id="check-{{$i += 1}}"  name="record[{{$record->feedback_model_id}}][{{$record->id}}]" value="4">
                                <label for="check-{{$i}}" class="check-4"></label>
                            </td>
                        </tr>
                        @php
                        $i += 1 ;
                        @endphp
             @endforeach
            </tbody>

        </table>
    </div>
    <button type="submit" class="btn btn-primary mb-2" style="padding: 2%"><strong>Feedback</strong> </button>
</form>
<br>

         @else
            <p>this is feedback not avilable
            </p>
         @endif
        </div>
    </div>
    </div>
</div>


@endsection
