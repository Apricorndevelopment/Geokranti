<?php

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PackageAssignmentController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UserController;
use App\Models\Package2;
use App\Models\Package2Details;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/test-mail', function () {
    \Illuminate\Support\Facades\Mail::raw('This is a test email.', function ($message) {
        $message->to('developerapricorn1234@gmail.com')->subject('Test Mail');
    });

    return "Mail sent!";
});
Route::get('register', [AuthController::class, 'auth'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/login', [AuthController::class, 'logindetails'])->name('auth.login');
// User dashboard
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Route::middleware(['auth'])->group(function () {

//     Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
//     Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
//     Route::put('/profile/update', [UserController::class, 'update'])->name('user.profile.update');

//     Route::post('/purchase-package', [UserController::class, 'purchasePackage'])->name('user.purchase-package');
//     Route::get('/my-packages', [PackageAssignmentController::class, 'viewUserPackage'])->name('user.packages');
//     Route::get('/user/viewuser', [AuthController::class, 'showTreeRecursive'])->name('user.view');

//     Route::get('/get-package-rates/{packageId}', function ($packageId) {
//         $rates = Package2Details::where('package2_id', $packageId)->get();
//         return response()->json($rates);
//     });
//     Route::get('/get-package-price/{packageId}', function ($packageId) {
//         $package = Package2::findOrFail($packageId);
//         return response()->json([
//             'price' => $package->price,
//             'user_balance' => Auth::check() ? Auth::user()->points_balance : 0
//         ]);
//     });
//     Route::get('/package2-purchase', [UserController::class, 'showPurchaseForm'])->name('package2.purchase');
//     Route::post('/package2-purchase', [UserController::class, 'processPurchase'])->name('package2.process-purchase');
// });

Route::middleware(['auth'])->group(function () {

    Route::middleware(['auth', 'password.age'])->group(function () {
        // User dashboard routes

        // Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
        Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
        Route::put('/profile/update', [UserController::class, 'update'])->name('user.profile.update');
    });


    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'edit'])->name('user.profile.edit');
    Route::put('/profile/update', [UserController::class, 'update'])->name('user.profile.update');

    Route::post('/purchase-package', [UserController::class, 'purchasePackage'])->name('user.purchase-package');
    Route::get('/my-packages', [PackageAssignmentController::class, 'viewUserPackage'])->name('user.packages');
    Route::get('/user/viewuser', [AuthController::class, 'showTreeRecursive'])->name('user.view');

    Route::get('/user/commissions/level1', [UserController::class, 'level1Commissions'])->name('user.commissions.level1');
    Route::get('/user/commissions/level2', [UserController::class, 'level2Commissions'])->name('user.commissions.level2');
    Route::get('/user/reports/level-income', [UserController::class, 'levelIncomeReport'])->name('user.reports.level-income');

    Route::get('/get-package-rates/{packageId}', function ($packageId) {
        $rates = Package2Details::where('package2_id', $packageId)->get();
        return response()->json($rates);
    });
    Route::get('/get-package-price/{packageId}', function ($packageId) {
        $package = Package2::findOrFail($packageId);
        return response()->json([
            'price' => $package->price,
            'user_balance' => Auth::check() ? Auth::user()->points_balance : 0
        ]);
    });
    Route::get('/package2-purchase', [UserController::class, 'showPurchaseForm'])->name('package2.purchase');
    Route::post('/package2-purchase', [UserController::class, 'processPurchase'])->name('package2.process-purchase');
});

Route::get('/get-user-details/{ulid}', [AuthController::class, 'getUserDetails']);
Route::get('/admin/get-user-details/{ulid}', [AuthController::class, 'getUserDetails']);

Route::middleware(['auth'])->group(function () {
    Route::post('/user/fetch-sub-users', [AuthController::class, 'fetchSubUsers'])->name('user.subusers');
});

Route::get('adminlogin', [AdminController::class, 'index'])->name('admin.login');
Route::post('adminlogin', [AdminController::class, 'login'])->name('admin.login.post');

// Admin Protected Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('admindashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('adminlogout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/admin/profile/update', [AdminController::class, 'update'])->name('admin.profile.update');

    Route::get('/admin/viewmember', [AdminController::class, 'viewmemeber'])->name('admin.viewmember');
    Route::get('/admin/editmember/{id}', [AdminController::class, 'editMember'])->name('admin.editmember');
    Route::put('/admin/update-member/{id}', [AdminController::class, 'updateMember'])->name('admin.updatemember');
    Route::delete('/admin/delete-member/{id}', [AdminController::class, 'deleteMember'])->name('admin.deletemember');
    Route::get('/admin/user-tree/{adminId}', [AuthController::class, 'showUserTreeFromAdmin'])->name('admin.user.tree');

    Route::prefix('admin')->group(function () {
        Route::get('/wallet', [WalletController::class, 'index'])->name('admin.wallet');
        Route::post('/get-user-by-ulid', [WalletController::class, 'getUserByUlid']);
        Route::post('/add-points', [WalletController::class, 'addPoints'])->name('admin.addPoints');
        Route::post('/add-royalty', [WalletController::class, 'addRoyalty'])->name('admin.addRoyalty');

        Route::get('/package', [PackageController::class, 'package'])->name('admin.package');
        Route::get('/packages/package1/create', [PackageController::class, 'createPackage1'])->name('admin.package1.create');
        Route::get('/packages/package2/create', [PackageController::class, 'createPackage2'])->name('admin.package2.create');
        Route::post('/packages/package1', [PackageController::class, 'storePackage1'])->name('admin.package1.store');
        Route::post('/packages/package2', [PackageController::class, 'storePackage2'])->name('admin.package2.store');

        Route::get('/packages/package1/{id}/edit', [PackageController::class, 'editPackage1'])->name('admin.package1.edit');
        Route::put('/packages/package1/{id}', [PackageController::class, 'updatePackage1'])->name('admin.package1.update');
        Route::delete('/packages/package1/{id}', [PackageController::class, 'destroyPackage1'])->name('admin.package1.destroy');

        Route::get('/packages/package2/{id}/edit', [PackageController::class, 'editPackage2'])->name('admin.package2.edit');
        Route::put('/packages/package2/{id}', [PackageController::class, 'updatePackage2'])->name('admin.package2.update');
        Route::delete('/packages/package2/{id}', [PackageController::class, 'destroyPackage2'])->name('admin.package2.destroy');

        Route::prefix('admin/packages')->name('admin.packages.')->group(function () {
            Route::get('/assign', [PackageAssignmentController::class, 'index'])->name('assign');
            Route::post('/search', [PackageAssignmentController::class, 'search'])->name('search');
            Route::post('/assign', [PackageAssignmentController::class, 'assignPackage'])->name('assign.submit');
        });
    });
});


Route::middleware(['auth'])->group(function () {
    Route::get('/user/viewwallet', [UserController::class, 'viewWallet'])->name('user.viewwallet');
});

Route::get('/check-sponsor/{id}', function ($id) {
    $sponsor = User::where('ulid', $id)->first();

    if ($sponsor) {
        return response()->json([
            'exists' => true,
            'name' => $sponsor->name ?? $sponsor->name
        ]);
    } else {
        return response()->json(['exists' => false]);
    }
})->name('check.sponsor');

Route::get('/check-parent/{id}', function ($id) {
    $parent = User::where('ulid', $id)->first();

    if ($parent) {
        return response()->json([
            'exists' => true,
            'name' => $parent->name ?? $parent->name
        ]);
    } else {
        return response()->json(['exists' => false]);
    }
})->name('check.parent');

Route::post('/send-email-otp', [AuthController::class, 'sendEmailOtp'])->name('send.email.otp');

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');

// Handle email submit (send OTP)
Route::post('/forgot-password', [AuthController::class, 'sendOtp'])->name('password.email');

// Show OTP + new password form
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');

// Handle OTP + password submission
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
