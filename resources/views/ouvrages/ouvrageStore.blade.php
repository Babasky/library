@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Ajouter ouvrage') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('ouvrage.create') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">{{ __('titre') }}</label>

                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control @error('prenom') is-invalid @enderror" name="titre" value="{{ old('titre') }}" required autocomplete="prenom" autofocus>

                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Auteur') }}</label>

                            <div class="col-md-6">
                                <input id="auteur" type="text" class="form-control @error('nom') is-invalid @enderror" name="auteur" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('auteur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="contact" class="col-md-4 col-form-label text-md-end">{{ __('Date de publication') }}</label>

                            <div class="col-md-6">
                                <input id="date_publication" type="date" class="form-control @error('contact') is-invalid @enderror" name="date_publication" required autocomplete="new-contact">

                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prix" class="col-md-4 col-form-label text-md-end">{{ __('Prix') }}</label>

                            <div class="col-md-6">
                                <input id="prix" type="text" name="prix" class="form-control"  required autocomplete="prix">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
