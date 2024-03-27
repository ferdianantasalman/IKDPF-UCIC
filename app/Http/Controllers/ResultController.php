<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Result;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        $results = Result::all();

        return view('admin.result.index', compact('user', 'type_menu', 'results'));
    }

    public function index_atasan()
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        $results = Result::where('category', '=', 'atasan')->get();

        if ($user->role == "admin") {
            return view('admin.result_atasan.index', compact('user', 'type_menu', 'results'));
        } else {
            return view('mahasiswa.test.index', compact('user', 'type_menu', 'results'));
        }
    }

    public function index_mahasiswa()
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        $results = Result::where('category', '=', 'mahasiswa')->get();

        if ($user->role == "admin") {
            return view('admin.result_atasan.index', compact('user', 'type_menu', 'results'));
        } else {
            return view('mahasiswa.test.index', compact('user', 'type_menu', 'results'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        $questions = Question::all()->pluck('question_text', 'id');

        $type_menu = 'dashboard';

        return view('admin.results.create', compact('data', 'questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = auth()->user();

        $result = Result::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.result.detail', compact('user', 'results', 'typer_menu'));
    }

    public function show_atasan($id)
    {
        $user = auth()->user();

        $result = Result::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.result_atasan.detail', compact('user', 'results', 'typer_menu'));
    }

    public function show_mahasiswa($id)
    {
        $user = auth()->user();

        $result = Result::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.result_mahasiswa.detail', compact('user', 'results', 'typer_menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }

    public function destroy_atasan($id): RedirectResponse
    {
        $result = Result::findOrFail($id);

        $result->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/hasil_atasan')->with([
            'message' => 'Kinerja Pengabdian berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function destroy_mahasiswa($id): RedirectResponse
    {
        $result = Result::findOrFail($id);

        $result->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/hasil_atasan')->with([
            'message' => 'Kinerja Pengabdian berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }
}
