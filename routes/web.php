<?php



use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\DashboardController;




Auth::routes();


// Authentication Routes

Route::get('/', function () {
    return view('auth.login');
});

// 
Route::middleware(['auth'])->group(function () {

    //User Route 
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

    // adminDashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'homepage'])->name('user.dashboard');
    Route::get('/complain', [DashboardController::class, 'complainBox'])->name('complainBox');
    Route::get('/order', [DashboardController::class, 'Orders'])->name('orderpage');
    Route::get('/loginuser', [DashboardController::class, 'totalUser'])->name('totalUser');
    Route::resource('panels', PanelController::class);

    // Readings Routes
    Route::get('/panels/{id}/readings', [ReadingController::class, 'index'])->name('readings.index');

    Route::get('/panels/{panel}/readings/create', [ReadingController::class, 'create'])->name('readings.create');
    Route::post('/panels/{panel}/readings', [ReadingController::class, 'store'])->name('readings.store');



    //export csv and pdf
    Route::get('/readings/export/csv', [ReadingController::class, 'exportCsv'])->name('readings.export.csv');
    Route::get('/readings/export/pdf', [ReadingController::class, 'exportPdf'])->name('readings.export.pdf');

    ///pages route
    Route::get('/home', [PagesController::class, 'homepage'])->name('homepage');
    Route::get('/services', [PagesController::class, 'servicepage'])->name('servicepage');
    Route::get('/about', [PagesController::class, 'aboutpage'])->name('aboutpage');
    Route::get('/contact', [PagesController::class, 'contactpage'])->name('contactpage');
    // Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products');

    // contactROute
    Route::resource('/contacted', ContactController::class);

    // team controller
    Route::resource('teams', TeamController::class);

    // cart item
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');


    // checkoutpage
    Route::post('/checkout', [CartController::class, 'checkoutPage'])->name('checkout.page');
    Route::match(['get', 'post'], '/checkout/place', [CartController::class, 'placeOrder'])->name('checkout.place');



    // 
    Route::get('/checkout/stripe', [CartController::class, 'stripeCheckout'])->name('stripe.checkout');
    Route::post('/checkout/stripe/charge', [CartController::class, 'stripeCharge'])->name('stripe.charge');
    Route::post('/checkout/stripe/create-intent', [CartController::class, 'createIntent'])->name('stripe.intent');

    // paymentsuccessfull




    // 


    Route::get('/payment/success/{order}', function (Order $order) {
        return view('cart.payment_success', compact('order'));
    })->name('payment.success');




    // download order invoice
    Route::get('/order/{order}/invoice', [OrderController::class, 'downloadInvoice'])->name('order.invoice');


    //faqcontroller
    Route::resource('faqs', App\Http\Controllers\Admin\FaqController::class);
});
