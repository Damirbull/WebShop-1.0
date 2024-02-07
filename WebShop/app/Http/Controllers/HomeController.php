<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class HomeController extends Controller
{
    public function home(Request $request)
    {
    $userName = $this->getUserName();
    $carts = Cart::all();
    $actives = Cart::where('is_active', 1)->get();

    return view('home', ['userName' => $userName, 'cart' => $carts, 'active' => $actives]);
    }

    private function getUserName()
    {
        if (Auth::check()) {
            return Auth::user()->name;
        }

        return null; // или другое значение по умолчанию, если пользователь не аутентифицирован
    }

    public function admin(Request $request)
    {
        $userName = $this->getUserName();
        $carts = Cart::all();
        $actives = Cart::where('is_active', 1)->get();
        return view('admin', ['userName' => $userName, 'cart' => $carts, 'active' => $actives]);
    }
    public function activate($id)
    {
        $product = Cart::findOrFail($id);
        $product->is_active = 1;
        $product->save();

        return response()->json(['success' => true]);

    }
    public function delete(Request $request, $id)
    {
        $product = Cart::findOrFail($id);
        $product->delete();

        return response()->json(['success' => true]);
    }

    public function catalog(Request $request)
    {
        $currentUserId = auth()->id();
        $userName = $this->getUserName();
        $carts = Cart::all();
        $actives = Cart::where('is_active', 1)->get();
        return view('catalog', ['userName' => $userName, 'cart' => $carts, 'active' => $actives,'currentUserId' => $currentUserId]);
    }
}
