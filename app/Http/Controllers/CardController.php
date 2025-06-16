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

    public function store(Request $request)
    {
        $date = now();
        $timestamp = $date->getTimestamp();
        $dateString = $date->format('n/j/Y g:i a');

        $card = Card::create([
            'title' => $request->title,
            'label_title' => $request->label_title,
            'label_color' => $request->label_color,
            'list_title' => $request->list_title,
            'card_order' => $request->card_order,
            'list_id' => $request->list_id,
            'card_timestamp' => $timestamp,
            'create_date' => $dateString,
            'labels_string' => $request->labels_string
        ]);

        return response()->json([
            'code' => 200,
            'id' => $card->id,
            'message' => 'New card added successfully'
        ]);
    }

    public function updatePosition(Request $request)
    {
        // Update card position logic
    }
}
