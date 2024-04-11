<?php

namespace App\Http\Controllers;
use App\Models\Parents;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Paginator::defaultView('pagination::bootstrap-5');

        $parent = Parents::select()->paginate(10);
        return view("list-parents", compact("parent"));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("create-parent");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'identification' => 'required|string|max:255',
                'eps' => 'required|string|max:255',
                'contact' => 'required|string|max:255',
                // Puedes agregar más reglas de validación según tus necesidades
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            Parents::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'identification' => $request->identification,
                'identification_type' => $request->identification_type,
                'job' => $request->job,
                'position' => $request->position,
                'eps' => $request->eps,
                'contact' => $request->contact,
                'age' => $request->age,
                'address' => $request->address,
                'email' => $request->email,

            ])->save();

            DB::commit();

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect()->route('admin.parent.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parents $Parents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $parent = Parents::find($id);
        return view("parents-update", compact("parent"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $parent = Parents::find($id);
        $parent->fill($request->all())->save();
        return redirect()->route('admin.parent.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $parent = Parents::find($id);
        $parent->delete();
        return redirect()->route('admin.parent.index');
    }
}
