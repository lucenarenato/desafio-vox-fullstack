<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\TaskList;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        $lists = TaskList::with('cards')
            ->orderBy('list_order')
            ->get();

        $labels = Label::all();

        return view('board', compact('lists'));
    }
}
