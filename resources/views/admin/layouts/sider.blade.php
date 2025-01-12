<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('admin.dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Tableau de bord</span>
      </a>
    </li>

    <!-- Gestion des utilisateurs (Admin uniquement) -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-people"></i><span>Gestion des utilisateurs</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="user-nav" class="nav-content collapse">
        <li>
          <a href="./users-create.html">
            <i class="bi bi-circle"></i><span>Ajouter un utilisateur</span>
          </a>
        </li>
        <li>
          <a href="./users-index.html">
            <i class="bi bi-circle"></i><span>Liste des utilisateurs</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Gestion des livres -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#book-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book"></i><span>Gestion des livres</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="book-nav" class="nav-content collapse">
        <li>
          <a href="{{ route('admin.livres.create') }}">
            <i class="bi bi-circle"></i><span>Ajouter un livre</span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.livres.index') }}">
            <i class="bi bi-circle"></i><span>Liste des livres</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Gestion des catégories -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-folder"></i><span>Catégories</span>
        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="category-nav" class="nav-content collapse">
        <li>
          <a href="./categories-create.html">
            <i class="bi bi-circle"></i><span>Ajouter une catégorie</span>
          </a>
        </li>
        <li>
          <a href="{{route('admin.categories.index')}}">
            <i class="bi bi-circle"></i><span>Liste des catégories</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Rapports et statistiques -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="./statistics.html">
        <i class="bi bi-bar-chart"></i>
        <span>Rapports et statistiques</span>
      </a>
    </li>

    <!-- Paramètres -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="./settings.html">
        <i class="bi bi-gear"></i>
        <span>Paramètres</span>
      </a>
    </li>

    <!-- Profil -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="./profile.html">
        <i class="bi bi-person-circle"></i>
        <span>Mon profil</span>
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
