<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KinerjaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    // Landing
    // Route::get('/', [HomeController::class, 'landing']);

    Route::get('/dashboard', [HomeController::class, 'admin']);


    Route::get(
        '/',
        [AuthController::class, 'login']
    )->name('login.index');


    // Login
    Route::get('/login', [AuthController::class, 'login'])->name('login.index');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login');

    // Register
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerStore']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    // ============== Admin ============

    Route::prefix('admin')->middleware('roleAs:admin')->group(function () {
        Route::get('dashboard', [HomeController::class, 'admin']);

        Route::put('password/{password}', [UserController::class, 'password'])->name('password.update');

        // ==== Master Data =========
        // Data Dosen
        Route::get('data_dosen', [UserController::class, 'index_data_dosen'])->name('data_dosen');
        Route::get('data_dosen/create', [UserController::class, 'create_data_dosen'])->name('data_dosen.create');
        Route::post('data_dosen', [UserController::class, 'store_data_dosen'])->name('data_dosen.store');
        Route::get('data_dosen/{data_dosen}/edit', [UserController::class, 'edit_data_dosen'])->name('data_dosen.edit');
        Route::put('data_dosen/{data_dosen}', [UserController::class, 'update_data_dosen'])->name('data_dosen.update');
        Route::delete('data_dosen/{data_dosen}', [UserController::class, 'destroy_data_dosen'])->name('data_dosen.destroy');
        // change password
        Route::get('password/{password}/edit', [UserController::class, 'edit_password'])->name('admin.password.edit');
        Route::put('password{password}', [UserController::class, 'update_password'])->name('admin.password.update');

        // Data Prodi
        Route::get('data_prodi', [UserController::class, 'index_data_prodi'])->name('data_prodi');
        Route::get('data_prodi/create', [UserController::class, 'create_data_prodi'])->name('data_prodi.create');
        Route::post('data_prodi', [UserController::class, 'store_data_prodi'])->name('data_prodi.store');
        Route::get('data_prodi/{data_prodi}/edit', [UserController::class, 'edit_data_prodi'])->name('data_prodi.edit');
        Route::put('data_prodi/{data_prodi}', [UserController::class, 'update_data_prodi'])->name('data_prodi.update');
        Route::delete('data_prodi/{data_prodi}', [UserController::class, 'destroy_data_prodi'])->name('data_prodi.destroy');

        // Data Fakultas
        Route::get('data_fakultas', [UserController::class, 'index_data_fakultas'])->name('data_fakultas');
        Route::get('data_fakultas/create', [UserController::class, 'create_data_fakultas'])->name('data_fakultas.create');
        Route::post('data_fakultas', [UserController::class, 'store_data_fakultas'])->name('data_fakultas.store');
        Route::get('data_fakultas/{data_fakultas}/edit', [UserController::class, 'edit_data_fakultas'])->name('data_fakultas.edit');
        Route::put('data_fakultas/{data_fakultas}', [UserController::class, 'update_data_fakultas'])->name('data_fakultas.update');
        Route::delete('data_fakultas/{data_fakultas}', [UserController::class, 'destroy_data_fakultas'])->name('data_fakultas.destroy');

        // Kinerja Pendidikan
        Route::get('kinerja_pendidikan', [KinerjaController::class, 'index_admin_kinerja_pendidikan'])->name('admin.kinerja_pendidikan');
        Route::get('kinerja_pendidikan/create', [KinerjaController::class, 'create_admin_kinerja_pendidikan'])->name('admin.kinerja_pendidikan.create');
        Route::post('kinerja_pendidikan', [KinerjaController::class, 'store_admin_kinerja_pendidikan'])->name('admin.kinerja_pendidikan.store');
        Route::get('kinerja_pendidikan/{pendidikan}/edit', [KinerjaController::class, 'edit_admin_kinerja_pendidikan'])->name('admin.kinerja_pendidikan.edit');
        Route::put('kinerja_pendidikan/{pendidikan}', [KinerjaController::class, 'update_admin_kinerja_pendidikan'])->name('admin.kinerja_pendidikan.update');
        Route::delete('kinerja_pendidikan/{pendidikan}', [KinerjaController::class, 'destroy_admin_kinerja_pendidikan'])->name('admin.kinerja_pendidikan.destroy');

        // ==== Kinerja Penelitian ======
        Route::get('kinerja_penelitian', [KinerjaController::class, 'index_admin_kinerja_penelitian'])->name('admin.kinerja_penelitian');
        Route::get('kinerja_penelitian/create', [KinerjaController::class, 'create_admin_kinerja_penelitian'])->name('admin.kinerja_penelitian.create');
        Route::post('kinerja_penelitian', [KinerjaController::class, 'store_admin_kinerja_penelitian'])->name('admin.kinerja_penelitian.store');
        Route::get('kinerja_penelitian/{penelitian}/edit', [KinerjaController::class, 'edit_admin_kinerja_penelitian'])->name('admin.kinerja_penelitian.edit');
        Route::put('kinerja_penelitian/{penelitian}', [KinerjaController::class, 'update_admin_kinerja_penelitian'])->name('admin.kinerja_penelitian.update');
        Route::delete('kinerja_penelitian/{penelitian}', [KinerjaController::class, 'destroy_admin_kinerja_penelitian'])->name('admin.kinerja_penelitian.destroy');

        // ==== Kinerja Pengabdian =======
        Route::get('kinerja_pengabdian', [KinerjaController::class, 'index_admin_kinerja_pengabdian'])->name('admin.kinerja_pengabdian');
        Route::get('kinerja_pengabdian/create', [KinerjaController::class, 'create_admin_kinerja_pengabdian'])->name('admin.kinerja_pengabdian.create');
        Route::post('kinerja_pengabdian', [KinerjaController::class, 'store_admin_kinerja_pengabdian'])->name('admin.kinerja_pengabdian.store');
        Route::get('kinerja_pengabdian/{pengabdian}/edit', [KinerjaController::class, 'edit_admin_kinerja_pengabdian'])->name('admin.kinerja_pengabdian.edit');
        Route::put('kinerja_pengabdian/{pengabdian}', [KinerjaController::class, 'update_admin_kinerja_pengabdian'])->name('admin.kinerja_pengabdian.update');
        Route::delete('kinerja_pengabdian/{pengabdian}', [KinerjaController::class, 'destroy_admin_kinerja_pengabdian'])->name('admin.kinerja_pengabdian.destroy');
        // ==== Kinerja Penunjang ========
        Route::get('kinerja_penunjang', [KinerjaController::class, 'index_admin_kinerja_penunjang'])->name('admin.kinerja_penunjang');
        Route::get('kinerja_penunjang/create', [KinerjaController::class, 'create_admin_kinerja_penunjang'])->name('admin.kinerja_penunjang.create');
        Route::post('kinerja_penunjang', [KinerjaController::class, 'store_admin_kinerja_penunjang'])->name('admin.kinerja_penunjang.store');
        Route::get('kinerja_penunjang/{penunjang}/edit', [KinerjaController::class, 'edit_admin_kinerja_penunjang'])->name('admin.kinerja_penunjang.edit');
        Route::put('kinerja_penunjang/{penunjang}', [KinerjaController::class, 'update_admin_kinerja_penunjang'])->name('admin.kinerja_penunjang.update');
        Route::delete('kinerja_penunjang/{penunjang}', [KinerjaController::class, 'destroy_admin_kinerja_penunjang'])->name('admin.kinerja_penunjang.destroy');
    });

    // ============== Rektorat ============

    Route::prefix('rektorat')->middleware('roleAs:rektorat')->group(function () {
        // Route::get('/dashboard', [HomeController::class, 'rektorat']);
    });


    // ============== Fakultas ============

    Route::prefix('fakultas')->middleware('roleAs:fakultas')->group(function () {
        Route::get('dashboard', [HomeController::class, 'fakultas']);
    });

    // ============== Prodi ============

    Route::prefix('prodi')->middleware('roleAs:prodi')->group(function () {
        Route::get('dashboard', [HomeController::class, 'prodi']);
    });


    // ============== Dosen ============
    Route::prefix('dosen')->middleware('roleAs:dosen')->group(function () {
        Route::get('dashboard', [HomeController::class, 'dosen']);

        // ==== Profile =========
        Route::get('profile', [UserController::class, 'index_data_dosen'])->name('profile');
        // Route::get('profile/create', [UserController::class, 'create_data_dosen'])->name('profile.create');
        // Route::post('profile', [UserController::class, 'store_data_dosen'])->name('profile.store');
        Route::get('profile/{profile}/edit', [UserController::class, 'edit_data_dosen'])->name('profile.edit');
        Route::put('profile/{profile}', [UserController::class, 'update_profile'])->name('profile.update');
        Route::delete('profile/{profile}', [UserController::class, 'destroy_data_dosen'])->name('profile.destroy');
        // chande password
        Route::get('password/{password}/edit', [UserController::class, 'edit_password'])->name('dosen.password.edit');
        Route::put('password{password}', [UserController::class, 'update_password'])->name('dosen.password.update');


        // ==== Kinerja Pendidikan =====
        Route::get('kinerja_pendidikan', [KinerjaController::class, 'index_kinerja_pendidikan'])->name('kinerja_pendidikan');
        Route::get('kinerja_pendidikan/create', [KinerjaController::class, 'create_kinerja_pendidikan'])->name('kinerja_pendidikan.create');
        Route::post('kinerja_pendidikan', [KinerjaController::class, 'store_kinerja_pendidikan'])->name('kinerja_pendidikan.store');
        Route::get('kinerja_pendidikan/{pendidikan}/edit', [KinerjaController::class, 'edit_kinerja_pendidikan'])->name('kinerja_pendidikan.edit');
        Route::put('kinerja_pendidikan/{pendidikan}', [KinerjaController::class, 'update_kinerja_pendidikan'])->name('kinerja_pendidikan.update');
        Route::delete('kinerja_pendidikan/{pendidikan}', [KinerjaController::class, 'destroy_kinerja_pendidikan'])->name('kinerja_pendidikan.destroy');

        // ==== Kinerja Penelitian ======
        Route::get('kinerja_penelitian', [KinerjaController::class, 'index_kinerja_penelitian'])->name('kinerja_penelitian');
        Route::get('kinerja_penelitian/create', [KinerjaController::class, 'create_kinerja_penelitian'])->name('kinerja_penelitian.create');
        Route::post('kinerja_penelitian', [KinerjaController::class, 'store_kinerja_penelitian'])->name('kinerja_penelitian.store');
        Route::get('kinerja_penelitian/{penelitian}/edit', [KinerjaController::class, 'edit_kinerja_penelitian'])->name('kinerja_penelitian.edit');
        Route::put('kinerja_penelitian/{penelitian}', [KinerjaController::class, 'update_kinerja_penelitian'])->name('kinerja_penelitian.update');
        Route::delete('kinerja_penelitian/{penelitian}', [KinerjaController::class, 'destroy_kinerja_penelitian'])->name('kinerja_penelitian.destroy');

        // ==== Kinerja Pengabdian =======
        Route::get('kinerja_pengabdian', [KinerjaController::class, 'index_kinerja_pengabdian'])->name('kinerja_pengabdian');
        Route::get('kinerja_pengabdian/create', [KinerjaController::class, 'create_kinerja_pengabdian'])->name('kinerja_pengabdian.create');
        Route::post('kinerja_pengabdian', [KinerjaController::class, 'store_kinerja_pengabdian'])->name('kinerja_pengabdian.store');
        Route::get('kinerja_pengabdian/{pengabdian}/edit', [KinerjaController::class, 'edit_kinerja_pengabdian'])->name('kinerja_pengabdian.edit');
        Route::put('kinerja_pengabdian/{pengabdian}', [KinerjaController::class, 'update_kinerja_pengabdian'])->name('kinerja_pengabdian.update');
        Route::delete('kinerja_pengabdian/{pengabdian}', [KinerjaController::class, 'destroy_kinerja_pengabdian'])->name('kinerja_pengabdian.destroy');

        // ==== Kinerja Penunjang ========
        Route::get('kinerja_penunjang', [KinerjaController::class, 'index_kinerja_penunjang'])->name('kinerja_penunjang');
        Route::get('kinerja_penunjang/create', [KinerjaController::class, 'create_kinerja_penunjang'])->name('kinerja_penunjang.create');
        Route::post('kinerja_penunjang', [KinerjaController::class, 'store_kinerja_penunjang'])->name('kinerja_penunjang.store');
        Route::get('kinerja_penunjang/{penunjang}/edit', [KinerjaController::class, 'edit_kinerja_penunjang'])->name('kinerja_penunjang.edit');
        Route::put('kinerja_penunjang/{penunjang}', [KinerjaController::class, 'update_kinerja_penunjang'])->name('kinerja_penunjang.update');
        Route::delete('kinerja_penunjang/{penunjang}', [KinerjaController::class, 'destroy_kinerja_penunjang'])->name('kinerja_penunjang.destroy');
    });
});



