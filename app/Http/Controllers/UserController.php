<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use \App\Models\Board;
use App\Models\BoardCard;
use App\Models\Department;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $board;
    protected $user;

    public function __construct(Board $board, User $user)
    {
        $this->board = $board;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $data = User::latest()->paginate(5);

        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $roles = Role::pluck('name','name')->all();

        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }

    public function getProfile()
    {
        $boards = $this->board->getUserBoards(Auth::id());
        $page = 'profile';
        return view('user.profile', compact('boards', 'page'));
    }

    /**
     * Get the dashboard view
     * @return view home view
     */
    public function getDashboard()
    {
        $boardCreationPermission = false;

        $auth_id = Auth::id();

        $departmentWithOwnerAndBoard = Department::with(['boards', 'owner']);

        $boardCards = BoardCard::with(['boards', 'owner'])->where('owner_id', $auth_id);

        if ($boardCards->count()) {
            $boardCreationPermission = true;
            $boards = Board::with(['boardcard' => function ($query) use ($auth_id) {
                $query->where('owner_id', $auth_id);
            }])->get();
        }

        if (env('USER_ADMIN_ID1') == $auth_id || env('USER_ADMIN_ID2') == $auth_id) {
            $departments = $departmentWithOwnerAndBoard->get();
            $boardCreationPermission = false;
        }

        $departments = $departmentWithOwnerAndBoard->where('owner_id', $auth_id)->get();
        if (sizeof($departments) > 0) {
            $boardCreationPermission = false;
        }

        //dd($departments->toArray());
        $b = Board::with('owner')->where('owner_id', $auth_id)->get();
        if (sizeof($b) > 0) {
            $boardCreationPermission = false;
            $boards = Board::with('owner')->where('owner_id', $auth_id)->get();
        }

        $users = User::all();


        if (!isset($boards)) {
            $boards = [];
        }

        if (!$departments->count()) {
            $departments = array();
            foreach ($boards as $board) {
                if (!$this->existIn($departments, $board->department))
                    $departments[] = $board->department;
            }
        }


        if (!isset($starredBoards)) {
            $starredBoards = [];
        }

        return view('user.home', compact('boards', 'starredBoards', 'departments', 'boardCreationPermission', 'users'));
    }


    private function existIn($departments, $department)
    {
        foreach ($departments as $dep) {
            if ($dep->id == $department->id)
                return true;
        }
        return false;
    }

    /**
     * Get the board view
     * @return view board view
     */
    public function getBoard()
    {
        return view('user.board');
    }
}
