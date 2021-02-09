<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SessionsController;
use App\Models\Product;
use App\Models\Order;
use App\Models\Log;
use App\Models\OrderItem;
use App\Models\Category;

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
    if(auth()->check()) {
        return redirect()->to('/products');
    }

    return view('welcome');
});

Route::get('/register', function() {
    if(auth()->check()) {
        return redirect()->to('/products');
    }

    return view('register');
});

Route::post('register', [RegistrationController::class, 'store']);

Route::get('/products', function() {
    $allCategories = Category::get();
    $categories = [];
    foreach($allCategories as $c) {
        $categories[$c['id']] = $c;
    }

    $categoryId = isset($_GET['c']) ? ($_GET['c'] !== null ? $_GET['c'] : "") : "";
    $brand = isset($_GET['b']) ? ($_GET['b'] !== null ? urldecode($_GET['b']) : "") : "";

    if($categoryId == '' && $brand == '') {
        $products = Product::get();
    } else if($categoryId != '' && $brand == '') {
        $products = Product::where('category_id', $categoryId)->get();
    } else if($categoryId == '' && $brand != '') {
        $products = Product::where('brand', 'LIKE', "%".$brand."%")->get();
    } else {
        $products = Product::where('category_id', $categoryId)
            ->where('brand', 'LIKE', "%".$brand."%")
            ->get();
    }

    return view('product', ['products' => $products, 'categories' => $categories, 'category_id' => $categoryId, 'brand' => $brand]);
});

Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart']);

Route::get('cart', function() {
    if(!auth()->check()) {
        return redirect()->to('/products');
    }

    return view('cart');
});

Route::get('/orders', function() {
    if(!auth()->check()) {
        return redirect()->to('/products');
    }

    $allProducts = Product::get();
    $products = [];
    foreach($allProducts as $p) {
        $products[$p['id']] = $p;
    }

    $orders = Order::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
    if(!empty($orders)) {
        foreach($orders as $key => $value) {
            $amount = 0;
            $orders[$key]['items'] = OrderItem::where('order_id', $value['id'])->get();

            foreach($orders[$key]['items'] as $item) {
                $amount += $item['quantity'] * $item['price'];
            }

            $orders[$key]['amount'] = $amount;
        }
    }

    return view('order', ['products' => $products, 'orders' => $orders]);
});

Route::get('/logs', function() {
    if(!auth()->check()) {
        return redirect()->to('/products');
    }

    $logs = Log::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();

    return view('log', ['logs' => $logs]);
});

Route::patch('update-cart', [ProductsController::class, 'update']);
Route::delete('remove-from-cart', [ProductsController::class, 'remove']);
Route::get('place-order', [ProductsController::class, 'placeOrder']);

Route::post('/login', [SessionsController::class, 'store']);
Route::get('/logout', [SessionsController::class, 'destroy']);
