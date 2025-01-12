@extends('admin.layouts.app')
@section('title', 'Ajouter un nouveau livre')
@section('pagetitle')
<h1>Liste des Livres</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=" {{route('admin.dashboard')}} ">Tableau de Bord</a></li>
          <li class="breadcrumb-item ">Ajouter un nouveau Livre</li>
          <li class="breadcrumb-item active">Listes des livres</li>
        </ol>
      </nav>
@endsection
@section('content')
{{-- @dump($errors->all()) --}}
<div class="row">
      <div class="card-body p-3">
        <a href="{{ route('admin.livres.create') }}" class="btn btn-primary float-start">Ajouter un article</a>
      </div>
</div>
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Liste des articles</h5>
    <!-- Table pour afficher les articles -->
    <table class="table table-bordered datatable">
      <thead>
        <tr>
          <th scope="col">Preview</th>
          <th scope="col">Titre</th>
          <th scope="col">Catégorie</th>
          <th scope="col">Langue</th>
          <th scope="col">Version numérique</th>
          <th scope="col">Prix</th>
          <th scope="col">Créé le</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($livres as $livre)
        <tr>
          <th class="text text-center"><img src="{{ asset('storage/' . $livre->cover_image) }}" width="35px" alt="{{$livre->title}}"></th>
          <td>{{ $livre->title }}</td>
          <td>{{ $livre->category->name ?? 'Non définie' }}</td>
          <td>{{ $livre->langage }}</td>
          <td>
            @if($livre->has_digital_version)
              <span class="badge bg-success">Oui</span>
            @else
              <span class="badge bg-danger">Non</span>
            @endif
          </td>
          <td>
            @if($livre->price)
              {{ number_format($livre->price, 2, ',', ' ') }} €
            @else
              Gratuit
            @endif
          </td>
          <td>{{ $livre->created_at->format('d/m/Y') }}</td>
          <td>
            <a href="#" class="btn btn-info btn-sm">Voir</a>
            <a href="#" class="btn btn-warning btn-sm">Éditer</a>
            <form action="#" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">
                Supprimer
              </button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="text-center">Aucun livre disponible</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    
    <!-- Fin de la table des articles -->
  </div>
</div>
@endsection