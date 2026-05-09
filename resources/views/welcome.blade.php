@extends('layouts.app')
@section('content')
 <div class="container pt-4">
   <div class="m-auto">
      <div class="card mt-4 mx-auto" style="width:50%">
         <div class="card-body">
            <div class="text-center">
               <h3>Selamat datang, di aplikasi praktikum web2 </h3>
               <p>Silahkan login dengan username dan password anda</p>
            </div>
            <div class="form">
               @session('success')
                   <div class="alert alert-success">
                     {{session('success')}}
                   </div>
               @endsession
               @if($errors->any())
                  <div class="alert alert-danger">
                     <ul class="mb-0">
                        @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                        @endforeach
                     </ul>
                  </div>
               @endif
               <form action="{{route('auth.loginStore')}}" method="post">
                  @csrf 
                  <div class="form-group mt-3">
                     <label for="">username</label>
                     <input type="text" name="username" id="username" class="form-control" placeholder="Masukan username ...">
                     @error('username')
                        <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                   <div class="form-group mt-3">
                     <label for="">password</label>
                     <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password ...">
                     @error('password')
                        <span class="text-danger">{{$message}}</span>
                     @enderror
                  </div>
                  <div class="form-group float-end mt-3">
                     <a href="{{route('auth.registerView')}}" class=" btn btn-success">Register</a>
                     <button type="submit" class="btn btn-primary">Login</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
 </div>
@endsection