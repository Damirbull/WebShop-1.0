<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function postcart(Request $request)
    {
    $userId = Auth::id();
    $imagePath = $request->file('image')->store('public/image');
    $imageUrl = Storage::url($imagePath);

    Cart::create([
        'user_id' => $userId,
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'genre' => $request->input('genre'),
        'price' => $request->input('price'),
        'photo_path' => $imageUrl,
    ]);
    return redirect()->route('home')->with('info', 'Ваш товар пошел на проверку, ожидайте добавление');
}
}
