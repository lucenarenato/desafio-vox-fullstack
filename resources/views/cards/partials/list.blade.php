<div class="drop-columns"
     id="list_{{ $list->id }}"
     data-list-id="{{ $list->id }}"
     data-list-title="{{ $list->title }}"
     data-list-order="{{ $list->list_order }}">

    <div class="list-title title-container">
        {{ $list->title }}
        <span class="menu_sign">
            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
        </span>
    </div>

    <div class="cards_container"
         data-list-title="{{ $list->title }}"
         data-list-id="{{ $list->id }}">

        <!-- Incluir cada card dentro dessa lista -->
        @foreach ($list->cards as $card)
            @include('cards.partials.card', [
                'card' => $card,
                'loopIndex' => $loop->index
            ])
        @endforeach
    </div>

    <button class="add_new_card_btn" data-list-id="{{ $list->id }}">+ Add Card</button>
</div>
