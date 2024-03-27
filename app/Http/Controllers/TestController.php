<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function index_mahasiswa()
    {
        // $user = auth()->user();

        // $type_menu = "dashboard";

        // $questions =  Question::where("status", "=", "mahasiswa")->orderBy('id', 'ASC')->with(
        //     ['questionOptions' => function ($query) {
        //         $query->inRandomOrder();
        //     }]
        // )->get();

        // return view('dosen.jenjang_pendidikan.test', compact('user', 'questions', 'typer_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function create_mahasiswa()
    {
        $user = auth()->user();

        $type_menu = "dashboard";

        $questions =  Question::where("status", "=", "mahasiswa")->orderBy('id', 'ASC')->with(
            ['questionOptions' => function ($query) {
                $query->inRandomOrder();
            }]
        )->get();

        return view('mahasiswa.test.test', compact('user', 'questions', 'type_menu'));
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
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
    }
}
