<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create','edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index',[
            'posts'=>Post::orderBy('updated_at','desc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
            'is_published' =>$request->is_published==='on',
            'min_to_read' =>$request->min_to_read
        ]);
        return redirect (Route('blog.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return view('blog.show',[
        'posts' => Post::findOrFail($id)
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       return view ('blog.edit',[
        'posts' => Post::where('id', $id)->first()
       ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      Post::where('id', $id)->update(
        $request->except([
            '_token','_method'
            ]));

      return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect(route('dashboard'))->with('message', 'Post Has been Deleted.');
    }

    private function storeImage(Request $request)
    {
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image_path->extension(); 

        return $request->image_path->move(('images'), $newImageName);


    

    }
}
