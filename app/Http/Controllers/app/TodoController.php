<?php

namespace App\Http\Controllers\app;
 
use App\Models\app\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        return view('app.todo', ['todos' => $todos]);
    }

    public function edit($id){
        $todo = Todo::find($id); 

        if(!$todo){
            return redirect()->route('todo')->withErrors([
                'failed' => 'Bulok man baja kaw'
            ]);
        } 
        return view('app.todo_edit', ['todo' => $todo]);
    }
    
    public function create(Request $request){
        $this->validate($request, [
            'todo' => 'required|max:255'
        ]);
         
        try {
            $todo = Todo::Create([
                'todo' => $request->todo,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('todo')->with('message', 'Todo Successfully added');

        } catch (\Throwable $th) {
            return back()->withErrors([
                'failed' => 'Save failed. something went wrong. please try again later',
            ]);
        } 
    }

    public function destroy(Todo $todo){

        if($todo->user_id != Auth::user()->id){
            return back()->withErrors([
                'failed' => 'Delete failed. something went wrong. please try again later',
            ]);
        } 
            $todo->delete();
                
            return back()->with('message', 'Successfully Deleted'); 

    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'todo' => 'required',
        ]); 

        $todo = Todo::findOrFail($id); 

        if(!$todo){
            return redirect()->route('todo')->withErrors([
                'failed' => 'Bulok man baja kaw'
            ]);
        } 

        $todo->update([
            'todo' => $request->todo
        ]);

        return redirect()->route('todo')->with('message', 'update successfull');

    }
}
