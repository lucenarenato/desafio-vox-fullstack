<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\TaskList;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function store(Request $request)
    {
        $label = Label::create([
            'title' => $request->title,
            'color' => $request->color
        ]);

        return response()->json([
            'code' => 200,
            'id' => $label->id,
            'message' => 'New label added successfully'
        ]);
    }
}
