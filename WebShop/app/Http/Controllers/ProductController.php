<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function update(Request $request, $id)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'genre' => 'required|string',
            'price' => 'required|numeric',
            'photo_path' => 'nullable|image',
        ]);

        // Обновление данных в базе данных
        $product = Cart::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->genre = $request->genre;
        $product->price = $request->price;
        if ($request->hasFile('photo_path')) {
            // Удаляем старое изображение, если оно есть
            if ($product->photo_path) {
                Storage::delete($product->photo_path);
            }
            // Сохраняем новое изображение в нужную папку с указанным именем
            $imagePath = $request->file('photo_path')->storeAs('public/image', $request->file('photo_path')->hashName());
            // Обновляем путь к изображению в базе данных
            $product->photo_path = str_replace('public', 'storage', $imagePath);
        }

        $product->save();

        return redirect()->back()->with('success', 'Product updated successfully');
    }


}
