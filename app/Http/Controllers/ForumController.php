<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Forum;
use App\Tag;

class ForumController extends Controller
{
    function __construct()
    {
        return $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forum = Forum::orderBy('id','desc')->paginate(5);
        $tag = Tag::all();
        return view('forum.index',compact('forum','tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('forum.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validasi
        $this->validate($request,[
            'title'=>'required',
            'post'=>'required',
        ]);

        $forum = new Forum;

        $forum->title  = $request->title;
        $forum->slug   = str_slug($forum->title);
        $forum->post   = $request->post;
        $forum->user_id     = auth()->id();


        $forum->save();

        $forum->tag()->sync($request->tags);
        return redirect()->route('forum.show', $forum->slug)->withMessage('Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $forum = Forum::where('slug','=',$slug)->first();

        return view('forum.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $forum = Forum::where('slug','=',$slug);
        $tags = Tag::all();
        return view('forum.edit',compact('forum','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'post'=>'required',
        ]);
        $forum = Forum::where('id',$id)->first();
        $forum->title = $request['title'];
        $forum->post = $request['post'];
        $forum->update();
        $forum->tag()->sync($request->tags);
        return redirect()->route('forum.show', $forum->slug)->withMessage('Berhasil !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forum = Forum::find($id);
        $forum->delete();
        return redirect()->route('forum.index')->withMessage('Berhasil dihapus');
    }
}
