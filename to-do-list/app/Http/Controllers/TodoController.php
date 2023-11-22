<?php

namespace App\Http\Controllers;
use App\Models\todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index(){
    $todo = todo::all();
    return view('index')->with('todos', $todo);

    }
    public function create(){
        return view('create');
    }
    public function details(todo $todo){
        return view('details')->with('todos',$todo);

    }

    public function edit(todo $todo){

        return view('edit')->with('todos', $todo);

    }
    public function update(todo $todo){

        //we will write codes for updating a todo here
                try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

       
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');

    }

    public function delete(Todo $todo){

        $todo->delete();

        return redirect('/');

    }
     public function store(Request $request){


        // try {
        //     $this->validate(request(), [
        //         'name' => ['required'],
        //         'description' => ['required']
        //     ]);
        // } catch (ValidationException $e) {
        // }

        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required'
        // ]);


        $todo = new todo;
        //On the left is the field name in DB and on the right is field name in Form/view
        $todo->name = $request->input('name');
        $todo->description = $request->input('description');
        $todo->save();

        session()->flash('success', 'Todo created succesfully');

        return redirect('/');



    }
}
