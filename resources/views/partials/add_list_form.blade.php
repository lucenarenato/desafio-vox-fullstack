<div class="drop-list card" id="static_add_list" style="order: {{ $lists->count() + 1 }};">
    <div class="card-body">
        <button type="button" class="add_new_list_btn btn stretched-link" id="add_list_btn">
            <i class="fa fa-plus plus_sign pluslist"></i> Add New List
        </button>
        <form id="add-newlist-form">
            <input class="form-control" placeholder="Enter list title.."
                   id="new_list_name" type="text" style="display:none;">
            <input class="btn btn-primary" id="new_list_submit"
                   type="button" style="display:none;" value="Add List">
            <button type="button" id="cancel_add_list" style="display: none;">
                <i class="fa fa-close" style="font-size: 26"></i>
            </button>
        </form>
    </div>
</div>
