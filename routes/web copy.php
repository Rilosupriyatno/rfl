<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Setting\CityController;
use App\Http\Controllers\Setting\UserController;
use App\Http\Controllers\Setting\VillageController;
use App\Http\Controllers\Setting\DistrictController;
use App\Http\Controllers\Setting\ProvinceController;
use App\Http\Controllers\Setting\UserRoleController;
use App\Http\Controllers\Master\Product\GradeController;
use App\Http\Controllers\Administration\Seller\ChatController;
use App\Http\Controllers\Administration\Seller\AdministrationSellerController;
use App\Http\Controllers\Administration\Order\AdministrationOrderController;
use App\Http\Controllers\Administration\Katalog\ProductController as KatalogProductController;
use App\Http\Controllers\Administration\Katalog\ServiceController;
use App\Http\Controllers\Administration\Cart\CartController;
use App\Http\Controllers\Administration\Cart\ShipmentController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Rajaongkir\RajaongkirController;
use App\Http\Controllers\Midtrans\MidtransController;



Route::post('payments/midtrans-notification', [MidtransController::class, 'receive']);
Route::post('payments/midtrans-success', [MidtransController::class, 'success']);


Route::prefix('rajaongkir')->name('rajaongkir.')->group(function () {
    Route::post('/cost', [RajaongkirController::class, 'cost'])->name('cost');
    Route::get('/province/{id}', [RajaongkirController::class, 'getCity'])->name('city');
});

Route::namespace('Portal')->middleware('guest')->group(function () {
    // Route::get('/', [PortalController::class, 'index'])->name('portal');
    Route::get('/', [PortalController::class, 'index']);
    Route::get('/menu', [PortalController::class, 'index_menu']);
    Route::get('/sign-in', [PortalController::class, 'signin'])->name('portal');
    Route::get('/sign-up-phone', [PortalController::class, 'signup_phone']);
    Route::get('/sign-up-verify-code', [PortalController::class, 'signup_verify_code']);
    Route::get('/sign-up-verify-fullname', [PortalController::class, 'signup_verify_fullname']);
    Route::get('/sign-up-verify-pin', [PortalController::class, 'signup_verify_pin']);
    Route::get('/sign-up-verify-pin-confirm', [PortalController::class, 'signup_verify_pin_confirm']);
    Route::post('/auth', [PortalController::class, 'auth']);
});

Route::namespace('Register')->middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register-seller', [RegisterController::class, 'store_seller']);
    Route::post('/register-buyer', [RegisterController::class, 'store_buyer']);
    Route::get('/verify', [RegisterController::class, 'verify'])->name('verify');
    Route::post('/verify', [RegisterController::class, 'verify_otp'])->name('verify_otp');
    // Route::get('/verification/{id}', [RegisterController::class, 'verifyEmail'])->name('verification');
});

Route::namespace('Dashboard')->prefix('dashboard')->middleware('auth:web')->group(function () {
    Route::get('/', [LandingController::class, 'menu'])
        ->middleware('auth.restrict:Buyer');
    Route::middleware('auth.restrict:SuperAdmin')->group(function () {
        Route::get('/superadmin', [LandingController::class, 'superadmin']);
        Route::Put('/superadmin/{id}', [LandingController::class, 'orderDetailsUpdate']);
    });
    Route::get('/seller', [LandingController::class, 'menu_seller'])
        ->middleware('auth.restrict:Petani');
    Route::get('/logout', [PortalController::class, 'logout']);
});

Route::namespace('Landing')->prefix('landing')->middleware('auth:web')->group(function () {
    Route::prefix('menu')->middleware('auth:web')->group(function () {
        Route::get('/', [LandingController::class, 'pharmacy']);
    });
});

