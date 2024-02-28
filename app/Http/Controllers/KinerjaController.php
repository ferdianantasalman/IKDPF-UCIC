<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // ======== Admin ========
    public function index_admin_kinerja_pendidikan(): View
    {
        $user = auth()->user();

        $data = Kinerja::where('status', '=', 'pendidikan')->get();

        $type_menu = 'dashboard';

        return view('admin.kinerja_pendidikan.index', compact('user', 'data', 'type_menu'));
    }

    public function index_admin_kinerja_penelitian(): View
    {
        $user = auth()->user();

        $data = Kinerja::where('status', '=', 'penelitian')->get();

        $type_menu = 'dashboard';

        return view('admin.kinerja_penelitian.index', compact('user', 'data', 'type_menu'));
    }

    public function index_admin_kinerja_pengabdian(): View
    {
        $user = auth()->user();

        $data = Kinerja::where('status', '=', 'pengabdian')->get();

        $type_menu = 'dashboard';

        return view('admin.kinerja_pengabdian.index', compact('user', 'data', 'type_menu'));
    }

    public function index_admin_kinerja_penunjang(): View
    {
        $user = auth()->user();

        $data = Kinerja::where('status', '=', 'penunjang')->get();

        $type_menu = 'dashboard';

        return view('admin.kinerja_penunjang.index', compact('user', 'data', 'type_menu'));
    }

    public function create_admin_kinerja_pendidikan(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('admin.kinerja_pendidikan.create', compact('user', 'type_menu'));
    }

    public function store_admin_kinerja_pendidikan(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'pendidikan',
        ];

        Kinerja::create($data);

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_pendidikan')->with([
            'message' => 'Kinerja Pendidikan berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function show_admin_kinerja_pendidikan(Kinerja $kinerja_pendidikan): View
    {
        return view('admin.kinerja_pendidikan.show', compact('kinerja_pendidikan'));
    }

    public function edit_admin_kinerja_pendidikan($id): View
    {
        $user = auth()->user();

        $data = Kinerja::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.kinerja_pendidikan.edit', compact('user', 'data', 'type_menu'));
    }

    public function update_admin_kinerja_pendidikan(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'pendidikan',
        ];


        $kinerja_pendidikan = Kinerja::findOrFail($id);

        $kinerja_pendidikan->update($data);

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_pendidikan')->with([
            'message' => 'Kinerja Pendidikan berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function destroy_admin_kinerja_pendidikan($id): RedirectResponse
    {
        $kinerja_pendidikan = Kinerja::findOrFail($id);

        $kinerja_pendidikan->delete();
        // Alert::success('user Biaya', 'Berhasil dihapus!!');
        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_pendidikan')->with([
            'message' => 'Kinerja Pendidikan berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function create_admin_kinerja_penelitian(): View
    {
        $user = auth()->user();
        $type_menu = 'dashboard';

        return view('admin.kinerja_penelitian.create', compact('user', 'type_menu'));
    }

    public function store_admin_kinerja_penelitian(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'penelitian',
        ];

        Kinerja::create($data);

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_penelitian')->with([
            'message' => 'Kinerja Penelitian berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function show_admin_kinerja_penelitian(Kinerja $kinerja_penelitian): View
    {
        return view('admin.kinerja_penelitian.show', compact('kinerja_pendidikan'));
    }

    public function edit_admin_kinerja_penelitian($id): View
    {
        $user = auth()->user();

        $data = Kinerja::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.kinerja_penelitian.edit', compact('user', 'data', 'type_menu'));
    }

    public function update_admin_kinerja_penelitian(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'penelitian',
        ];


        $kinerja_penelitian = Kinerja::findOrFail($id);

        $kinerja_penelitian->update($data);

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_penelitian')->with([
            'message' => 'Kinerja Penelitian berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function destroy_admin_kinerja_penelitian($id): RedirectResponse
    {
        $kinerja_penelitian = Kinerja::findOrFail($id);

        $kinerja_penelitian->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_penelitian')->with([
            'message' => 'Kinerja Penelitian berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_admin_kinerja_pengabdian(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('admin.kinerja_pengabdian.create', compact('user', 'type_menu'));
    }

    public function store_admin_kinerja_pengabdian(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'pengabdian',
        ];

        Kinerja::create($data);

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_pengabdian')->with([
            'message' => 'Kinerja Pengabdian berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show_admin_kinerja_pengabdian(Kinerja $kinerja_pengabdian): View
    {
        return view('admin.kinerja_pengabdian.show', compact('kinerja_pengabdian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_admin_kinerja_pengabdian($id): View
    {
        $user = auth()->user();

        $data = Kinerja::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.kinerja_pengabdian.edit', compact('user', 'data', 'type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_admin_kinerja_pengabdian(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'pengabdian',
        ];


        $kinerja_pengabdian = Kinerja::findOrFail($id);

        $kinerja_pengabdian->update($data);

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_pengabdian')->with([
            'message' => 'Kinerja Pengabdian diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_admin_kinerja_pengabdian($id): RedirectResponse
    {
        $kinerja_pengabdian = Kinerja::findOrFail($id);

        $kinerja_pengabdian->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_pengabdian')->with([
            'message' => 'Kinerja Pengabdian berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create_admin_kinerja_penunjang(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('admin.kinerja_penunjang.create', compact('user', 'type_menu'));
    }

    public function store_admin_kinerja_penunjang(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'penunjang',
        ];

        Kinerja::create($data);

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_penunjang')->with([
            'message' => 'Kinerja Penunjang berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show_admin_kinerja_penunjang(Kinerja $kinerja_penunjang): View
    {
        return view('admin.kinerja_penunjang.show', compact('kinerja_penunjang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_admin_kinerja_penunjang($id): View
    {
        $user = auth()->user();

        $data = Kinerja::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.kinerja_penunjang.edit', compact('user', 'data', 'type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_admin_kinerja_penunjang(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'penunjang',
        ];


        $kinerja_penunjang = Kinerja::findOrFail($id);

        $kinerja_penunjang->update($data);

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_penunjang')->with([
            'message' => 'Kinerja Penunjang berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_admin_kinerja_penunjang($id): RedirectResponse
    {
        $kinerja_penunjang = Kinerja::findOrFail($id);

        $kinerja_penunjang->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/admin/kinerja_penunjang')->with([
            'message' => 'Kinerja Penunjang berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }



    // ======== Dosen ========
    public function index_kinerja_pendidikan(): View
    {
        $user = auth()->user();

        $data = Kinerja::where('status', '=', 'pendidikan')->where('user_id', '=', $user['id'])->get();

        $type_menu = 'dashboard';

        return view('dosen.kinerja_pendidikan.index', compact('user', 'data', 'type_menu'));
    }

    public function index_kinerja_penelitian(): View
    {
        $user = auth()->user();

        $data = Kinerja::where('status', '=', 'penelitian')->where('user_id', '=', $user['id'])->get();

        $type_menu = 'dashboard';

        return view('dosen.kinerja_penelitian.index', compact('user', 'data', 'type_menu'));
    }

    public function index_kinerja_pengabdian(): View
    {
        $user = auth()->user();

        $data = Kinerja::where('status', '=', 'pengabdian')->where('user_id', '=', $user['id'])->get();

        $type_menu = 'dashboard';

        return view('dosen.kinerja_pengabdian.index', compact('user', 'data', 'type_menu'));
    }

    public function index_kinerja_penunjang(): View
    {
        $user = auth()->user();

        $data = Kinerja::where('status', '=', 'penunjang')->where('user_id', '=', $user['id'])->get();

        $type_menu = 'dashboard';

        return view('dosen.kinerja_penunjang.index', compact('user', 'data', 'type_menu'));
    }

    public function create_kinerja_pendidikan(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('dosen.kinerja_pendidikan.create', compact('user', 'type_menu'));
    }

    public function store_kinerja_pendidikan(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'pendidikan',
        ];

        Kinerja::create($data);

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_pendidikan')->with([
            'message' => 'Kinerja Pendidikan berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function show_kinerja_pendidikan(Kinerja $kinerja_pendidikan): View
    {
        return view('admin.kinerja_pendidikan.show', compact('kinerja_pendidikan'));
    }

    public function edit_kinerja_pendidikan($id): View
    {
        $user = auth()->user();

        $data = Kinerja::findOrFail($id);

        $type_menu = 'dashboard';

        return view('dosen.kinerja_pendidikan.edit', compact('user', 'data', 'type_menu'));
    }

    public function update_kinerja_pendidikan(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'pendidikan',
        ];


        $kinerja_pendidikan = Kinerja::findOrFail($id);

        $kinerja_pendidikan->update($data);

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_pendidikan')->with([
            'message' => 'Kinerja Pendidikan berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function destroy_kinerja_pendidikan($id): RedirectResponse
    {
        $kinerja_pendidikan = Kinerja::findOrFail($id);

        $kinerja_pendidikan->delete();
        // Alert::success('user Biaya', 'Berhasil dihapus!!');
        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_pendidikan')->with([
            'message' => 'Kategori berhasil diupdate !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function create_kinerja_penelitian(): View
    {
        $user = auth()->user();
        $type_menu = 'dashboard';

        return view('dosen.kinerja_penelitian.create', compact('user', 'type_menu'));
    }

    public function store_kinerja_penelitian(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'penelitian',
        ];

        Kinerja::create($data);

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_penelitian')->with([
            'message' => 'Kinerja Penelitian berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function show_kinerja_penelitian(Kinerja $kinerja_penelitian): View
    {
        return view('admin.kinerja_penelitian.show', compact('kinerja_pendidikan'));
    }

    public function edit_kinerja_penelitian($id): View
    {
        $user = auth()->user();

        $data = Kinerja::findOrFail($id);

        $type_menu = 'dashboard';

        return view('dosen.kinerja_penelitian.edit', compact('user', 'data',  'type_menu'));
    }

    public function update_kinerja_penelitian(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'penelitian',
        ];


        $kinerja_penelitian = Kinerja::findOrFail($id);

        $kinerja_penelitian->update($data);

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_penelitian')->with([
            'message' => 'Kinerja Penelitian berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    public function destroy_kinerja_penelitian($id): RedirectResponse
    {
        $kinerja_penelitian = Kinerja::findOrFail($id);

        $kinerja_penelitian->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_penelitian')->with([
            'message' => 'Kinerja Penelitian berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_kinerja_pengabdian(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('dosen.kinerja_pengabdian.create', compact('user', 'type_menu'));
    }

    public function store_kinerja_pengabdian(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'pengabdian',
        ];

        Kinerja::create($data);

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_pengabdian')->with([
            'message' => 'Kinerja Penelitian berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show_kinerja_pengabdian(Kinerja $kinerja_pengabdian): View
    {
        return view('admin.kinerja_pengabdian.show', compact('kinerja_pengabdian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_kinerja_pengabdian($id): View
    {
        $user = auth()->user();

        $data = Kinerja::findOrFail($id);

        $type_menu = 'dashboard';

        return view('dosen.kinerja_pengabdian.edit', compact('user', 'data', 'type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_kinerja_pengabdian(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'pengabdian',
        ];


        $kinerja_pengabdian = Kinerja::findOrFail($id);

        $kinerja_pengabdian->update($data);

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_pengabdian')->with([
            'message' => 'Kinerja Pengabdian berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_kinerja_pengabdian($id): RedirectResponse
    {
        $kinerja_pengabdian = Kinerja::findOrFail($id);

        $kinerja_pengabdian->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_pengabdian')->with([
            'message' => 'Kinerja Pengabdian berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create_kinerja_penunjang(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        return view('dosen.kinerja_penunjang.create', compact('user', 'type_menu'));
    }

    public function store_kinerja_penunjang(Request $request): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'penunjang',
        ];

        Kinerja::create($data);

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_penunjang')->with([
            'message' => 'Kinerja Penunjang berhasil dibuat !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show_kinerja_penunjang(Kinerja $kinerja_penunjang): View
    {
        return view('admin.kinerja_penunjang.show', compact('kinerja_penunjang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_kinerja_penunjang($id): View
    {
        $user = auth()->user();

        $data = Kinerja::findOrFail($id);

        $type_menu = 'dashboard';

        return view('dosen.kinerja_penunjang.edit', compact('user', 'data', 'type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_kinerja_penunjang(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'jenis_kegiatan' => 'required',
            'data_pendukung' => 'required',
            'sks' => 'required',
            'pelaksanaan' => 'required',
            'tahun_akademik' => 'required',

        ], [
            'jenis_kegiatan.required' => 'nama kategori wajib diisi',
            'data_pendukung.required' => 'data_pendukung kategori wajib diisi',
            'sks.required' => 'sks kategori wajib diisi',
            'pelaksanaan.required' => 'pelaksanaan kategori wajib diisi',
            'tahun_akademik.required' => 'tahun_akademik kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'user_id' => $user['id'],
            'jenis_kegiatan' => $request->input('jenis_kegiatan'),
            'data_pendukung' => $request->input('data_pendukung'),
            'sks' => $request->input('sks'),
            'pelaksanaan' => $request->input('pelaksanaan'),
            'tahun_akademik' => $request->input('tahun_akademik'),
            'status' => 'penunjang',
        ];


        $kinerja_penunjang = Kinerja::findOrFail($id);

        $kinerja_penunjang->update($data);

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_penunjang')->with([
            'message' => 'Kinerja Penunjang berhasil diperbarui !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_kinerja_penunjang($id): RedirectResponse
    {
        $kinerja_penunjang = Kinerja::findOrFail($id);

        $kinerja_penunjang->delete();

        $user = auth()->user();

        $type_menu = 'dashboard';

        return redirect('/dosen/kinerja_penunjang')->with([
            'message' => 'Kinerja Penunjang berhasil dihapus !',
            'alert-type' => 'success',
            'user' => $user,
            'type_menu' => $type_menu,
        ]);
    }
}
