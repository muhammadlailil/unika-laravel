<?php

use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Middleware\FrontEndMiddleware;
use App\Http\Controllers\FrontEnd\MenuController;
use App\Http\Controllers\FrontEnd\LoginController;
use App\Http\Controllers\FrontEnd\AboutUsController;
use App\Http\Controllers\Backend\AdminBooksController;
use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\FrontEnd\DashboardController;
use App\Http\Controllers\Backend\AdminAuthorController;
use App\Http\Controllers\Backend\AdminDashboardController;
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

Route::group([
    'prefix'=> 'admin',
    'as' => 'admin.'
],function(){

    Route::get('login',[AdminLoginController::class,'index'])->name('login');
    Route::post('login',[AdminLoginController::class,'postLogin'])->name('post-login'); //admin.post-login

    Route::middleware(['backend'])->group(function(){
        Route::get('dashboard',[AdminDashboardController::class,'index'])->name('dashboard');
        // Route::get('url yang kita mau',[class controller kita, 'method di controller kita'])->name('nama route kita');  
        
        Route::controller(AdminAuthorController::class)->group(function(){
            Route::get('author','index')->name('author');
            Route::get('author/create','getCreate')->name('author-create');
            Route::post('author/save','postSave')->name('author-save');
            Route::get('author/edit/{id}','getEdit')->name('author-edit');
            Route::post('author/update','postUpdate')->name('author-update');
            Route::get('author/delete/{id}','getDelete')->name('author-delete');
        });

        Route::controller(AdminBooksController::class)->group(function(){
            Route::get('books','index')->name('books');
            Route::get('books/create','getCreate')->name('books-create');
            Route::post('books/save','postSave')->name('books-save');
            Route::get('books/edit/{id}','getEdit')->name('books-edit');
            Route::post('books/update','postUpdate')->name('books-update');
            Route::get('books/delete/{id}','getDelete')->name('books-delete');
        });
    });

});

Route::get('simlink',function(){
    return app('files')->link(storage_path('app/uploads'), public_path('uploads'));
});