<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoardMember;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Validation\ValidationException;
use Response;

class BoardMemberController extends Controller
{
    protected $boardMember;

    public function __construct(BoardMember $boardMember)
    {
        $this->$boardMember = $boardMember;
    }


    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @throws ValidationException
     */
    public function create(Request $request)
    {

        $this->validate(
            $request,
            [
                'owner_id' => 'required',
                'user_id' => 'required',
                'board_id' => 'required',
            ]
        );


        return $this->boardMember->createBoardMember($request, $request->user_id); //Auth::id()

    }

}
