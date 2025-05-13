<div class="d-flex flex-column p-3 text-white h-100 justify-content-between"" style="background-color: #1c2331">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{route('admin.dashboard')}}" class="nav-link text-white " aria-current="page">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-house"></i></svg>
          Acceuil
        </a>
    </li>
    <li>
      <a href="{{route('users.index')}}" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16"><i class="bi bi-people"></i></svg>
        Users
      </a>
    </li>
    <li>
      <a href="{{route('groupes.index')}}" class="nav-link text-white">
        <svg class="bi me-2" width="16" height="16"><i class="bi bi-grid"></i></svg>
        Groupes
      </a>
    </li>
      <li>
        <a href="{{route('matieres.index')}}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-book"></i></svg>
          Matiere
        </a>
      </li>
      <li>
        <a href="{{route('sceances.index')}}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><i class="bi bi-table"></i></svg>
          Sceances
        </a>
      </li>
    </ul>
  </div>
