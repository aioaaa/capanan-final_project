<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ToDo;

class ToDoController extends Controller
{
    public function showUser() {
        $todos = ToDo::all();
        return view('todo', compact('todos'));
    }
    // For adding of record
    public function ToDo(Request $request){
        ToDo::create([
            'user_id'      => session('user')->id,
            'product_name' => $request->product_name,
            'category'     => $request->category,
            'stock'        => $request->stock,
            'price'        => $request->price,
        ]);

        return back()->with('success', 'Product added successfully!');
    }

    public function showTodo(){

    $todos = ToDo::all();

    return view('todo', compact('todos'));
    }

    // For deletion of record
    public function deleteToDo($id){
        $todo = ToDo::where('id', $id)
        ->where('user_id', session('user')->id)
        ->first();

        if(!$todo){
            return back()->with('error', 'Unable to delete product');
        }
            $todo->delete();

            return back()->with('success', 'Product deleted successfully!');
        }

        // For updating of record
        public function updateToDo(Request $request, $id){
            $todo = ToDo::where('id', $id)
            ->where('user_id', session('user')->id)
            ->first();

            if(!$todo){
            return back()->with('error', 'Unable to update product');
        }

            $todo->update([
                'product_name' => $request->product_name,
                'category'     => $request->category,
                'stock'        => $request->stock,
                'price'        => $request->price,
            ]);

            return back()->with('success', 'Product updated successfully!');
        }
}
