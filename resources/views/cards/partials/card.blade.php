<div class="card_container" id="card_{{ $card->id }}" data-card-dbid="{{ $card->id }}">
    <div class="task_card">
        <div class="card_metadata" data-list-id="{{ $loopIndex }}" data-labels="{{ $card->labels_string }}">
            <div class="card_label">{{ $card->label_title }}</div>
        </div>
        <div class="card_text">{{ $card->title }}</div>
    </div>
    <div class="card_actions">
        <button class="card_actions" data-card-id="card_{{ $card->id }}">Edit</button>
    </div>
</div>
