<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        if ($request->has("phase")) {
            $data = ToDo::where("title", "like", "%" . $request->phase . "%")
                ->whereOr("description", "like", "%" . $request->phase . "%")
                ->paginate($request->get("limit", 15));
        } else {
            $data = ToDo::paginate($request->get("limit", 15));
        }

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ToDo $toDo
     * @return \Illuminate\Http\Response
     */
    public function show(ToDo $toDo)
    {
        $toDo->load(["parent", "children", "file"]);
        return $toDo->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ToDo $toDo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ToDo $toDo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ToDo $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToDo $toDo)
    {
        //
    }
}
