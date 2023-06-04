@extends('app')

@section('content')
<form method="post" action="/post">
    <input type="hidden" name="_token" value="<?= Helpers\TokenHelper::getToken() ?>" />
    <div class="row mb-3">
        <label for="inputOne" class="col-sm-2 col-form-label">Title</label>
        <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="inputOne">
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputTwo" class="col-sm-2 col-form-label">Content</label>
        <div class="col-sm-10">
            <textarea name="postDetail" id="inputTwo" class="form-control"></textarea>
        </div>
    </div>
    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
</form>
@endsection