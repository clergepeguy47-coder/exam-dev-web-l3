@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h1>Modifier l'événement</h1>

    <form action="{{ route('events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">

            <div class="col-md-6">
                <input type="text" name="title" class="form-control" value="{{ $event->title }}" required maxlength="150">
            </div>

            <div class="col-md-6">
                <input type="date" name="event_date" class="form-control" value="{{ $event->event_date }}" required>
            </div>

            <div class="col-md-6">
                <input type="text" name="location" class="form-control" value="{{ $event->location }}" maxlength="150">
            </div>

            <div class="col-md-6">
                <select name="tags[]" class="form-select" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if($event->tags->contains($tag->id)) selected @endif>
                            {{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <textarea name="description" class="form-control" rows="4" required>{{ $event->description }}</textarea>
            </div>

        </div>

        <button class="btn btn-primary mt-4">Mettre à jour</button>
    </form>

    <form action="{{ route('events.destroy', $event) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Supprimer</button>
    </form>

</div>
@endsection
