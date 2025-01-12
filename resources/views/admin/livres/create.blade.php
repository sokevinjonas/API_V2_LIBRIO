@extends('admin.layouts.app')
@section('title', 'Ajouter un nouveau livre')
@section('pagetitle')
<h1>Ajouter un nouveau Livre</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=" {{route('admin.dashboard')}} ">Tableau de Bord</a></li>
          <li class="breadcrumb-item"><a href="{{route('admin.livres.index')}}">Listes des livres</a></li>
          <li class="breadcrumb-item active">Ajouter un nouveau Livre</li>
        </ol>
      </nav>
@endsection
@section('content')
{{-- @dump($errors->all()) --}}
<div class="row justify-content-start">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Créer un livre</h5>
    
        <form action="{{ route('admin.livres.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          
          <!-- Titre -->
          <div class="mb-3">
              <label for="title" class="form-label">Titre</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
              @error('title')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Description -->
          <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
              @error('description')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Image de couverture -->
          <div class="mb-3">
              <label for="cover_image" class="form-label">Image de couverture</label>
              <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image" required>
              @error('cover_image')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Catégorie -->
          <div class="mb-3">
              <label for="category_id" class="form-label">Catégorie</label>
              <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                  <option disabled selected>Choisissez une catégorie</option>
                  @forelse ($categories as $category)
                      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                          {{ $category->name }}
                      </option>
                  @empty
                      <option value="">Aucune catégorie</option>
                  @endforelse
              </select>
              @error('category_id')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Version numérique disponible -->
          <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" id="has_digital_version" name="has_digital_version" value="1" {{ old('has_digital_version') ? 'checked' : '' }}>
              <label class="form-check-label" for="has_digital_version">Version numérique disponible</label>
              @error('has_digital_version')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Langue -->
          <div class="mb-3">
              <label for="langage" class="form-label">Langue</label>
              <select class="form-control @error('langage') is-invalid @enderror" id="langage" name="langage" required>
                  <option disabled selected>Choisissez une langue</option>
                  <option value="Francais" {{ old('langage') == 'Francais' ? 'selected' : '' }}>Français</option>
                  <option value="Anglais" {{ old('langage') == 'Anglais' ? 'selected' : '' }}>Anglais</option>
              </select>
              @error('langage')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Nombre de pages -->
          <div class="mb-3">
              <label for="nbr_page" class="form-label">Nombre de pages</label>
              <input type="number" class="form-control @error('nbr_page') is-invalid @enderror" id="nbr_page" name="nbr_page" value="{{ old('nbr_page') }}">
              @error('nbr_page')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Biographie de l'auteur -->
          <div class="mb-3">
              <label for="bio_author" class="form-label">Biographie de l'auteur</label>
              <textarea class="form-control @error('bio_author') is-invalid @enderror" id="bio_author" name="bio_author" rows="3">{{ old('bio_author') }}</textarea>
              @error('bio_author')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Nom de l'auteur -->
          <div class="mb-3">
              <label for="author" class="form-label">Nom de l'auteur</label>
              <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}">
              @error('author')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Lien du fichier numérique -->
          <div class="mb-3">
              <label for="url" class="form-label">Lien du fichier numérique (facultatif)</label>
              <input type="file" class="form-control @error('url') is-invalid @enderror" id="url" name="url">
              @error('url')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <!-- Prix -->
          <div class="mb-3">
              <label for="price" class="form-label">Prix</label>
              <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" placeholder="Ex: 5 000 FCFA">
              @error('price')
                  <div class="text text-danger">{{ $message }}</div>
              @enderror
          </div>
          
          <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Créer le livre</button>
            <button type="reset" class="btn btn-default">Rénitialiser le formulaire</button>
          </div>
      </form>
      
      </div>
    </div>
    
  </div>
</div>
@endsection