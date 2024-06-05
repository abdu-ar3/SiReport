<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Todo;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $todos = Todo::where('user_id', auth()->user()->id)->where('is_completed', false)->get();
        $completedTodos = Todo::where('user_id', auth()->user()->id)->where('is_completed', true)->get();

        return view('staff.index', compact('todos', 'completedTodos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd('Ya masuk');
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'due_date' => 'required|date',
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->start_date = $request->start_date;
        $todo->due_date = $request->due_date;
        $todo->user_id = auth()->user()->id; // Jika menggunakan autentikasi pengguna

        $todo->save();

        return redirect()->back()->with('success', 'To-Do berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $todo = Todo::findOrFail($id);

        $todo->delete();

        return redirect()->back()->with('success', 'To-do berhasil dihapus!');
    }

    public function pdf()
    {
        return view('staff.cetak');
    }

    public function complete(Request $request, Todo $todo)
    {
        // Cek apakah to-do milik pengguna yang sedang login
        if ($todo->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki hak untuk mengupdate to-do ini.');
        }

        $todo->is_completed = !$todo->is_completed;
        $todo->save();

        return redirect()->back()->with('success', 'Status to-do berhasil diperbarui!');
    }

      public function generateReport(Request $request)
    {
        // dd('test');
         $request->validate([
            'due_date' => 'required|date',
        ]);

        $submitDate = $request->input('due_date');
        $userId = auth()->user()->id;

        $todos = Todo::where('user_id', $userId)
                ->whereDate('due_date', $submitDate)
                ->get();

        // Debugging: Lihat data yang diambil
        $pdf = PDF::loadView('staff.report', [
            'todos' => $todos,
            'user' => auth()->user(),
            'due_date' => $submitDate,
            'download_date' => now()->format('Y-m-d H:i:s'),
        ]);

        return $pdf->download('todo_report_' . $submitDate . '.pdf', 'todos');
    }
}
