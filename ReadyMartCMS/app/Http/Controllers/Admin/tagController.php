<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Throwable;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = DB::table('tag')->get();
        return view("admin.pages.tags", compact('tags'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required|max:20',
        ]);

        $data = [
            'tags' => $request->tag
        ];

        try {
            DB::table("tag")->insert($data);

            $notification = [
                'message' => "Data successfully added",
                'alert-type' => "success"
            ];
        } catch (Throwable $e) {
            $notification = [
                'message' => "Something wrong happend",
                'alert-type' => "warning"
            ];
        }

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::table("tag")->where('id', $id)->delete();

            $notification = [
                'message' => "Data successfully deleted",
                'alert-type' => "success"
            ];
        } catch (Throwable $e) {
            $notification = [
                'message' => "Something wrong happend",
                'alert-type' => "warning"
            ];
        }

        return redirect()->back()->with($notification);
    }
}
