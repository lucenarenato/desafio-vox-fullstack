<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-lg" style="height:auto;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="model_title_container">
                    <i class="title_fa fa fa-window-maximize" id="mycard"></i>
                    <i class="fa fa-pencil nypencel" style="display:none;" id="my_pencel"></i>
                    <textarea id="model_card_title" class="card_model_title" rows="1"></textarea>
                </div>
                <button type="button" class="close" data-dismiss="modal"> &times;</button>
            </div>

            <div class="modal-body model_main_body" style="height:fit-content">
                <div id="model_body_flex">
                    <div id="model_main">
                        <div class="container list_title_container">
                            <span>In list: </span><a id="list-title"></a>
                        </div>

                        <div class="date_metadata hidden_cell" id="due_container">
                            <span>Due Date:</span> <span id="due_date_model1"></span>
                            <span id="overdue_cell" class="overdue_cell_hidden">OVERDUE</span>
                        </div>

                        <div class="container">
                            <div class="container label-containers">
                                <div id="themodel_label_container"></div>
                            </div>

                            <div class="description_container">
                                <h5>Description: </h5>
                                <p id="ticket_description"></p>
                                <textarea id="card_description_input"
                                          placeholder="Add a more detailed description"
                                          class="form-control" style="height:50px;"></textarea>
                                <button class="btn btn-success" id="description_save" type="button">Save</button>
                            </div>

                            <div class="activve_container">
                                <h4><i class="title_fa fa fa-reorder"></i>CheckList</h4>
                                <div class="form-group">
                                    <label>Add New Check List</label>
                                    <textarea class="form-control" id="checklist_title_input"
                                              placeholder="CheckList Title" rows="1"></textarea>
                                    <input type="button" class="btn btn-primary"
                                           id="checkList_submit_input1" value="Add CheckList">
                                </div>
                                <hr />
                                <div class="checklists_container" id="model_checklists_container" data-checklists=""></div>
                            </div>
                        </div>
                    </div>

                    <div id="model_aside">
                        <div class="aside-flex-item">
                            <h5 class="aside_title">ADD TO CARD</h5>
                            <div class="aside_button" data-menu="member_menu">Members</div>
                            <div id="member_menu" class="popupmenu_action_hide">
                                <span class="btn btn-danger aside_button_close">Close</span>
                                <h5 class="popupmenu_action_header">Search Member</h5>
                                <form id="search_member_form">
                                    <div class="form-group">
                                        <input id="member" name="member" class="form-control"
                                               type="email" placeholder="Search Member">
                                        <button type="submit" class="btn btn-primary margin-top-mid">
                                            <i class="fa fa-search margin-right-mid"></i>Search Member
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="aside_button" data-menu="labels_menu">Labels</div>
                            <div id="labels_menu" class="popupmenu_action_hide">
                                <span class="btn btn-danger aside_button_close">Close</span>
                                <h5 class="popupmenu_action_header">Labels</h5>
                                <form id="labels_form">
                                    <div id="model_labels_container" class="model_labels">
                                        @foreach($labels as $label)
                                            <div class="model_label_container {{ $label->color }}">
                                                <input name="model_color" value="{{ $label->color }}"
                                                       type="checkbox" data-label-id="{{ $label->id }}">
                                                <span class="label_txt">{{ $label->title }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="container label_submit_container">
                                        <div id="model_label_edit_submitcontainer">
                                            <button type="button" id="edit_label_btn" class="btn btn-primary label_edit">
                                                Change Label
                                            </button>
                                            <button type="button" id="add_custom_label_edit" class="btn btn-light label_edit">
                                                Add Custom Label
                                            </button>
                                        </div>
                                        <div id="flexcontainer_colors" class="label_color_flex_container" style="display:none;">
                                            @foreach(['green', 'red', 'blue', 'orange', 'purple', 'lightblue', 'lightgreen', 'darkblue'] as $color)
                                                <div class="flex-color {{ $color }}" data-color="{{ $color }}"></div>
                                            @endforeach
                                        </div>
                                        <div id="customlabeledt" style="display:none;">
                                            <input id="edit_custom_label_title" placeholder="Enter Label Title" class="form-control">
                                            <button type="button" id="add_labelbtn_edit_model" class="btn btn-info">Submit Label</button>
                                            <button type="button" id="cancel_custom_edit" class="btn btn-danger">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="aside_button" data-menu="date_menu">Dates</div>
                            <div id="date_menu" class="popupmenu_action_hide">
                                <span class="btn btn-danger aside_button_close">Close</span>
                                <h5 class="popupmenu_action_header">Dates</h5>
                                <div>
                                    <p>Created At: <span class="badge badge-info" id="card_createdate_model"></span></p>
                                    <p>Due Date: <span class="badge badge-primary" id="card_duedate_model"></span></p>
                                </div>
                                <form id="dates_form">
                                    <div class="form-group">
                                        <label for="startdate">Start Date</label>
                                        <input type="date" class="form-control" name="startdate" id="startdate">
                                        <label for="enddate">End Date</label>
                                        <input type="date" class="form-control" name="enddate" id="enddate">
                                        <button type="button" class="btn btn-primary" id="submit_ticket_date">
                                            Submit Due Date
                                        </button>
                                    </div>
                                </form>
                                <div><button class="btn btn-success" id="resolve_btn">Resolve Card</button></div>
                            </div>

                            <div class="aside_button" data-menu="attachment_menu">Attachment</div>
                            <div id="attachment_menu" class="popupmenu_action_hide">
                                <span class="btn btn-danger aside_button_close">Close</span>
                                <h5 class="popupmenu_action_header">Attachment</h5>
                                <form id="atachment_form">
                                    <div class="form-group">
                                        <label>Upload File</label>
                                        <input type="file" name="attachment_source" class="form-control"
                                               id="attachment_source" placeholder="Upload attachment">
                                        <button id="upload_attachment_btn" type="button"
                                                class="btn btn-light margin-top-mid">Upload</button>
                                    </div>
                                </form>
                                <hr />
                                <div>
                                    <label>Attach a link</label>
                                    <input name="attachment_link" type="link" id="attachment_link"
                                           placeholder="Paste any link here" class="form-control">
                                    <button id="attach_link_btn" type="button"
                                            class="btn btn-light margin-top-mid">Attach</button>
                                </div>
                                <h5>Card Attachments</h5>
                                <div id="attachment_container"></div>
                            </div>
                        </div>
                        <div class="aside-flex-item">
                            <div class="aside_button btn-danger" id="arachive_card_btn">Archive</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
