<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $feedback = Feedback::all();
        return view('feedback.index')->with('feedback',$feedback);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        Feedback::create($input);
        return redirect('/product/feedback/create')->with('flash_message','Feedback success send!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($FB_id)
    {
        //
        $feedback = Feedback::find($FB_id);
        return view('feedback.show')->with('feedback',$feedback);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $feedback = Feedback::find($id);
        return view('feedback.edit')->with('feedback',$feedback);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $FB_id)
    {
        //
        $feedback = Feedback::find($FB_id);
        $input = $request->all();
        $feedback -> update($input);
        return redirect('/admin/product/feedback')->with('flash_message','feedback Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($FB_id)
    {
        //
        Feedback::destroy($FB_id);
        return redirect('admin/product/feedback')->with('flash_message', 'Feedback deleted');
    }
}
