@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
    	<h1 class="text-center text-mute"> {{ __("Foros") }} </h1>

    	@forelse($forums as $forum)
	        <div class="panel panel-default">
	            <div class="panel-heading panel-heading-forum">
	            	<a href="forums/{{ $forum->id }}"> {{ $forum->name }} </a>
                    <span class="pull-right">
                        {{ __("Posts") }}: {{ $forum->posts->count() }},
                        {{ __("Replies") }}: {{ $forum->replies->count() }}
                    </span>
	            </div>

	            <div class="panel-body">
	                {{ $forum->description }}
	            </div>
	        </div>
    	@empty
            <div class="alert alert-danger">
                {{ __("No hay ningún foro en este momento") }}
            </div>
    	@endforelse
        @if($forums->count())
            {{ $forums->links() }}
        @endif

        <h2>{{ __("Añadir un nuevo foro") }}</h2>

        <hr/>

        @include('partials.errors')

        <form method="POST" action="forums">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-md-12 control-label">
                    {{ __("Nombre") }}
                </label>
                <input id="name" class="form-control" name="name" value="{{ old('name') }}"/>
            </div>
            <div class="form-group">
                <label for="description" class="col-md-12 control-label">
                    {{ __("Descripción") }}
                </label>
                <input id="description" class="form-control" name="description" value="{{ old('description') }}"/>
            </div>
            <button type="submit" name="addForum" class="btn btn-default">
                {{ __("Añadir Foro") }}
            </button>
        </form>

        </div>
    </div>
@endsection


