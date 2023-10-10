@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-mute"> {{ __("Posts") }} </h1>

        <h1 class="text-center text-muted">
            {{ __("Posts del foro :name", ['name' => $forum->name]) }}
        </h1>

        <a href="/" class="btn btn-info pull-right">
            {{ __("Volver al listado de los foros") }}
        </a>

        <div class="clearfix"></div>

        <br/>

        @forelse($posts as $post)

            <div class="panel panel-default">
                <div class="panel-heading panel-heading-post">
                    <a href="../posts/{{ $post->id }}"> {{ $post->title }} </a>
                    <span class="pull-right">
                        {{ __("Owner") }}: {{ $post->owner->name }}
                    </span>
                </div>
                <div class="panel-body">
                    {{ $post->description }}
                </div>
            </div>
        @empty
        <div class="alert alert-danger">
            {{ __("No hay ningún post en este momento") }}
        </div>
        @endforelse

    @if($posts->count())
        {{ $posts->links() }}
    @endif
        </div>
    </div>

@endsection
