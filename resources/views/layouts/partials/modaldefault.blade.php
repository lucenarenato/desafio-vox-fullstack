<div class="modal fade" id="create-new-board">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Creating a new board</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form" class="create-board-form">
                    @csrf
                    <div class="form-group" id="boardTitleCon">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control" id="boardTitle" name="boardName">
                    </div>
                    <div class="form-group">
                        <h4>گروه</h4>
                        <p>
                            The group allows you to view the group's tasks and boards. It appears that you are not a member of any group.<a data-toggle="modal" href='#create-team'>Create a group</a>.
                        </p>
                    </div>
                    <div class="group-con frame" style="margin-top: 12px; max-height: 235px; overflow: scroll;"></div>

                    <div class="form-group" id="boardAdminUserIdCon">
                        <p><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Board Manager</p>
                        <select name="boardAdminUserId" id="boardAdminUserId" class="form-control" required="required">
                            <option value="">Choosing a manager...</option>
                            <option value="1">admin</option>
                        </select>
                    </div>

                    <div class="form-group" id="boardPrivacyTypeCon">
                        <p><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>This board will be private.</p>
                        <select name="boardPrivacyType" id="boardPrivacyType" class="form-control" required="required">
                            <option value="private">Special</option>
                            <option value="team">Group</option>
                            <option value="public">General</option>
                        </select>
                    </div>
                </form>
                <!-- base_url:8000/postboard -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-board">Salvar alterações</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="see-closed-board">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Close the board</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default panel-custom">
                    <div class="panel-body">
                        <p>There has never been a closed board.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create-team">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Creating a group</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form action="" method="POST" role="form" class="create-group-form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="group-name" required="required">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="group-description" class="form-control" rows="3" required="required"></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <p>
                                    A group of people and boards related to you. Helps to organize and manage tasks better.
                                </p>
                                <br />
                                <p>
                                    <input type="radio">Upgrade to <b>Business Class</b> for higher security and better membership management</input>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="add-group">Creating a group</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit-profile-info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">Edit profile</h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" role="form">
                    @csrf
                    <div class="form-group">
                        <label for="title">Full name</label>
                        <input type="text" class="form-control" id="fullname">
                    </div>
                    <div class="form-group">
                        <label for="title">Username</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                    <div class="form-group">
                        <label for="title">Your biography</label>
                        <textarea name="" id="input" class="form-control" rows="3" required="required"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="save-change">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="card-detail">
    <div class="modal-dialog" style="width: 720px;">
        <div class="modal-content">
            <div role="tabpanel">
                <div class="modal-header" style="border-bottom: none; padding-bottom: 0px !important;">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#general" aria-controls="tab" role="tab" data-toggle="tab">General</a>
                        </li>
                        <li role="presentation">
                            <a href="#date" aria-controls="tab" role="tab" data-toggle="tab">History</a>
                        </li>
                        <li role="presentation">
                            <a href="#subtasks" aria-controls="tab" role="tab" data-toggle="tab">Related and affiliated works</a>
                        </li>
                        <li role="presentation">
                            <a href="#comments" aria-controls="tab" role="tab" data-toggle="tab">Comments</a>
                        </li>
                    </ul>
                </div>
                <div class="modal-body" style="padding-top: 10px; padding-left: 35px; padding-right: 35px;">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="general">
                            <form action="" method="POST" role="form">
                                @csrf
                                <div class="form-group">
                                    <label for="">Job Title</label>
                                    <a href="#" data-type="text" class="input-editable editable-click" title="{{ trans('board.EnterCardTitle') }}" id="card_title_editable">{{ trans('board.Empty') }}</a>
                                </div>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <a href="#" data-type="textarea" class="input-editable editable-click" title="{{ trans('board.EnterCardDescription') }}" id="card_description_editable">{{ trans('board.Empty') }}</a>
                                </div>
                                <div class="form-group">
                                    <label for="">Label</label>
                                    <input type="text" id="card-tags-input">
                                </div>
                                <div class="form-group">
                                    <label for="">Color</label>
                                    <select id="card_color">
                                        <option value="">Escolha a cor...</option>
                                        <option value="EB5A46">Vermelho</option>
                                        <option value="C377E0">Roxo</option>
                                        <option value="0079BF">Azul</option>
                                        <option value="61BD4F">Verde</option>
                                        <option value="F2D600">Amarelo</option>
                                        <option value="FFAB4A">Laranja</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="date">
                            <h1>Adicionar uma data de vencimento</h1>
                            <hr>
                            <form action="" method="POST" role="form" style="height: 65px;">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h1 class="label" style="color: #333333; padding-left: 0px; font-size: 16px;">Feito em:</h1>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                            <input type='text' class="form-control" id='created-at' aria-describedby="basic-addon1" disabled />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h1 class="label" style="color: #333333; padding-left: 0px; font-size: 16px;">um compromisso:</h1>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
                                            <input type='text' class="form-control" data-format="dd-MM-yyyy hh:mm:ss" id='due-date' aria-describedby="basic-addon1" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="subtasks">
                            <div class="addSubTaskCon">
                                <h2>Add a task as a subtask</h2>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="task-description-input" required="required">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-default" id="submit-task">Addition</button>
                                    </span>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 19px; margin-bottom: 19px;">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped per-tasks-completed" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                            <span class="show"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="task-list-con frame" style="margin-top: 12px; max-height: 235px; overflow: scroll;"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="comments">
                            <div class="row" style="margin-top: 13px;">
                                <div class="col-lg-12">
                                    <h1 style="font-family: monospace; font-size: 23px; font-weight: 700; margin: 0;">Comentários: </h1>
                                    <hr style="margin-top: 5px;">
                                    <form method="POST" role="form" role="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <div class="form-group">
                                                    <textarea name="adasd" id="comment-input" class="form-control" rows="3" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <button class="btn btn-default" id="submit-comment">Actions</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="detailBox">
                                        <div class="actionBox">
                                            <ul class="commentList frame">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-change">Save changes</button>
                    <button type="button" class="btn btn-danger" id="delete-card"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>Clear</button>
                </div>
            </div>
        </div>
    </div>
</div>
