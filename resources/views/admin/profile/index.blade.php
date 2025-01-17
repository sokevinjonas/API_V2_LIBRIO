@extends('admin.layouts.app')
@section('title', 'Mon profile')
@section('pagetitle')
<h1>Mon Profile</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href=" {{route('admin.dashboard')}} ">Tableau de Bord</a></li>
    <li class="breadcrumb-item active">Mon profile</li>
  </ol>
@endsection
@section('content')
<div class="row section profile">
  <div class="col-xl-4">
    <div class="card">
      <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
        <img src="{{asset('storage/'. $user->profile_picture ?? 'assets/img/profile-img.jpg')}}" alt="{{$user->name}}" class="rounded-circle"
          id="profileImagePreview1">
        <h2> {{$user->name}} </h2>
        <h3> {{$user->role}} </h3>
      </div>
    </div>
  </div>

  <div class="col-xl-8">
    <div class="card">
      <div class="card-body pt-3">
        <!-- Bordered Tabs -->
        <ul class="nav nav-tabs nav-tabs-bordered">
          <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab"
              data-bs-target="#profile-overview">Aperçu</button>
          </li>
          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier le
              profil</button>
          </li>
          <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer le mot
              de
              passe</button>
          </li>
        </ul>

        <div class="tab-content pt-2">
          <!-- Profile Overview -->
          <div class="tab-pane fade show active profile-overview" id="profile-overview">
            <h5 class="card-title">Détails du profil</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">Type de Compte</div>
              <div class="col-lg-9 col-md-8"> {{$user->accountType}} </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">Email</div>
              <div class="col-lg-9 col-md-8"> {{$user->role}} </div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">Inscrit le</div>
              <div class="col-lg-9 col-md-8">{{ $user->created_at->format('d/m/Y') }}</div>
            </div>
          </div>

          <!-- Profile Edit -->
          <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
            <!-- Profile Edit Form -->
            <form method="POST" action="{{route('admin.profile.update', $user->id )}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              
               <!-- Image de profil -->
              <div class="row mb-3">
                <label class="col-md-4 col-lg-3 col-form-label">Image de profil</label>
                <div class="col-md-8 col-lg-9">
                  <img src="{{asset('storage/'. $user->profile_picture ?? 'assets/img/profile-img.jpg')}}" 
                    alt="Profil" id="profileImagePreview" height="120px">
                  <div class="pt-2">
                    <input type="file" name="profile_picture" id="avatarUpload" class="form-control" accept="image/*" hidden>
                    <button type="button" class="btn btn-primary btn-sm" title="Télécharger une nouvelle image de profil" 
                      id="uploadBtn">
                      <i class="bi bi-upload"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" title="Supprimer l'image de profil" 
                      id="deletePreviewImageBtn">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Nom complet -->
              <div class="row mb-3">
                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nom complet</label>
                <div class="col-md-8 col-lg-9">
                  <input name="name" type="text" class="form-control" id="fullName" value="{{ auth()->user()->name }}">
                </div>
              </div>

              <!-- Email -->
              <div class="row mb-3">
                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="email" class="form-control" id="email" value="{{ auth()->user()->email }}">
                </div>
              </div>

              <!-- Pays -->
              <div class="row mb-3">
                <label for="country" class="col-md-4 col-lg-3 col-form-label">Pays</label>
                <div class="col-md-8 col-lg-9">
                  <input name="country" type="text" class="form-control" id="country" value="{{ auth()->user()->country }}">
                </div>
              </div>

              <!-- Bio -->
              <div class="row mb-3">
                <label for="bio" class="col-md-4 col-lg-3 col-form-label">Bio</label>
                <div class="col-md-8 col-lg-9">
                  <textarea name="bio" id="bio" class="form-control" rows="3">{{ auth()->user()->bio }}</textarea>
                </div>
              </div>

              <!-- Bouton Enregistrer -->
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
              </div>

            </form>
          
            <!-- End Profile Edit Form -->
          </div>

          <!-- Change Password -->
          <div class="tab-pane fade pt-3" id="profile-change-password">
            <!-- Change Password Form -->
            <form method="POST" action="{{ route('admin.admin.profile.updatePassword') }}">
              @csrf
              <div class="row mb-3">
                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                <div class="col-md-8 col-lg-9">
                  <input name="current_password" type="password" class="form-control" id="currentPassword" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="password" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                <div class="col-md-8 col-lg-9">
                  <input name="password" type="password" class="form-control" id="password" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirmez le nouveau mot de passe</label>
                <div class="col-md-8 col-lg-9">
                  <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
                </div>
              </div>

              <div class="text-center">
                <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
              </div>
            </form>
            <!-- End Change Password Form -->
          </div>
          <!-- End Change Password -->


        </div><!-- End Bordered Tabs -->
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
  // Gestion de la prévisualisation de l'image
  document.getElementById('uploadBtn').addEventListener('click', () => {
    document.getElementById('avatarUpload').click();
  });

  document.getElementById('avatarUpload').addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        document.getElementById('profileImagePreview').setAttribute('src', event.target.result);
      };
      reader.readAsDataURL(file);
    }
  });

  document.getElementById('deletePreviewImageBtn').addEventListener('click', () => {
    document.getElementById('profileImagePreview').setAttribute('src', 'https://dummyimage.com/120x120/ced4da/6c757d.jpg');
    document.getElementById('avatarUpload').value = ''; // Réinitialise l'input
  });
</script>
@endsection