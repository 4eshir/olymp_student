@component('admin.shared.modal')
    @slot('name', 'user-modal')
    @slot('title', 'New user')

    <div class="form-group">
        <label for="user-name">User name *</label>
        <input id="user-name" class="form-control" name="name" type="text" value="" data-user-id="">
    </div>

    <div class="form-group">
        <label for="user-email">User email *</label>
        <input id="user-email" class="form-control" name="email" type="email" value="">
    </div>

    <div class="form-group">
        <label for="user-password">User password *</label>
        <input id="user-password" class="form-control" name="password" type="password" value="">
    </div>

    <div class="form-group">
        <label>
            {{ Form::checkbox('is_admin', 1, false, ['id' => 'is_admin']) }}
            Is admin
        </label>
    </div>

    @slot('buttons')
        <button type="submit" class="btn btn-success" id="save">Save user</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    @endslot
@endcomponent
