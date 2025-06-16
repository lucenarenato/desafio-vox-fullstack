<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function store(Request $request)
    {
        $date = now();
        $timestamp = $date->getTimestamp();
        $dateString = $date->format('n/j/Y g:i a');

        $list = TaskList::create([
            'title' => $request->title,
            'list_order' => $request->order,
            'createdate' => $dateString,
            'list_timestamp' => $timestamp
        ]);

        return response()->json([
            'code' => 200,
            'id' => $list->id,
            'message' => 'new list added successfully'
        ]);
    }
}
