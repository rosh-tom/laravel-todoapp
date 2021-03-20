@extends('layouts.master')

@section('content')

    <div class="min-h-screen flex justify-center items-center"> 
        
        <form action="{{ route('login') }}" method="post">
            @csrf
                <div class="space-y-2">
                    <div>
                        <h1 class="text-center">Log In</h1>
                    </div>  
                    
                    <div>
                        @if (Session::has('message'))
                            <p>{{ Session::get('message') }}</p>
                        @endif
                        @if ($errors->any())
                            <p class="text-red-500 text-xs">{{ $errors->first() }}</p>
                        @endif
                    </div>
                    <div> 
                        <input 
                            type        = "text" 
                            class       = "border p-2 focus:outline-none" 
                            placeholder = "Username"
                            name        = "username"
                            value="{{ old('username') }}"
                        > 
                    </div>

                    <div>
                        <input 
                            type        = "password" 
                            class       = "border p-2 focus:outline-none" 
                            placeholder = "Password"
                            name        = "password"
                        >
                    </div>

                    <div> 
                        <button 
                            id="btn_login"
                            type="submit" 
                            class="bg-blue-500 w-full p-2 rounded"
                            >Login
                        </button> 
                    </div> 

                    <div id="loading" class="hidden cursor-not-allowed w-full bg-blue-300 p-2.5 rounded text-sm items-center justify-center space-x-4"> 
                        <div class="">  
                            <img src="{{asset('images/spinner.svg')}}" alt="" class="h-5 animate-spin m-auto">  
                        </div> 
                        <div class="text-gray-800">
                            Logging In
                        </div>
                    </div>
                      

                    <div>
                        <a href="{{ route('register') }}" class="text-blue-500 text-sm">Dont have an accout yet?</a>
                    </div> 
                </div> 
        </form> 
    </div>
     


    <script>
        const btn_login = document.querySelector('#btn_login');
        const loading = document.querySelector('#loading');

        btn_login.addEventListener("click", () => {
            btn_login.classList.add('hidden');

            loading.classList.replace('hidden', 'flex');
        });
    </script>

@endsection