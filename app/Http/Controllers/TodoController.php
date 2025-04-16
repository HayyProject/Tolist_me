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
        $todos = Todo::all();
        $notStart = Todo::where('status', 'pending')->get();
        // dd($notStart);
        $willStart = Todo::where('status', 'in_progress')->where('start_date', '>=', now()->copy()->subDay())->get();
        $finished = Todo::where('status', 'completed')->get();
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
}

