<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToDoRequest;
use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{

    private $validationRules = [
        "title" => "required|min:3|max:190",
        "description" => "min:10|max:4294967295",
        "parent_id" => "exists:to_do,id",
        "priority" => "required|between:0,100"
    ];

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
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->validationRules);

        $data = $request->only(["title", "description", "progress", "priority", "parent_id"]);
        $data["owner_id"] = $request->user()->id;

        $toDo = ToDo::create($data);

        return ["status" => "suceess", "toDo" => $toDo];
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
        $this->validate($request, $this->validationRules);
        $toDo->fill($request->only(["title", "description", "progress", "priority", "parent_id"]));
        $toDo->save();

        return ["status" => "success", "to_do" => $toDo];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ToDo $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ToDo $toDo)
    {
        if ($request->user()->id != $toDo->owner_id) {
            abort(403);
        }
        $toDo->delete();
        return ["status" => "success"];
    }
}
