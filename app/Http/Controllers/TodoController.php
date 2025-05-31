<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $userId = auth()->id();

    $todos = Todo::where('user_id', $userId)->get();
    $notStart = Todo::where('user_id', $userId)->where('status', 'pending')->get();
    $willStart = Todo::where('user_id', $userId)
        ->where('status', 'in_progress')
        ->where('start_date', '>=', now()->copy()->subDay())
        ->get();
    $finished = Todo::where('user_id', $userId)->where('status', 'completed')->get();

    return view('index', compact('todos', 'willStart', 'notStart', 'finished'));
}


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'status' => 'required|in:pending,in_progress,completed',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    if (Carbon::parse($validatedData['start_date'])->isToday()) {
        $validatedData['status'] = 'in_progress';
    }

    $validatedData['user_id'] = auth()->id(); // <== Tambahkan ini

    Todo::create($validatedData);

    return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:pending,in_progress,completed',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $todo->update($validatedData);

        return redirect()->route('todos.index')->with('success', 'Todo updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->back()->with('success', 'Todo deleted successfully.');
    }
   

    public function home()
    {
        return view('hometodo');
    }
public function loginForm(){
    return view('auth.login');
}
public function registerForm(){
    return view('auth.register');
}
   

}

