<?php

namespace App\Http\Controllers;

use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();

        $data = TahunAkademik::all();

        // $data = TahunAkademik::where('status', '=', 'aktif)->get();

        $type_menu = 'dashboard';

        return view('admin.data_master.tahun_akademik.index', compact('user', 'data', 'type_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('admin.data_master.tahun_akademik.create', compact('user', 'type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'status' => 'required'

        ], [
            'name.required' => 'Nama wajib diisi',
            'status.required' => 'kondisi wajib dipilih',
        ]);

        $data = [
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ];

        TahunAkademik::create($data);

        return redirect('/admin/tahun_akademik')->with([
            'message' => 'Semester berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TahunAkademik $tahunAkademik)
    {
        $user = auth()->user();

        return view('admin.data_master.tahun_akademik.show', compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = auth()->user();

        $data = TahunAkademik::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.data_master.tahun_akademik.edit', compact('user', 'data', 'type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',

        ], [
            'name.required' => 'nama kategori wajib diisi',
            'status.required' => 'data_pendukung kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ];


        $semester = TahunAkademik::findOrFail($id);

        $semester->update($data);

        $type_menu = 'dashboard';

        return redirect('/admin/tahun_akademik')->with([
            'message' => 'Semester berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tahun_akademik = TahunAkademik::findOrFail($id);

        $tahun_akademik->delete();
        // Alert::success('user Biaya', 'Berhasil dihapus!!');
        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/tahun_akademik')->with([
            'message' => 'tahun_akademik berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }
}
