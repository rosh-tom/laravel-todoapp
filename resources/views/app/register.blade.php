@extends('layouts.master')

@section('content')
  <form action="{{ route('register') }}" method="post">
    @csrf 
    <div class="min-h-screen flex justify-center items-center">
        <div class="space-y-2">
            <div>
                <h1 class="text-center">Register</h1>
            </div>

            <div class="w-full">
                <input 
                    type        = "text"
                    class       = "border p-2 focus:outline-none rounded @error('firstname') border-red-500 @enderror"
                    placeholder = "Firstname"
                    name="firstname"
                    value="{{ old('firstname') }}"
                >
                @error('firstname')
                  <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input 
                    type        = "text"
                    class       = "border p-2 focus:outline-none rounded @error('lastname') border-red-500 @enderror"
                    placeholder = "Lastname"
                    name="lastname"
                    value="{{ old('lastname') }}"
                >
                @error('lastname')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input 
                    type        = "text"
                    class       = "border p-2 focus:outline-none rounded @error('username') border-red-500 @enderror"
                    placeholder = "username"
                    name="username"
                    value="{{ old('username') }}"
                >
                @error('username')
                    <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input 
                    type        = "password"
                    class       = "border p-2 focus:outline-none rounded @error('password') border-red-500 @enderror"
                    placeholder = "Password"
                    name="password" 
                > 
            </div>
            <div>
                <input 
                    type        = "password"
                    class       = "border p-2 focus:outline-none rounded @error('password') border-red-500 @enderror"
                    placeholder = "Confirm your password"
                    name="password_confirmation"
                >
                @error('password')
                  <p class="text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div> 
                @if (Session::has('message'))
                    <p class="text-xs text-red-500">{{ Session::get('message') }}</p>
                @endif 
            </div>
            <div>
                <button class="bg-green-500 p-2 w-full rounded">Register</button>
            </div>
            <div>
                <a href="{{ route('login') }}" class="text-blue-500">Already have an account.</a>
            </div>
        </div>
    </div>
  </form> 
@endsection