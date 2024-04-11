<?php

namespace App\Http\Controllers;
use App\Models\Children;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;



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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
