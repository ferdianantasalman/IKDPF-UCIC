<?php

namespace App\Http\Controllers;

use App\Models\Kinerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    // Landing
    public function landing()
    {
        return view('guest.index');
    }

    // Rektorat
    public function admin()
    {
        $user = auth()->user();

        $type_menu = 'dashboard';

        $dosen_count = User::where('role', '=', 'dosen')->get()->count();
        $prodi_count = User::where('role', '=', 'prodi')->get()->count();
        $fakultas_count = User::where('role', '=', 'fakultas')->get()->count();
        $kinerja_pendidikan_count = Kinerja::where('status', '=', 'pendidikan')->get()->count();
        $kinerja_penelitian_count = Kinerja::where('status', '=', 'penelitian')->get()->count();
        $kinerja_pengabdian_count = Kinerja::where('status', '=', 'pengabdian')->get()->count();
        $kinerja_penunjang_count = Kinerja::where('status', '=', 'penunjang')->get()->count();

        return view('admin.dashboard')->with([
            'user' => $user,
            'type_menu' => $type_menu,
            'dosen_count' => $dosen_count,
            'prodi_count' => $prodi_count,
            'fakultas_count' => $fakultas_count,
            'kinerja_pendidikan_count' => $kinerja_pendidikan_count,
            'kinerja_penelitian_count' => $kinerja_penelitian_count,
            'kinerja_pengabdian_count' => $kinerja_pengabdian_count,
            'kinerja_penunjang_count' => $kinerja_penunjang_count,
        ]);
    }

    // Rektorat
    public function rektorat()
    {
        $user = auth()->user();
        $type_menu = 'dashboard';

        $dosen_count = User::where('role', '=', 'dosen')->get()->count();
        $prodi_count = User::where('role', '=', 'prodi')->get()->count();
        $fakultas_count = User::where('role', '=', 'fakultas')->get()->count();
        $kinerja_pendidikan_count = Kinerja::where('status', '=', 'pendidikan')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penelitian_count = Kinerja::where('status', '=', 'penelitian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_pengabdian_count = Kinerja::where('status', '=', 'pengabdian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penunjang_count = Kinerja::where('status', '=', 'penunjang')->where('user_id', '=', $user['id'])->get()->count();

        return view('rektorat.dashboard')->with([
            'user' => $user,
            'type_menu' => $type_menu,
            'dosen_count' => $dosen_count,
            'prodi_count' => $prodi_count,
            'fakultas_count' => $fakultas_count,
            'kinerja_pendidikan_count' => $kinerja_pendidikan_count,
            'kinerja_penelitian_count' => $kinerja_penelitian_count,
            'kinerja_pengabdian_count' => $kinerja_pengabdian_count,
            'kinerja_penunjang_count' => $kinerja_penunjang_count,
        ]);
    }

    // Fakultas
    public function fakultas()
    {
        $user = Auth::user();
        $type_menu = 'dashboard';

        $dosen_count = User::where('role', '=', 'dosen')->get()->count();
        $prodi_count = User::where('role', '=', 'prodi')->get()->count();
        $fakultas_count = User::where('role', '=', 'fakultas')->get()->count();
        $kinerja_pendidikan_count = Kinerja::where('status', '=', 'pendidikan')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penelitian_count = Kinerja::where('status', '=', 'penelitian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_pengabdian_count = Kinerja::where('status', '=', 'pengabdian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penunjang_count = Kinerja::where('status', '=', 'penunjang')->where('user_id', '=', $user['id'])->get()->count();

        return view('fakultas.dashboard')->with([
            'user' => $user,
            'type_menu' => $type_menu,
            'dosen_count' => $dosen_count,
            'prodi_count' => $prodi_count,
            'fakultas_count' => $fakultas_count,
            'kinerja_pendidikan_count' => $kinerja_pendidikan_count,
            'kinerja_penelitian_count' => $kinerja_penelitian_count,
            'kinerja_pengabdian_count' => $kinerja_pengabdian_count,
            'kinerja_penunjang_count' => $kinerja_penunjang_count,
        ]);
    }

    // Prodi
    public function prodi()
    {
        $user = Auth::user();
        $type_menu = 'dashboard';

        $dosen_count = User::where('role', '=', 'dosen')->get()->count();
        $prodi_count = User::where('role', '=', 'prodi')->get()->count();
        $fakultas_count = User::where('role', '=', 'fakultas')->get()->count();
        $kinerja_pendidikan_count = Kinerja::where('status', '=', 'pendidikan')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penelitian_count = Kinerja::where('status', '=', 'penelitian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_pengabdian_count = Kinerja::where('status', '=', 'pengabdian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penunjang_count = Kinerja::where('status', '=', 'penunjang')->where('user_id', '=', $user['id'])->get()->count();

        return view('prodi.dashboard')->with([
            'user' => $user,
            'type_menu' => $type_menu,
            'dosen_count' => $dosen_count,
            'prodi_count' => $prodi_count,
            'fakultas_count' => $fakultas_count,
            'kinerja_pendidikan_count' => $kinerja_pendidikan_count,
            'kinerja_penelitian_count' => $kinerja_penelitian_count,
            'kinerja_pengabdian_count' => $kinerja_pengabdian_count,
            'kinerja_penunjang_count' => $kinerja_penunjang_count,
        ]);
    }

    // Dosen
    public function dosen()
    {
        // $user = auth()->user();
        $user = Auth::user();

        $type_menu = 'dashboard';

        $kinerja_pendidikan_count = Kinerja::where('status', '=', 'pendidikan')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penelitian_count = Kinerja::where('status', '=', 'penelitian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_pengabdian_count = Kinerja::where('status', '=', 'pengabdian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penunjang_count = Kinerja::where('status', '=', 'penunjang')->where('user_id', '=', $user['id'])->get()->count();

        return view('dosen.dashboard')->with([
            'user' => $user,
            'type_menu' => $type_menu,
            'kinerja_pendidikan_count' => $kinerja_pendidikan_count,
            'kinerja_penelitian_count' => $kinerja_penelitian_count,
            'kinerja_pengabdian_count' => $kinerja_pengabdian_count,
            'kinerja_penunjang_count' => $kinerja_penunjang_count,
        ]);
    }

    public function mahasiswa()
    {
        $user = Auth::user();
        $type_menu = 'dashboard';

        $kinerja_pendidikan_count = Kinerja::where('status', '=', 'pendidikan')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penelitian_count = Kinerja::where('status', '=', 'penelitian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_pengabdian_count = Kinerja::where('status', '=', 'pengabdian')->where('user_id', '=', $user['id'])->get()->count();
        $kinerja_penunjang_count = Kinerja::where('status', '=', 'penunjang')->where('user_id', '=', $user['id'])->get()->count();

        return view('mahasiswa.dashboard')->with([
            'user' => $user,
            'type_menu' => $type_menu,
            'kinerja_pendidikan_count' => $kinerja_pendidikan_count,
            'kinerja_penelitian_count' => $kinerja_penelitian_count,
            'kinerja_pengabdian_count' => $kinerja_pengabdian_count,
            'kinerja_penunjang_count' => $kinerja_penunjang_count,
        ]);
    }
}
