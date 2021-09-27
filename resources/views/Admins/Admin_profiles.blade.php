@extends("master")


@section("title" , 'Admin Profile')

@section("content")
    @livewire('show-admin-profile-component',['admin'=>$admin])
@endsection



















