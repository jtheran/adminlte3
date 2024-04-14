<?php

namespace App\Http\Controllers;
use App\Models\Children;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class ChildrenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Paginator::defaultView('pagination::bootstrap-5');

        $child = Children::select()->paginate(10);
        return view("list-children", compact("child"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("create-children");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $user = Children::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'identification' => $request->identification,
                'identification_type' => $request->identification_type,
                'eps' => $request->eps,
                'age' => $request->age,
                'address' => $request->address,

            ])->save();

            DB::commit();

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect()->route('admin.children.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Children $Children)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $child = Children::find($id);
        return view("children-update", compact("child"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $child = Children::find($id);
        $child->fill($request->all())->save();
        return redirect()->route('admin.children.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $child = Children::find($id);
        $child->delete();
        return redirect()->route('admin.children.index');
    }
}
