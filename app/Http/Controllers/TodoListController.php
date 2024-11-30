<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = TodoList::orderBy("created_at","desc")->get();
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'due_date'=> 'required|date',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }

        $user = Auth::user();
        TodoList::create([
            'name'=> $request->name,
            'title'=> $request->title,
            'description'=> $request->description,
            'due_date'=> $request->due_date,
            'user_id'=> $user->id
        ]);
        return redirect()->route('todos.index')->with('success','Todo created successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todos = TodoList::find($id);
        return view('todo.edit', compact('todos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'due_date'=> 'required|date',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors())->withInput();
        }

        $user = Auth::user();
        $todos = TodoList::find($id);
        $todos->name = $request->name;
        $todos->title = $request->title;
        $todos->description = $request->description;
        $todos->due_date = $request->due_date;
        $todos->user_id = $user->id;
        $todos->save();
        return redirect()->route('todos.index')->with('success','Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $todo = TodoList::find($id);
        $todo->delete();
        return redirect('/todos')->with('success', 'Todo deleted successfully');
    }
}
