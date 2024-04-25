<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Notifications\UserCreate;
use Illuminate\Support\Facades\Notification;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function index()
    {
        Paginator::defaultView('pagination::bootstrap-5');



        $user = User::where('name', 'LIKE', '%' . $this->search . '%')->select()->paginate(10);
        return view("list-users", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create-user");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'password' => 'required|string|max:255',
                // Puedes agregar más reglas de validación según tus necesidades
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'identification' => $request->identification,
                'identification_type' => $request->identification_type,
                'area_department' => $request->area_department,
                'position' => $request->position,
                'contact' => $request->contact,
                'age' => $request->age,
                'address' => $request->address,

            ]);

            DB::commit();

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }

        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        return view("profile", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view("user-update", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all())->save();
        return redirect()->route('admin.user.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($id!= 1){
            $user->delete();
            return redirect()->route('admin.user.index');
        }else{
            return redirect()->route('admin.user.index');
        }

    }
}
