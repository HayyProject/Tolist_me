<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    // Tentukan status berdasarkan tanggal
    $currentDate = now()->format('Y-m-d');
    $status = 'pending';
    
    if ($request->start_date <= $currentDate && $request->end_date >= $currentDate) {
        $status = 'in_progress';
    } elseif ($request->end_date < $currentDate) {
        $status = 'completed';
    }

    $todo = Todo::create(array_merge($validatedData, ['status' => $status]));

    return redirect()->route('todos.index')->with('success', 'Todo created successfully.');
}

    public function update(Request $request, Todo $todo)
    {
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|required|in:pending,in_progress,completed',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after_or_equal:start_date',
        ]);

        // Jika tanggal diupdate, periksa status
        if ($request->has('start_date') || $request->has('end_date')) {
            $currentDate = now()->format('Y-m-d');
            $startDate = $request->start_date ?? $todo->start_date;
            $endDate = $request->end_date ?? $todo->end_date;
            
            if ($startDate <= $currentDate && $endDate >= $currentDate) {
                $validatedData['status'] = 'in_progress';
            } elseif ($endDate < $currentDate) {
                $validatedData['status'] = 'completed';
            }
        }

        $todo->update($validatedData);

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

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

