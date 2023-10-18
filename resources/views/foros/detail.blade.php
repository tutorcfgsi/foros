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

                @if($post->isOwner())
                    <div class="panel-footer">
                        <form method="POST" action="../posts/{{ $post->id }}">
                            <!-- Es necesario enmascarar el método Delete en Laravel -->
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" name="deletePost" class="btn btn-danger">
                                {{ __("Eliminar post") }}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
        <div class="alert alert-danger">
            {{ __("No hay ningún post en este momento") }}
        </div>
        @endforelse

        @if($posts->count())
            {{ $posts->links() }}
        @endif

        @Logged()
            <h3 class="text-muted">{{ __("Añadir un nuevo post al foro :name", ['name' => $forum->name]) }}</h3>
            @include('partials.errors')

            <form method="POST" action="../posts">
                {{ csrf_field() }}
                <input type="hidden" name="forum_id" value="{{ $forum->id }}"/>

                <div class="form-group">
                    <label for="title" class="col-md-12 control-label">{{ __("Título") }}</label>
                    <input id="title" class="form-control" name="title" value="{{ old('title') }}"/>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-12 control-label">{{ __("Descripción") }}</label>
                    <textarea id="description" class="form-control"
                              name="description">{{ old('description') }}</textarea>
                </div>

                 <button type="submit" name="addPost" class="btn btn-default">{{ __("Añadir post") }}</button>
            </form>

        @else
            @include('partials.login_link', ['message' => __("Inicia sesión para crear un post")])
        @endLogged

        </div>
    </div>

@endsection
