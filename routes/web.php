<?php

use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Middleware\FrontEndMiddleware;
use App\Http\Controllers\FrontEnd\MenuController;
use App\Http\Controllers\FrontEnd\LoginController;
use App\Http\Controllers\FrontEnd\AboutUsController;
use App\Http\Controllers\FrontEnd\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $dateFormat = DateHelper::dateFormat('d-m-Y');
    // $haloDunia = haloDunia();
    // dd($haloDunia);
    App::setLocale(session('bahasa'));
    return view('welcome');
});

Route::get('profile/{nama}/{alamat}/{hobi}',function($nama,$alamat,$hobi){
    return view('profile',[
        'nama' =>$nama,
        'alamat' =>$alamat,
        'hobi' =>$hobi,
    ]);
});

Route::view('profile-2','profile');

Route::post('post-request',function(){
});
Route::put('put-request',function(){
});
Route::delete('delete-request',function(){
});

Route::get('berita/{slug}',function($slug){
    return view('berita.detail',[
        'slug' => $slug
    ]);
});


Route::get('profile',function(){
    return view('profile',[
        'nama' => 'Mahfud',
        'alamat' => 'Jepara',
        'hobi' => 'Lari',
    ]);
})->name('profile');


Route::group([
    'middleware' => ['web'],
    'prefix' => 'wp-admin',
    'controller' => PostController::class
],function(){
    //ini dattar routing group
    Route::get('home',function(){
        // url wp-admin/home
        return 'wp admin home';
    })->name('admin-home');
    Route::get('berita',function(){
        // url wp-admin/berita
    });

    Route::get('post','getPost');
});


Route::get('post',[PostController::class,'getPost']);


Route::get('about-us',[AboutUsController::class,'index'])->name('about-us');
Route::get('about-us/detail/{id}',[AboutUsController::class,'detail'])->name('about-us.detail');

Route::view('profile','frontend.profile')->name('profile');

Route::controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login');
    Route::post('login','postLogin')->name('post.login');
    Route::get('logout','getLogout')->name('logout');
});

Route::middleware(['frontend'])->group(function(){
    // middleware dengan alias name
    Route::controller(DashboardController::class)->group(function(){
        Route::get('dashboard','index')->name('dashboard');
    });

    Route::controller(MenuController::class)->group(function(){
        Route::get('admin','getAdmin')->name('menu.admin')->middleware('privileges:admin');
        Route::get('user','getUser')->name('menu.user')->middleware('privileges:admin|user');
    });
});;

Route::middleware([FrontEndMiddleware::class])->group(function(){
    // middleware dengan class
});;

Route::get('set-session',function(Request $request){
    $sessionName = $request->name;
    $sessionValue = $request->value;

    session()->put($sessionName,$sessionValue);

    // session()->put('nama_session','value session');
    // session()->put('admin_id','value session');
    // session()->put('admin_email','value session');
    return 'Session berhasil diset';
});

Route::get('get-session',function(Request $request){
    $sessionName = $request->name;
    return session($sessionName); // session()->get('nama_session');
});