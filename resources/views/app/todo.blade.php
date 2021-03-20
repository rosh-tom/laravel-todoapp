@extends('layouts.master')

@section('content')
    <h1>Hi {{ Auth::user()->firstname }}</h1>
    <h1>This is a Todo</h1>
    
    <div>
        @if (Session::has('message'))
            <div>
                <p class="text-xs text-green-500">
                    {{ Session::get('message') }}
                </p>
            </div>
        @endif 
       
        <form action="{{ route('todo') }}" method="post">
            @csrf
            <input type="text" name="todo" class="@if($errors->any()) border-red-500 @endif rounded border focus:outline-none"> <button>Add Todo</button>
        </form>
        @error('todo')
            <p class="text-xs text-red-500">{{ $message }}</p>
        @enderror
        @error('failed')
        <p class="text-red-500 text-xs">{{ $errors->first() }}</p>
        @endif
        
    </div>
  
    <hr>
    <div class="mt-2">
        @if (!count($todos))
            <p class="">No todo Available</p>
        @endif
        
        @foreach ($todos as $todo)  
                <div class="mb-4"> 
                    <form action="{{ route('todo.delete', $todo) }}" method="post" class="">
                        <div>
                        {{$todo->todo}} 
                        <p class="text-xs">{{ $todo->updated_at->diffForHumans() }}</p>

                        </div>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs border rounded bg-red-500 px-2 py-1 text-white">Delete</button>
                 
                        <a href="{{ route('edit', $todo->id) }}" class="text-xs border rounded bg-blue-500 px-2 py-1">
                            Edit
                        </a>
                    </form> 
                </div>    
            
        @endforeach 
    </div>
    

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="border bg-red-500 px-2 rounded hover:text-white">Logout</button>
    </form>
@endsection