@extends('layouts.admin_app')
@section('content')

    <form action="{{ route('sendMail.subscriber') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="col-lg-3">
            <div class="form-group">
                <label class="form-control-label">Name: </label>
                <input class="form-control" type="text" name="name" value="{{ $userName }}" readonly><br>
            </div>
        </div>

    <div class="col-lg-3">
        <div class="form-group">
            <label class="form-control-label">Email: </label>
            <input class="form-control" type="text" name="email" value="{{ $userEmail }}" readonly><br>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-control-label">Subject: </label>
            <input class="form-control" type="text" name="subject" placeholder="Input subject"><br>
        </div>
    </div>

    <div class="col-lg-10">
        <div class="form-group">
            <label class="form-control-label">Content: </label>
            <textarea class="form-control" id="summernote" name="body"></textarea><br>
        </div>
    </div>

        <div class="col-lg-6">
        <div class="form-layout-footer">
            <button type="submit" class="btn btn-info mg-r-5">Send</button>
            <a href="{{ route('admin.subscribers') }}" class="btn btn-secondary">Cancel</a>
        </div>
        </div>

    </form>

    @endsection