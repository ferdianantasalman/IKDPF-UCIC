<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $data = Question::all();

        $type_menu = 'dashboard';

        return view('admin.question.index', compact('user', 'data', 'type_menu'));
    }

    public function index_atasan(): View
    {
        $user = auth()->user();

        $data = Question::where('status', '=', "atasan")->get();

        $type_menu = 'dashboard';

        return view('admin.question_atasan.index', compact('user', 'data', 'type_menu'));
    }

    public function index_mahasiswa(): View
    {
        $user = auth()->user();

        $data = Question::where('status', '=', "mahasiswa")->get();

        $type_menu = 'dashboard';

        return view('admin.question_mahasiswa.index', compact('user', 'data', 'type_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('admin.question.create', compact('user', 'type_menu'));
    }

    public function create_atasan(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('admin.question_atasan.create', compact('user', 'type_menu'));
    }

    public function create_mahasiswa(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('admin.question_mahasiswa.create', compact('user', 'type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'question_text' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',
            'tipe' => 'required',
            'status' => 'required',

        ], [
            'question_text.required' => 'Pertanyaan wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik wajib diisi',
            'tipe.required' => 'tipe jawaban wajib diisi',
            'status.required' => 'Status jawaban wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'question_text' => $request->input('question_text'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'tipe' => $request->input('tipe'),
            'status' => $request->input('status'),
        ];

        Question::create($data);

        $type_menu = 'dashboard';

        return redirect('/admin/pertanyaan')->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function store_atasan(Request $request): RedirectResponse
    {
        $request->validate([

            'question_text' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',
            'tipe' => 'required',

        ], [
            'question_text.required' => 'Pertanyaan wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik wajib diisi',
            'tipe.required' => 'tipe jawaban wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'question_text' => $request->input('question_text'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'tipe' => $request->input('tipe'),
            'status' => 'atasan',
        ];

        Question::create($data);

        $type_menu = 'dashboard';

        return redirect('/admin/pertanyaan_atasan')->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function store_mahasiswa(Request $request): RedirectResponse
    {
        $request->validate([
            'question_text' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',
            'tipe' => 'required',

        ], [
            'question_text.required' => 'Pertanyaan wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik wajib diisi',
            'tipe.required' => 'tipe jawaban wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'question_text' => $request->input('question_text'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'tipe' => $request->input('tipe'),
            'status' => 'mahasiswa',
        ];

        Question::create($data);

        $type_menu = 'dashboard';

        return redirect('/admin/pertanyaan_mahasiswa')->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question): View
    {
        return view('admin.question.show', compact('kinerja_pendidikan'));
    }

    public function show_atasan(Question $question): View
    {
        return view('admin.question_atasan.show', compact('kinerja_pendidikan'));
    }

    public function show_mahasiswa(Question $question): View
    {
        return view('admin.question_mahasiswa.show', compact('kinerja_pendidikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = auth()->user();

        $data = Question::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.question.edit', compact('user', 'data', 'type_menu'));
    }

    public function edit_atasan($id): View
    {
        $user = auth()->user();

        $data = Question::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.question_atasan.edit', compact('user', 'data', 'type_menu'));
    }

    public function edit_mahasiswa($id): View
    {
        $user = auth()->user();

        $data = Question::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.question_mahasiswa.edit', compact('user', 'data', 'type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'question_text' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',
            'tipe' => 'required',
            'status' => 'required',

        ], [
            'question_text.required' => 'Pertanyaan wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik wajib diisi',
            'tipe.required' => 'tipe jawaban wajib diisi',
            'status.required' => 'Status jawaban wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'question_text' => $request->input('question_text'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'tipe' => $request->input('tipe'),
            'status' => $request->input('status'),
        ];


        $question = Question::findOrFail($id);

        $question->update($data);

        $type_menu = 'dashboard';

        return redirect('/admin/pertanyaan')->with([
            'message' => 'Kinerja Pendidikan berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function update_atasan(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'question_text' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',
            'tipe' => 'required',
        ], [
            'question_text.required' => 'Pertanyaan wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik wajib diisi',
            'tipe.required' => 'tipe jawaban wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'question_text' => $request->input('question_text'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'tipe' => $request->input('tipe'),
            'status' => 'atasan',
        ];


        $question = Question::findOrFail($id);

        $question->update($data);

        $type_menu = 'dashboard';

        return redirect('/admin/pertanyaan_atasan')->with([
            'message' => 'Kinerja Pendidikan berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function update_mahasiswa(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'question_text' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',
            'tipe' => 'required',
        ], [
            'question_text.required' => 'Pertanyaan wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik wajib diisi',
            'tipe.required' => 'tipe jawaban wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'question_text' => $request->input('question_text'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'tipe' => $request->input('tipe'),
            'status' => 'mahasiswa',
        ];


        $question = Question::findOrFail($id);

        $question->update($data);

        $type_menu = 'dashboard';

        return redirect('/admin/pertanyaan_mahasiswa')->with([
            'message' => 'Kinerja Pendidikan berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $question = Question::findOrFail($id);

        $question->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/pertanyaan')->with([
            'message' => 'Kinerja Pengabdian berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function destroy_atasan($id): RedirectResponse
    {
        $question = Question::findOrFail($id);

        $question->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/pertanyaan_atasan')->with([
            'message' => 'Kinerja Pengabdian berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function destroy_mahasiswa($id): RedirectResponse
    {
        $question = Question::findOrFail($id);

        $question->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/pertanyaan_mahasiswa')->with([
            'message' => 'Kinerja Pengabdian berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }
}
