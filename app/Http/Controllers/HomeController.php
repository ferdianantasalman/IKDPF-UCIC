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

        $user_count = User::all()->count();
        $kinerja_pendidikan_count = Kinerja::where('status', '=', 'pendidikan')->get()->count();
        $kinerja_penelitian_count = Kinerja::where('status', '=', 'penelitian')->get()->count();
        $kinerja_pengabdian_count = Kinerja::where('status', '=', 'pengabdian')->get()->count();
        $kinerja_penunjang_count = Kinerja::where('status', '=', 'penunjang')->get()->count();

        return view('admin.dashboard')->with([
            'user' => $user,
            'type_menu' => $type_menu,
            'user_count' => $user_count,
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

        return view('rektorat.dashboard')->with(['user' => $user, 'type_menu' => $type_menu]);
    }

    // Fakultas
    public function fakultas()
    {
        $user = Auth::user();
        $type_menu = 'dashboard';

        return view('fakultas.dashboard.')->with(['user' => $user, 'type_menu' => $type_menu]);
    }

    // Prodi
    public function prodi()
    {
        $user = Auth::user();
        $type_menu = 'dashboard';

        return view('prodi.dashboard')->with(['user' => $user, 'type_menu' => $type_menu]);
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
}