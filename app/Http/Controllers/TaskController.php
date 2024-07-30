<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->get();
        return view('tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'assigned_by' => auth()->id(), // Asegúrate de que este campo se está asignando
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea asignada correctamente.');
    }

    public function edit(Task $task)
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'Alumno');
        })->get();
        
        return view('tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'assigned_by' => auth()->id(), // Asegúrate de que este campo se está asignando
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada con éxito.');
    }
    public function myTasks()
    {
        // Obtener el ID del usuario autenticado
        $userId = auth()->id();
    
        // Obtener las tareas asignadas a este usuario, incluyendo la información del usuario que asignó la tarea
        $tasks = Task::where('user_id', $userId)->with('assignedBy')->get();
    
        // Retornar la vista con las tareas
        return view('tasks.myTasks', compact('tasks'));
    }
    
  
    

}

