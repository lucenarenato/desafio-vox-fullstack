
<div id="form_template_holder">
    <div id="new-card-form" class="newCardForm_class" style="display:none;">
        <form id="add-newCard-form">
            <div id="card_form_inputs">
                <textarea class="form-control" placeholder="Enter title for this card..."
                          id="card_title" style="display:none;" rows="1"></textarea>
                <input class="btn btn-primary" id="new_card_submit"
                       type="button" style="display:none;" value="Add Card">
                <button type="button" id="cancel_add_card" style="display: none;">
                    <i class="fa fa-close" style="font-size: 26"></i>
                </button>
                <button type="button" id="card_add_menu">
                    <i style="font-size:24px" class="fa">&#xf141;</i>
                </button>

                <div id="label_container_div" class="labels_container" style="display:none;">
                    <div id="label_group1" class="label_group">
                        <textarea class="new_card_textare form-control"
                                  placeholder="Search Labels.." type="text" id="label_search_text"></textarea>
                        <h4 id="selectTitle">Select Label: </h4>
                        <div class="addcard_labels_container">
                            @foreach($labels as $label)
                                <div class="label_container">
                                    <div class="label_icon {{ $label->color }} selectable">
                                        <input name="selected_color" value="{{ $label->color }}"
                                               type="checkbox" data-label-id="{{ $label->id }}">
                                        <span>{{ $label->title }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="add_new_label_container" style="display:none;">
                        <div id="label_notes" class="alert alert-success" style="display: none;"></div>
                        <input id="label_title" class="form-control" placeholder="Enter label title...">
                        <h4 id="selectTitle">Select Label Color: </h4>
                        @foreach(['green', 'red', 'orange', 'blue', 'purple', 'lightblue', 'lightgreen', 'darkblue'] as $color)
                            <div class="colors label_icon {{ $color }}" data-color="{{ $color }}">
                                <input name="label_color" value="{{ $color }}" type="radio">
                            </div>
                        @endforeach
                    </div>

                    <div class="label_btn" id="add_newlabel">Add New Label</div>
                    <div class="label_btn" id="add_newlabel_step2" style="display:none;">Submit Label</div>
                    <div class="label_btn" id="show_labels_btn" style="display:none;">Cancel</div>
                </div>
            </div>
        </form>
    </div>
</div>
