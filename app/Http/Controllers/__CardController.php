<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Label;
use App\Models\ListModel;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        // Supondo que você tem modelos List, Label, Card
        $lists = ListModel::with('cards')->get();
        return view('cards.index', compact('lists'));
    }

    public function storeCard(Request $request)
    {
        // Validação e salvar card
        $card = Card::create($request->all());
        return response()->json(['code' => 200, 'id' => $card->id]);
    }

    public function updateCard(Request $request)
    {
        $card = Card::findOrFail($request->id);
        $card->update($request->all());
        return response()->json(['code' => 200]);
    }

    public function archiveCard(Request $request)
    {
        $card = Card::findOrFail($request->id);
        $card->delete();
        return response()->json(['code' => 200]);
    }

    public function getLabels()
    {
        $labels = Label::all();
        return response()->json($labels);
    }
}
