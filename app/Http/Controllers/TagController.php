<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
    	$tags = Tag::all();
    	return view('tag.index',compact('tags'));
    }
     public function store(Request $request)
    {
        //validasi
        $this->validate($request,[
            'nama'=>'required',
        ]);

        $tag = Tag::create($request->all());
        return redirect()->route('tag.index')->withMessage('Berhasil dibuat');
    }

    public function edit($id)
    {
    	$tags = Tag::find($id);
    	return view('tag.edit',compact('tags'));
    }
    public function update(Request $request, $id)
    {
    	$this->validate($request,[
            'nama'=>'required'
        ]);
        $tags = Tag::where('id',$id)->first();
        $tags->nama = $request['nama'];
        $tags->update();
        return redirect()->route('tag.index')->withMessage('Update Berhasil !!');
    }

    public function destroy($id)
    {
    	$tags = Tag::find($id);
    	$tags->delete();
    	return redirect()->route('tag.index')->withMessage('Delete Berhasil !!');
    }
}
