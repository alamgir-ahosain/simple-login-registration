<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userinfo;

use function Pest\Laravel\post;

class profileController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function profilePost(Request $request)
    {

        $id = auth::user()->id;
        $userinfo = userinfo::findOrFail($id);
        // print_r($userinfo);


        $imagePath = public_path('images/' . $userinfo->image);
        unlink($imagePath);

        //upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        $userinfo->name = $request->name;
        $userinfo->image = $imageName;


        $userinfo->save();
        return redirect()->route('profile');
    }





    //_____________________TODO list________________________


    // public function todo()
    // {
    //     return view('todo', ['todolists' => todolist::all()]);
    // }

    public function todo()
    {
        $todolists = todolist::all();
        return view('todo', compact('todolists'));
    }


    public function todoPost(Request $request)
    {
        $todolist = new todolist();


        $todolist->name = $request->name;
        $todolist->status = $request->status;
        $todolist->info = $request->info;

        $todolist->save();
        return redirect()->route('todo');
    }


    public function deleteTodo($id)
    {
        $todolist = todolist::findOrFail($id);
        $todolist->delete();
        return redirect('todo');
    }
    public function updateTodo(Request $request, $id)
    {

        //dd($id);
        $todolist = todolist::findOrFail($id);

        $todolist->name = $request->name;
        $todolist->status = $request->status;
        $todolist->info = $request->info;
        $todolist->save();
        return redirect()->route('todo');
    }
}
