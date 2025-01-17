<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : 'collapsed' }} " href="{{route('admin.dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Tableau de bord</span>
      </a>
    </li>

        <!-- Profil -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.profile.*') ? 'active' : 'collapsed' }}" href="{{route('admin.profile.index')}}">
        <i class="bi bi-person-circle"></i>
        <span>Mon profil</span>
      </a>
    </li>
    
    <!-- Gestion des utilisateurs (Admin uniquement) -->
    @if (Auth::user()->role === 'admin')
      
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : 'collapsed' }}" href="{{route('admin.users.index')}}">
        <i class="bi bi-people"></i><span>Gestion des utilisateurs</span>
      </a>
    </li>
    @endif
      

    <!-- Gestion des livres -->
    {{-- <li class="nav-item">
      <a class="nav-link" data-bs-target="#book-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book"></i><span>Gestion des livres</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="book-nav" class="nav-content collapse">
        <li>
          <a href="{{ route('admin.livres.create') }}" class="{{request()->routeIs('admin.livres.create') ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Ajouter un livre</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.livres.index') }}" class="{{request()->routeIs('admin.livres.index') ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Liste des livres</span>
          </a>
        </li>
      </ul>
    </li> --}}

    <li class="nav-item">
      <a @class(['nav-link ', 'collapsed' => !request()->routeIs('admin.livres.*')]) data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
        <i class="bi bi-book"></i><span>Gestion des livres</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="blog-nav"  @class(['nav-content', 'collapse', 'show' => request()->routeIs('admin.livres.*')]) style="">
        <li>
          <a href="{{ route('admin.livres.create') }}" class="{{request()->routeIs('admin.livres.create') ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Ajouter un livre</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.livres.index') }}" class="{{request()->routeIs('admin.livres.index') ? 'active' : ''}}">
            <i class="bi bi-circle"></i><span>Liste des livres</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Gestion des catégories -->
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('admin.categories.index') ? 'active' : 'collapsed' }}" 
         href="{{ route('admin.categories.index') }}">
        <i class="bi bi-folder"></i><span>Liste des Catégories</span>
      </a>
    </li>
    

    <!-- Rapports et statistiques -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#">
        <i class="bi bi-bar-chart"></i>
        <span>Rapports et statistiques</span>
      </a>
    </li>

    <!-- Paramètres -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#">
        <i class="bi bi-gear"></i>
        <span>Paramètres</span>
      </a>
    </li>

    <!-- Déconnexion -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" onclick="return confirm('Êtes-vous sûr de vouloir vous déconnecter ?')">
        <i class="bi bi-box-arrow-right"></i>
        <span>Déconnexion</span>
      </a>
    </li>

  </ul>
</aside>
