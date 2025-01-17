@extends('admin.layouts.app')
@section('title', 'Gestion des utilisateurs')
@section('pagetitle')
<h1>Gestion des utilisateurs</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href=" {{route('admin.dashboard')}} ">Tableau de Bord</a></li>
    <li class="breadcrumb-item active">Gestion des utilisateurs</li>
  </ol>
@endsection
@section('content')
<div class="row">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Liste des utilisateurs</h5>
      <!-- Table pour afficher les articles -->
      <table class="table table-bordered datatable">
        <thead>
          <tr>
            <th scope="col">Profile</th>
            <th scope="col">Nom & Prenom(s)</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Pays</th>
            <th scope="col">Type de compte</th>
            <th scope="col">Inscrit le</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
          <tr>
            <th class="text text-center"><img src="{{ asset('assets/img/profile-img.jpg') }}" width="40px" alt="{{$user->name}}"></th>
            <td>{{ $user->name }} </td>
            <td>{{ $user->email}} </td>
            <td>{{ $user->role }} </td>
            <td>{{ $user->country }}</td>
            <td> {{ $user->accountType }} </td>
            <td>{{ $user->created_at->format('d/m/Y') }}</td>
            <td>
              <a href="#" class="btn btn-info btn-sm">Voir</a>
              <a href="#" class="btn btn-warning btn-sm">Éditer</a>
              <form action="#" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"
                  onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">
                  Bannnir
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
</div>
@endsection
