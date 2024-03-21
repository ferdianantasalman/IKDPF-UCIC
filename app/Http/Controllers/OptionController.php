<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = auth()->user();

        $options = Option::all();

        $type_menu = 'dashboard';

        return view('admin.option.index', compact('user', 'options', 'type_menu'));
    }

    public function index_pertanyaan($question_id): View
    {
        $user = auth()->user();

        $question = Question::findOrFail($question_id);

        $options = Option::where('question_id', '=', $question_id)->get();

        $option_count = Option::where('question_id', '=', $question_id)->get()->count();

        // dd($option_count);

        $type_menu = 'dashboard';

        return view('admin.option_pertanyaan.index', compact('user', 'question', 'options', 'type_menu', 'option_count'));
    }

    public function index_atasan($question_id): View
    {
        $user = auth()->user();

        $options = Option::where('category_id', '=', 1)->get();

        $type_menu = 'dashboard';

        return view('admin.option.index', compact('user', 'options', 'type_menu'));
    }

    public function index_mahasiswa($question_id): View
    {
        $user = auth()->user();

        $options = Option::where('category_id', '=', 1)->get();

        $type_menu = 'dashboard';

        return view('admin.option.index', compact('user', 'options', 'type_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = auth()->user();

        $questions = Question::all()->pluck('question_text', 'id');

        $type_menu = 'dashboard';


        return view('admin.option.create', compact('user', 'data', 'type_menu'));
    }

    public function create_pertanyaan($question_id): View
    {
        $user = auth()->user();

        // $data = Question::all()->pluck('question_text', 'id');

        // $data = Question::where('id', '=', $question_id)->get();

        $question = Question::findOrFail($question_id);

        $type_menu = 'dashboard';


        return view('admin.option_pertanyaan.create', compact('user', 'question', 'type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'question_id' => 'required',
            'option_text' => 'required',
            'point' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',

        ], [
            'question_id.required' => 'Pertanyaan wajib diisi',
            'option_text.required' => 'Jawaban wajib diisi',
            'point.required' => 'Nilai wajib diisi',
            'point.regex:/^[0-9]+(\.[0-9][0-9]?)?$/' => 'Nilai harus bernilai angka',
        ]);

        $data = [
            'question_id' => $request->input('question_id'),
            'option_text' => $request->input('option_text'),
            'point' => $request->input('point'),
        ];

        Option::create($data);

        return redirect('/admin/jawaban')->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    public function store_pertanyaan(Request $request): RedirectResponse
    {
        $request->validate([
            'question_id' => 'required',
            // 'option_text' => 'required',
            'point' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',

        ], [
            'question_id.required' => 'Pertanyaan wajib diisi',
            // 'option_text.required' => 'Jawaban wajib diisi',
            'point.required' => 'Nilai wajib diisi',
            'point.regex:/^[0-9]+(\.[0-9][0-9]?)?$/' => 'Nilai harus bernilai angka',
        ]);

        $dataPilihan = [
            'question_id' => $request->input('question_id'),
            'option_text' => $request->input('option_text'),
            'point' => $request->input('point'),
        ];

        $dataJawaban = [
            'question_id' => $request->input('question_id'),
            'point' => $request->input('point'),
        ];

        if ($request->input('option_text') == null) {
            Option::create($dataJawaban);
        } else {
            Option::create($dataPilihan);
        }


        // return redirect('/admin/jawaban_pertanyaan')->with([
        //     'message' => 'Pertanyaan berhasil dibuat !',
        //     'alert-type' => 'success'
        // ]);

        // dd($request->input('question_id'));

        return redirect()->route('admin.jawaban_pertanyaan', $request->input('question_id'))->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Option $option)
    {
        $user = auth()->user();

        $type_menu = "dashboard";

        return view('admin.jawaban.show', compact('option', 'user', 'type_menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = auth()->user();

        $questions = Question::all()->pluck('question_text', 'id');

        $option = Option::findOrFail($id);

        $type_menu = "dashboard";

        return view('admin.jawaban.edit', compact('user', 'questions', 'option', 'typer_menu'));
    }

    public function edit_pertanyaan($id): View
    {
        $user = auth()->user();

        // $question = Question::findOrFail($question_id);

        $option = Option::findOrFail($id);

        $question = Question::findOrFail($option->question_id);

        $type_menu = "dashboard";

        return view('admin.option_pertanyaan.edit', compact('user', 'question', 'option', 'type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'question_id' => 'required',
            'option_text' => 'required',
            'point' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',

        ], [
            'question_id.required' => 'Pertanyaan wajib diisi',
            'option_text.required' => 'Jawaban wajib diisi',
            'point.required' => 'Nilai wajib diisi',
            'point.regex:/^[0-9]+(\.[0-9][0-9]?)?$/' => 'Nilai harus bernilai angka',
        ]);

        $data = [
            'question_id' => $request->input('question_id'),
            'option_text' => $request->input('option_text'),
            'point' => $request->input('point'),
        ];

        $option = Option::findOrFail($id);

        $option->update($data);

        return redirect('/admin/jawaban')->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    public function update_pertanyaan(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'question_id' => 'required',
            // 'option_text' => 'required',
            'point' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',

        ], [
            'question_id.required' => 'Pertanyaan wajib diisi',
            // 'option_text.required' => 'Jawaban wajib diisi',
            'point.required' => 'Nilai wajib diisi',
            'point.regex:/^[0-9]+(\.[0-9][0-9]?)?$/' => 'Nilai harus bernilai angka',
        ]);

        $dataPilihan = [
            'question_id' => $request->input('question_id'),
            'option_text' => $request->input('option_text'),
            'point' => $request->input('point'),
        ];

        $dataJawaban = [
            'question_id' => $request->input('question_id'),
            'point' => $request->input('point'),
        ];

        $option = Option::findOrFail($id);


        if ($request->input('option_text') == null) {
            $option->update($dataJawaban);
        } else {
            $option->update($dataPilihan);
        }

        return redirect()->route('admin.jawaban_pertanyaan', $request->input('question_id'))->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $option = Option::findOrFail($id);

        $option->delete();
        // Alert::success('Data Biaya', 'Berhasil dihapus!!');
        return redirect('/admin/jawaban')->with([
            'message' => 'successfully deleted !',
            'alert-type' => 'danger'
        ]);
    }

    public function destroy_pertanyaan($id)
    {
        $option = Option::findOrFail($id);

        $option->delete();


        return redirect()->route('admin.jawaban_pertanyaan', $option->question_id)->with([
            'message' => 'Pertanyaan berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }
}
