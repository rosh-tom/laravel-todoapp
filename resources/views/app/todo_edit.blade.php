@extends('layouts.master')

@section('content')
    <a href="{{ route('todo') }}">TODO</a>
    <h1>Edit TOdo</h1>
    <form action="{{ route('todo.update', $todo->id) }}" method="post"> 
        @csrf
        @method('put')
        <input type="text" class="border p-2 @error('todo') border-red-500 @enderror" value="{{ old('todo') }}" name="todo" placeholder="{{ $todo->todo }}">
          <button class="bg-green-500 p-2 rounded hover:text-white">Save</button>
          @error('todo')
          <p class="text-xs text-red-500">{{ $message }}</p>
      @enderror
    </form>
@endsection