Route::namespace('Setting')->prefix('setting')->middleware('auth:web')->group(function () {
    Route::prefix('role')->middleware('auth:web')->group(function () {
        Route::get('/', [UserRoleController::class, 'index']);
        Route::get('/{userRole}/edit', [UserRoleController::class, 'edit']);
        Route::put('/update', [UserRoleController::class, 'update']);
        Route::get('/options', [UserRoleController::class, 'options']);
    });
    Route::prefix('user')->middleware('auth:web')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/create', [UserController::class, 'create']);
        Route::post('/store', [UserController::class, 'store']);
        Route::get('/{user}/edit', [UserController::class, 'edit']);
        Route::delete('/{user}/delete', [UserController::class, 'delete']);
        Route::put('/update', [UserController::class, 'update']);
        Route::get('/options', [UserController::class, 'options']);
    });
    Route::prefix('province')->middleware('auth:web')->group(function () {
        Route::get('/', [ProvinceController::class, 'index']);
        Route::get('/create', [ProvinceController::class, 'create']);
        Route::post('/store', [ProvinceController::class, 'store']);
        Route::get('/{province}/edit', [ProvinceController::class, 'edit']);
        Route::put('/update', [ProvinceController::class, 'update']);
        Route::delete('/{province}/delete', [ProvinceController::class, 'delete']);
        Route::get('/options', [ProvinceController::class, 'options']);
    });
    Route::prefix('city')->middleware('auth:web')->group(function () {
        Route::get('/', [CityController::class, 'index']);
        Route::get('/create', [CityController::class, 'create']);
        Route::post('/store', [CityController::class, 'store']);
        Route::get('/{city}/edit', [CityController::class, 'edit']);
        Route::put('/update', [CityController::class, 'update']);
        Route::delete('/{city}/delete', [CityController::class, 'delete']);
        Route::get('/options', [CityController::class, 'options']);
        Route::get('/options_city', [CityController::class, 'options_city']);
    });
    Route::prefix('district')->middleware('auth:web')->group(function () {
        Route::get('/', [DistrictController::class, 'index']);
        Route::get('/create', [DistrictController::class, 'create']);
        Route::post('/store', [DistrictController::class, 'store']);
        Route::get('/{district}/edit', [DistrictController::class, 'edit']);
        Route::put('/update', [DistrictController::class, 'update']);
        Route::delete('/{district}/delete', [DistrictController::class, 'delete']);
        Route::get('/options', [DistrictController::class, 'options']);
    });
    Route::prefix('village')->middleware('auth:web')->group(function () {
        Route::get('/', [VillageController::class, 'index']);
        Route::get('/create', [VillageController::class, 'create']);
        Route::post('/store', [VillageController::class, 'store']);
        Route::get('/{village}/edit', [VillageController::class, 'edit']);
        Route::put('/update', [VillageController::class, 'update']);
        Route::delete('/{village}/delete', [VillageController::class, 'delete']);
        Route::get('/options', [VillageController::class, 'options']);
    });
});

Route::namespace('Master')->prefix('master')->middleware('auth:web')->group(function () {
    Route::prefix('grade')->middleware('auth:web')->group(function () {
        Route::get('/options', [GradeController::class, 'options']);
    });
    Route::prefix('verif')->middleware('auth:web')->group(function () {
        Route::get('/', [UserController::class, 'index_verif']);
        Route::post('/{user}/user', [UserController::class, 'verif']);
    });
});

Route::namespace('Transaction')->prefix('transaction')->middleware('auth:web')->group(function () {
    Route::get('/transaction-list', [TransactionController::class, 'transaction_list'])->name('transaction_list');
    Route::get('/invoice', [TransactionController::class, 'invoice'])->name('invoice');
});

Route::namespace('Administration')->prefix('administration')->group(function () {
    Route::prefix('chat')->middleware('auth:web')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('chat');
    });

    Route::prefix('cart')->middleware('auth:web')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart');
        Route::get('/redirect_shipment', [ShipmentController::class, 'redirect_shipment'])->name('redirect_shipment');
        Route::get('/shipment', [ShipmentController::class, 'shipment'])->name('shipment');
        Route::post('/create_snaptoken', [ShipmentController::class, 'create_snaptoken'])->name('create_snaptoken');
        Route::put('/add/{product}', [CartController::class, 'add']);
        Route::put('/{orderDetails}/delete', [CartController::class, 'delete']);
        Route::post('/store', [CartController::class, 'store']);
        Route::put('/update', [CartController::class, 'update']);
        Route::get('/{product}/buy-directly', [CartController::class, 'add_buy_directly']);

        // MEEEEEE
        Route::put('/success-payment/{order_id}', [ShipmentController::class, 'success_payment']);
    });
    Route::prefix('buy-directly')->middleware('auth:web')->group(function () {
        Route::get('/', [CartController::class, 'buy_directly'])->name('buy_directly');
        Route::get('/{product}', [CartController::class, 'add_buy_directly']);
    });

    // Route for Order in
    Route::prefix('order-in')->middleware('auth:web')->group(function () {
        Route::get('/', [AdministrationOrderController::class, 'detailOrderIn']);
    });

    Route::prefix('seller')->middleware('auth:web')->group(function () {
        Route::get('/', [AdministrationSellerController::class, 'product']);
        Route::post('/store', [AdministrationSellerController::class, 'store']);
        Route::get('/{product}/product_detail', [AdministrationSellerController::class, 'product_detail']);
        Route::put('/{product}/store_detail', [AdministrationSellerController::class, 'store_detail']);
    });

    Route::prefix('katalog')->group(function () {
        Route::prefix('product')->group(function () {
            Route::get('/', [KatalogProductController::class, 'product']);
            Route::get('/{category}', [KatalogProductController::class, 'index'])->name('katalog');
            Route::put('/{product}/store_detail', [KatalogProductController::class, 'store_detail']);
            Route::get('/{product}/view', [KatalogProductController::class, 'view'])->name('product_view');
        });
        Route::prefix('service')->middleware('auth:web')->group(function () {
            Route::get('/', [ServiceController::class, 'product']);
            Route::post('/store', [ServiceController::class, 'store']);
            Route::get('/{product}/product_detail', [ServiceController::class, 'product_detail']);
            Route::put('/{product}/store_detail', [ServiceController::class, 'store_detail']);
        });
    });
});
