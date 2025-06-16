<div class="card_container {{ $card->archive_class }}"
    data-card-order="{{ $card->card_order }}"
    data-label-title="{{ $card->label_title }}"
    data-label-color="{{ $card->label_color }}"
    data-list-id="{{ $card->list_id }}"
    data-list-title="{{ $card->list_title }}"
    data-card-dbid="{{ $card->id }}"
    draggable="true"
    style="order: {{ $card->card_order }};">

   <div class="card task_card"
        data-label-title="{{ $card->label_title }}"
        data-label-color="{{ $card->label_color }}"
        data-text="{{ $card->title }}"
        data-list-title="{{ $card->list_title }}"
        data-list-id="{{ $card->list_id }}"
        data-card-description="{{ $card->description }}"
        data-dute-date="{{ $card->due_date }}"
        data-card-attachment="{{ $card->card_attachment }}"
        data-labels="{{ $card->labels_string }}"
        data-checklists="{{ $card->checklist_string }}">

       <div class="card_metadata"
            data-label-title="{{ $card->label_title }}"
            data-label-color="{{ $card->label_color }}"
            data-list-title="{{ $card->list_title }}"
            data-list-id="{{ $card->list_id }}">

           <div class="card_metadata_container">
               <div class="label_class card_labels_container" data-labels="{{ $card->labels_string }}"></div>
               <span class="btn model_open card_actions"
                     data-toggle="modal"
                     data-target="#myModal1"
                     data-label-title="{{ $card->label_title }}"
                     data-label-color="{{ $card->label_color }}"
                     data-list-id="{{ $card->list_id }}"
                     data-list-title="{{ $card->list_title }}"
                     data-card-id=""
                     data-card-description="{{ $card->description }}"
                     data-card-timestamp="{{ $card->card_timestamp }}"
                     data-dute-date="{{ $card->due_date }}"
                     data-card-dbid="{{ $card->id }}"
                     data-card-containerid=""
                     data-labels="{{ $card->labels_string }}"
                     data-checklists="{{ $card->checklist_string }}"
                     data-complete-status="{{ $card->is_complete }}">
                   &#127915;
               </span>
           </div>
           <p class="card_text">{{ $card->title }}</p>
           @if($card->due_date)
               <div class="is_due_now {{ $card->is_complete ? 'completed_card' : '' }}"
                    title="{{ $card->is_complete ? 'This card is complete' : 'This card is due' }}">
                   <span>&#128337;</span>
                   <span class="card_due_label">{{ date('M d', strtotime($card->due_date)) }}</span>
               </div>
           @endif
       </div>
   </div>
</div>
