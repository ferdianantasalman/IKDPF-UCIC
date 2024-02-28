<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_data_dosen(): View
    {
        $user = auth()->user();

        $data = User::where('role', '=', 'dosen')->get();

        // dd($data_user);
        $type_menu = 'dashboard';

        if ($user['role'] == 'admin') {
            return view('admin.data_master.data_dosen.index', compact('user', 'data', 'type_menu'));
        } else {
            return view('dosen.profile.index', compact('user', 'type_menu'));
        }
    }

    public function index_data_prodi(): View
    {
        $user = auth()->user();

        $data = User::where('role', '=', 'prodi')->get();

        $type_menu = 'dashboard';

        return view('admin.data_master.data_prodi.index', compact('user', 'data', 'type_menu'));
    }

    public function index_data_fakultas(): View
    {
        $user = auth()->user();

        $data = User::where('role', '=', 'fakultas')->get();

        $type_menu = 'dashboard';

        return view('admin.data_master.data_fakultas.index', compact('user', 'data', 'type_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_data_dosen(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';


        return view('admin.data_master.data_dosen.create', compact('user', 'type_menu'));
    }

    public function create_data_prodi(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';


        return view('admin.data_master.data_prodi.create', compact('user', 'type_menu'));
    }

    public function create_data_fakultas(): View
    {
        $user = auth()->user();

        $type_menu = 'dashboard';


        return view('admin.data_master.data_fakultas.create', compact('user', 'type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_data_dosen(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required', 'password' => 'required', 'role' => 'required',

        ], [
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
            'role.required' => 'Role wajib diisi',
        ]);

        $data = [
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
        ];

        User::create($data);

        return redirect('/admin/data_dosen')->with([
            'message' => 'Data Dosen berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    public function store_data_prodi(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required', 'password' => 'required', 'role' => 'required',

        ], [
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
            'role.required' => 'Role wajib diisi',
        ]);

        $data = [
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'password' => bcrypt($request->input('password')),
        ];

        User::create($data);

        return redirect('/admin/data_prodi')->with([
            'message' => 'Data Prodi berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    public function store_data_fakultas(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required', 'password' => 'required', 'role' => 'required',

        ], [
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
            'role.required' => 'Role wajib diisi',
        ]);

        $data = [
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'password' => bcrypt($request->input('password')),
        ];

        User::create($data);

        return redirect('/admin/data_fakultas')->with([
            'message' => 'Data Fakultas berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show_data_dosen(User $User): View
    {
        return view('admin.data_master.data_dosen.show', compact('User'));
    }

    public function show_data_prodi(User $User): View
    {
        return view('admin.data_master.data_prodi.show', compact('User'));
    }

    public function show_data_fakultas(User $User): View
    {
        return view('admin.data_master.data_fakultas.show', compact('User'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_data_dosen($id): View
    {
        $user = auth()->user();

        $data = User::findOrFail($id);

        $type_menu = 'dashboard';

        if ($user['role'] == 'admin') {
            return view('admin.data_master.data_dosen.edit', compact('user', 'data', 'type_menu'));
        } else {
            return view('dosen.profile.edit', compact('user', 'data', 'type_menu'));
        }
    }

    public function edit_data_prodi($id): View
    {
        $user = auth()->user();

        $data = User::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.data_master.data_prodi.edit', compact('user', 'data', 'type_menu'));
    }

    public function edit_data_fakultas($id): View
    {
        $user = auth()->user();

        $data = User::findOrFail($id);

        $type_menu = 'dashboard';

        return view('admin.data_master.data_fakultas.edit', compact('user', 'data', 'type_menu'));
    }

    public function edit_password($id): View
    {
        $user = auth()->user();

        $data = User::findOrFail($id);

        $data_user = $user['id'];

        $type_menu = 'dashboard';

        // dd($data_user);

        if ($user['role'] == 'admin') {
            return view('admin.password.edit', compact('user', 'data', 'type_menu', 'data_user'));
        } else if ($user['role' == 'fakultas']) {
            return view('fakultas.password.edit', compact('user', 'data', 'type_menu', 'data_user'));
        } else if ($user['role' == 'prodi']) {
            return view('prodi.password.edit', compact('user', 'data', 'type_menu', 'data_user'));
        } else {
            return view('dosen.password.edit', compact('user', 'data', 'type_menu', 'data_user'));
        }
    }


    /**
     * Update the specified resource in storage.
     */

    public function update_password(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'password' => 'required',
        ], [
            'password.required' => 'Password wajib diisi',
        ]);

        $data = [
            'password' => $request->input('password'),
        ];


        $user = User::findOrFail($id);

        $user->update($data);

        if ($user['role'] == 'admin') {
            return redirect('/admin/dashboard');
        } else if ($user['role' == 'fakultas']) {
            return redirect('/fakultas/dashboard');
        } else if ($user['role' == 'prodi']) {
            return redirect('/prodi/dashboard');
        } else {
            return redirect('/dosen/dashboard');
        }
    }

    public function update_profile(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'no_sertifikat' => 'required',
            'data_sertifikat' => 'required',
            'nidn' => 'required',
            'tgl_nidn' => 'required',
            'pendidikan' => 'required',
            'prodi' => 'required',
            'fungsional' => 'required',
            'tgl_fungsional' => 'required',
            'golongan' => 'required',
            'tgl_golongan' => 'required',
        ], [
            'nip.required' => 'Nama wajib diisi',
            'name.required' => 'Nama wajib diisi',
            'foto.image' => 'File poster harus diisi dengan file jpeg, png, jpg, gif, svg, webp',
            'no_sertifikat.required' => 'no_sertifikat wajib diisi',
            'data_sertifikat.required' => 'data_sertifikat wajib diisi',
            'nidn.required' => 'nidn wajib diisi',
            'tgl_nidn.required' => 'tgl_nidn wajib diisi',
            'pendidikan.required' => 'pendidikan wajib diisi',
            'prodi.required' => 'prodi wajib diisi',
            'fungsional.required' => 'fungsional wajib diisi',
            'tgl_fungsional.required' => 'tgl_fungsional wajib diisi',
            'golongan.required' => 'golongan wajib diisi',
            'tgl_golongan.required' => 'tgl_golongan wajib diisi',
        ]);

        $data = [
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'no_sertifikat' => $request->input('no_sertifikat'),
            'data_sertifikat' => $request->input('data_sertifikat'),
            'nidn' => $request->input('nidn'),
            'tgl_nidn' => $request->input('tgl_nidn'),
            'pendidikan' => $request->input('pendidikan'),
            'prodi' => $request->input('prodi'),
            'fungsional' => $request->input('fungsional'),
            'tgl_fungsional' => $request->input('tgl_fungsional'),
            'golongan' => $request->input('golongan'),
            'tgl_golongan' => $request->input('tgl_golongan'),
        ];

        $user = User::findOrFail($id);

        if ($image = $request->file("foto")) {
            // remove old file
            $path = "images/";

            if ($user->foto != ''  && $user->foto != null) {
                $file_old = $path . $user->image;
                unlink($file_old);
            }

            // upload new file
            $destinationPath = "images/";
            $profileImage = Str::random(10) . "-" . "profile" . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data["foto"] = "$profileImage";
        } else {
            unset($data["foto"]);
        }

        // dd($data);

        $user->update($data);

        return redirect('/dosen/profile');
    }

    public function update_data_dosen(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $data = [
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
        ];


        $user = User::findOrFail($id);

        $user->update($data);

        return redirect('/admin/data_dosen');
    }

    public function update_data_prodi(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $data = [
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
        ];


        $user = User::findOrFail($id);

        $user->update($data);

        return redirect('/admin/data_prodi');
    }

    public function update_data_fakultas(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $data = [
            'name' => $request->input('name'),
            'password' => bcrypt($request->input('password')),
        ];


        $user = User::findOrFail($id);

        $user->update($data);

        return redirect('/admin/data_fakultas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_data_dosen($id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $user->delete();
        // Alert::success('Data Biaya', 'Berhasil dihapus!!');
        return redirect('/admin/data_dosen')->with([
            'message' => 'Data Dosen berhasil dihapus !',
            'alert-type' => 'danger'
        ]);
    }

    public function destroy_data_prodi($id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $user->delete();
        // Alert::success('Data Biaya', 'Berhasil dihapus!!');
        return redirect('/admin/data_prodi')->with([
            'message' => 'Data Prodi berhasil dihapus !',
            'alert-type' => 'danger'
        ]);
    }

    public function destroy_data_fakultas($id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $user->delete();
        // Alert::success('Data Biaya', 'Berhasil dihapus!!');
        return redirect('/admin/data_fakultas')->with([
            'message' => 'Data Fakultas berhasil dihapus !',
            'alert-type' => 'danger'
        ]);
    }
}
