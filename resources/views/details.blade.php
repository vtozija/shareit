@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">File details</div>

                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2">File Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="{{$file->file_name}}">
                        </div>
                      </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Time of upload</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" value="{{$file->created_at}}">
                        </div>
                      </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <a href="{{route('file.download', $file->id)}}" role="button" class="btn btn-primary btn-md">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
