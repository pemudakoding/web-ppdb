@extends('layouts.default')

@section('content')
<section id="hero" class="h-full flex items-start md:items-center">
    <div class="container mt-24 mb:mt-0 mx-auto flex flex-col-reverse md:flex-row items-center ">
        <div class="left text-white w-full md:w-7/12">
            <section id="title ">
                <h1 class="font-fredoka text-4xl md:text-3xl lg:text-6xl  text-center md:text-left">Selamat Datang di</h1>
                <h2 class="font-fredoka text-xl md:text-2xl lg:text-4xl -mt-1 md:-mt-4  text-center md:text-left">PPDB - {{$webInformation->name}}</h2>
                <p class="paragraph font-semibold text-sm text-gray-300 text-center mt-1 md:mt-0 md:text-left">{{$webInformation->description}}</p>
            </section>
            <section id="button" class="mt-8 text-center md:text-left">
                <a href="{{route('register')}}" class="shadow px-12 py-2 bg-blue-600 hover:bg-blue-700 transition-all duration-100 rounded font-bold">Daftar</a>
                <a href="{{route('register.getData')}}" class="shadow ml-4 px-8 py-2  hover:bg-white hover:text-blue-600 transition-all duration-100 rounded font-bold">Cek Pendaftar</a>
            </section>

        </div>
        <div class="right w-6/12 md:w-5/12 mb-4 md:mb-0">
            <img src="{{ asset('img/illustration/backtoSchool.svg') }}" alt="Back To School">
        </div>
    </div>
</section>
@endsection
