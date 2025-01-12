@extends('admin.layouts.app')
@section('title', 'Ajouter une nouvelle catégorie de Livre')
@section('pagetitle')
<h1>Catégories des Livres</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href=" {{route('admin.dashboard')}} ">Tableau de Bord</a></li>
          <li class="breadcrumb-item active">Listes des catégories</li>
          {{-- <li class="breadcrumb-item active">Profil</li> --}}
        </ol>
      </nav>
@endsection

@section('content')
<div class="row mb-3">
  <div class="col">
    <div class="card-body p-3">
      <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#CreatePostCategoryModal">
        Créer une Catégorie de Livre
      </button>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Liste des Livres</h5>

    <!-- Table pour afficher les articles -->
    <table class="table datatable">
      <thead>
        <tr>
          <th scope="col">Nom</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>
              <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                title=" {{ $category->description ?? 'Pas de Description' }}">
                Description
              </button>
            </td>
            <td>
              <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                data-bs-target="#UpdatePostCategoryModal" data-bs-action="{{ route('admin.categories.update', $category->id) }}"
                data-bs-name="{{ $category->name }}" data-bs-description="{{ $category->description }}">
                Éditer
              </button>
              <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                  onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center">Aucune catégorie n'a été enregistrée</td>
          </tr>
        @endforelse
      </tbody>
    </table>
    <!-- Fin de la table des articles -->
  </div>
</div>

@include('admin.categorie.modal-create')
@include('admin.categorie.modal-update')
@endsection