// ======================== Template =============================

Route::redirect('/dashboard', '/dashboard-general-dashboard');

// Dashboard
Route::get('/dashboard-general-dashboard', function () {
    return view('pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
});
Route::get('/dashboard-ecommerce-dashboard', function () {
    return view('pages.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
});


// Layout
Route::get('/layout-default-layout', function () {
    return view('pages.layout-default-layout', ['type_menu' => 'layout']);
});

// Blank Page
Route::get('/blank-page', function () {
    return view('pages.blank-page', ['type_menu' => '']);
});

// Bootstrap
Route::get('/bootstrap-alert', function () {
    return view('pages.bootstrap-alert', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-badge', function () {
    return view('pages.bootstrap-badge', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-breadcrumb', function () {
    return view('pages.bootstrap-breadcrumb', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-buttons', function () {
    return view('pages.bootstrap-buttons', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-card', function () {
    return view('pages.bootstrap-card', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-carousel', function () {
    return view('pages.bootstrap-carousel', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-collapse', function () {
    return view('pages.bootstrap-collapse', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-dropdown', function () {
    return view('pages.bootstrap-dropdown', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-form', function () {
    return view('pages.bootstrap-form', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-list-group', function () {
    return view('pages.bootstrap-list-group', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-media-object', function () {
    return view('pages.bootstrap-media-object', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-modal', function () {
    return view('pages.bootstrap-modal', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-nav', function () {
    return view('pages.bootstrap-nav', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-navbar', function () {
    return view('pages.bootstrap-navbar', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-pagination', function () {
    return view('pages.bootstrap-pagination', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-popover', function () {
    return view('pages.bootstrap-popover', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-progress', function () {
    return view('pages.bootstrap-progress', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-table', function () {
    return view('pages.bootstrap-table', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-tooltip', function () {
    return view('pages.bootstrap-tooltip', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-typography', function () {
    return view('pages.bootstrap-typography', ['type_menu' => 'bootstrap']);
});


// components
Route::get('/components-article', function () {
    return view('pages.components-article', ['type_menu' => 'components']);
});
Route::get('/components-avatar', function () {
    return view('pages.components-avatar', ['type_menu' => 'components']);
});
Route::get('/components-chat-box', function () {
    return view('pages.components-chat-box', ['type_menu' => 'components']);
});
Route::get('/components-empty-state', function () {
    return view('pages.components-empty-state', ['type_menu' => 'components']);
});
Route::get('/components-gallery', function () {
    return view('pages.components-gallery', ['type_menu' => 'components']);
});
Route::get('/components-hero', function () {
    return view('pages.components-hero', ['type_menu' => 'components']);
});
Route::get('/components-multiple-upload', function () {
    return view('pages.components-multiple-upload', ['type_menu' => 'components']);
});
Route::get('/components-pricing', function () {
    return view('pages.components-pricing', ['type_menu' => 'components']);
});
Route::get('/components-statistic', function () {
    return view('pages.components-statistic', ['type_menu' => 'components']);
});
Route::get('/components-tab', function () {
    return view('pages.components-tab', ['type_menu' => 'components']);
});
Route::get('/components-table', function () {
    return view('pages.components-table', ['type_menu' => 'components']);
});
Route::get('/components-user', function () {
    return view('pages.components-user', ['type_menu' => 'components']);
});
Route::get('/components-wizard', function () {
    return view('pages.components-wizard', ['type_menu' => 'components']);
});

// forms
Route::get('/forms-advanced-form', function () {
    return view('pages.forms-advanced-form', ['type_menu' => 'forms']);
});
Route::get('/forms-editor', function () {
    return view('pages.forms-editor', ['type_menu' => 'forms']);
});
Route::get('/forms-validation', function () {
    return view('pages.forms-validation', ['type_menu' => 'forms']);
});

// google maps
// belum tersedia

// modules
Route::get('/modules-calendar', function () {
    return view('pages.modules-calendar', ['type_menu' => 'modules']);
});
Route::get('/modules-chartjs', function () {
    return view('pages.modules-chartjs', ['type_menu' => 'modules']);
});
Route::get('/modules-datatables', function () {
    return view('pages.modules-datatables', ['type_menu' => 'modules']);
});
Route::get('/modules-flag', function () {
    return view('pages.modules-flag', ['type_menu' => 'modules']);
});
Route::get('/modules-font-awesome', function () {
    return view('pages.modules-font-awesome', ['type_menu' => 'modules']);
});
Route::get('/modules-ion-icons', function () {
    return view('pages.modules-ion-icons', ['type_menu' => 'modules']);
});
Route::get('/modules-owl-carousel', function () {
    return view('pages.modules-owl-carousel', ['type_menu' => 'modules']);
});
Route::get('/modules-sparkline', function () {
    return view('pages.modules-sparkline', ['type_menu' => 'modules']);
});
Route::get('/modules-sweet-alert', function () {
    return view('pages.modules-sweet-alert', ['type_menu' => 'modules']);
});
Route::get('/modules-toastr', function () {
    return view('pages.modules-toastr', ['type_menu' => 'modules']);
});
Route::get('/modules-vector-map', function () {
    return view('pages.modules-vector-map', ['type_menu' => 'modules']);
});
Route::get('/modules-weather-icon', function () {
    return view('pages.modules-weather-icon', ['type_menu' => 'modules']);
});

// auth
Route::get('/auth-forgot-password', function () {
    return view('pages.auth-forgot-password', ['type_menu' => 'auth']);
});
Route::get('/auth-login', function () {
    return view('pages.auth-login', ['type_menu' => 'auth']);
});
Route::get('/auth-login2', function () {
    return view('pages.auth-login2', ['type_menu' => 'auth']);
});
Route::get('/auth-register', function () {
    return view('pages.auth-register', ['type_menu' => 'auth']);
});
Route::get('/auth-reset-password', function () {
    return view('pages.auth-reset-password', ['type_menu' => 'auth']);
});

// error
Route::get('/error-403', function () {
    return view('pages.error-403', ['type_menu' => 'error']);
});
Route::get('/error-404', function () {
    return view('pages.error-404', ['type_menu' => 'error']);
});
Route::get('/error-500', function () {
    return view('pages.error-500', ['type_menu' => 'error']);
});
Route::get('/error-503', function () {
    return view('pages.error-503', ['type_menu' => 'error']);
});

// features
Route::get('/features-activities', function () {
    return view('pages.features-activities', ['type_menu' => 'features']);
});
Route::get('/features-post-create', function () {
    return view('pages.features-post-create', ['type_menu' => 'features']);
});
Route::get('/features-post', function () {
    return view('pages.features-post', ['type_menu' => 'features']);
});
Route::get('/features-profile', function () {
    return view('pages.features-profile', ['type_menu' => 'features']);
});
Route::get('/features-settings', function () {
    return view('pages.features-settings', ['type_menu' => 'features']);
});
Route::get('/features-setting-detail', function () {
    return view('pages.features-setting-detail', ['type_menu' => 'features']);
});
Route::get('/features-tickets', function () {
    return view('pages.features-tickets', ['type_menu' => 'features']);
});

// utilities
Route::get('/utilities-contact', function () {
    return view('pages.utilities-contact', ['type_menu' => 'utilities']);
});
Route::get('/utilities-invoice', function () {
    return view('pages.utilities-invoice', ['type_menu' => 'utilities']);
});
Route::get('/utilities-subscribe', function () {
    return view('pages.utilities-subscribe', ['type_menu' => 'utilities']);
});

// credits
Route::get('/credits', function () {
    return view('pages.credits', ['type_menu' => '']);
});
