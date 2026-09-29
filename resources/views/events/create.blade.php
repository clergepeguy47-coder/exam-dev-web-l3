@extends('layouts.app')

@section('content')
<div class="container py-4">

    <h1 class="mb-4">Créer un événement</h1>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <input type="text" name="title" class="form-control" placeholder="Titre" required maxlength="150">
            </div>

            <div class="col-md-6">
                <input type="date" name="event_date" class="form-control" required>
            </div>

            <div class="col-md-6">
                <input type="text" name="location" class="form-control" placeholder="Lieu" maxlength="150">
            </div>

            <div class="col-md-6">
                <select name="tags[]" class="form-select" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <textarea name="description" class="form-control" rows="4" placeholder="Description" required></textarea>
            </div>

        </div>

        <button class="btn btn-success mt-4">Enregistrer</button>
    </form>

</div>
@endsection
