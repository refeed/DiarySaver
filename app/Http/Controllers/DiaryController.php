<?php

namespace App\Http\Controllers;

use App\Diary;
use App\Image;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diaries = Diary::select('id', 'content', 'created_at')
            ->where('user_id', $request->user()->id)
            ->paginate(5);

        return view('diary.index', compact('diaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Diary::$createRules);

        $diary = new Diary();
        $diary->content = $request->content;
        $diary->user_id = $request->user()->id;
        $diary->save();

        if ($request->hasFile('image')) {
            $image = new Image();
            $image->diary_id = $diary->id;

            $image_binary = $request->image;
            $filename = time() . "." . $image_binary->getClientOriginalName();
            \ImageIntervention::make($image_binary)->resize(200, 150)->save(public_path('thumb/' . $filename));
            $image_binary->move("images/", $filename);

            $image->image_path = $filename;
            $image->save();
        }

        return redirect(route('diary.index'))->with('msg', 'Diary successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #FIXME: Needs to verify if the current user is the owner of the diary
        $diary = Diary::find($id);
        return view('diary.show', compact('diary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diary = Diary::find($id);
        return view('diary.update', compact('diary'));
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
        $this->validate($request, Diary::$createRules);

        $diary = Diary::find($id);
        $diary->content = $request->content;
        $diary->save();
        return redirect(route('diary.index'))->with('msg', 'Diary successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diary = Diary::find($id);
        $diary->delete();
        return redirect(route('diary.index'))->with('msg', 'Diary successfully deleted');
    }
}
