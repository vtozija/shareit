@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
			@if(session()->has('message'))
			    <div class="alert alert-info">
			        {{ session()->get('message') }}
			    </div>
			@endif
            <div class="card">
                <div class="card-header">Woot woot you are logged in! Upload a new file below!</div>

                <div class="card-body">
                    <a href="{{route('file')}}" role="button" class="btn btn-primary btn-md">Upload file</a>
                </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
