@extends("master")


@section("title")
    Student Srofile
@endsection

@section("content")
    @livewire('show-student-profile-component' , ['student'=>$student])
@endsection



















