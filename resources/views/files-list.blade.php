@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
	        <div class="card">
                <div class="card-header">List of uploaded files</div>
                <div class="card-body">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>File name</th>
                            <th>Download count</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                              <tr>
                                <td>{{$file->file_name}}</td>
                                <td>{{$file->download_count}}</td>
                                <td>
                                    <form method="post" action="{{route('file.delete', $file->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
