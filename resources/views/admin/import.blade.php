<form action="{{URL::to('import/user')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="user-file">
        <div class="btn sbold green"> Add
            <i class="fa fa-plus"></i>
        </div>
    </label>
    <input id="user-file" type="file" name="user_file" class="hidden" accept=".xlsx, .xls, .csv, .ods">
    <button type="submit">Import</button>
</form>