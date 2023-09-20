@extends('layout.layout')

@section('adminindex')
    <div class="px-10 pt-5">
        <div class="text-4xl font-bold underline">
            Admin: {{$adminEmail['email']}}
        </div>
        
        <div class="mt-5">
            <a href="{{route('logout')}}" class="bg-black text-white p-2 rounded-md font-bold text-sm hover:bg-slate-700 hover:duration-300">LOGOUT</a>
        </div>
    </div>
@endsection

