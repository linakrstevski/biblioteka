@extends('_layout.cork')

@section('content')

<h1>Листа на корисници:</h1>

 <div class="faq container">

<div class="faq-layouting layout-spacing">

    <div class="kb-widget-section">

        <div class="row justify-content-center">
        @foreach($users as $user)
            <div class="col-xxl-2 col-xl-3 col-lg-3 mb-lg-0 col-md-6 mb-3">
            
                <div class="card">
                    <div class="card-body">
                    <a href="{{ route('korisnik.prikazi', ['userId' => $user->id])}}">
                    <div class="card-icon mb-4">
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> -->
                            <img alt="avatar" src="https://0.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" class="rounded-circle">  
                        </div>
                           <h5 class='card-title mb-0'>  {{$user->name}} {{$user->surname}}</h5></a>
                       
                    </div>
                </div>
            </div>
            @endforeach
            </div>
                </div>
                </div>
                </div>

@endsection