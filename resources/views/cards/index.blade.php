@extends('layouts.new')

@section('content')
<div class="container">
    @foreach ($lists as $list)
        <div class="drop-columns" id="{{ $list->id }}" data-list-title="{{ $list->title }}">
            <div class="list-title">{{ $list->title }}</div>
            <div class="cards_container">
                @foreach ($list->cards as $card)
                    @include('cards.partials.card', [
                        'card' => $card,
                        'loopIndex' => $loop->index
                    ])
                @endforeach
            </div>
            <button class="add_new_card_btn">+ Add Card</button>
        </div>
    @endforeach
</div>

@include('modals.label_modal')
@include('modals.checklist_modal')

@endsection

@push('scripts')
<script src="{{ asset('js/todoSystem.js') }}"></script>
@endpush
