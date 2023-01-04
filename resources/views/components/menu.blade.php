<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
    <li class="nav-item">
        <a href="{{route('home')}}" class="nav-link {{ setMenuClass('home', 'active') }}">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Accueil
          </p>
        </a>
      </li>

      @can("admin")
      <li class="nav-item {{setMenuClass('admin.habilitations','active')}}">
          <a href="{{route('admin.habilitations.users.index')}}"
           class="nav-link {{setMenuActive('admin.habilitations.users.index')}}"
          >
            <i class=" nav-icon fas fa-users-cog"></i>
            <p>Utilisateurs</p>
          </a>
      </li>
  
      <li class="nav-item {{setMenuClass('admin.gestvoitures','menu-open')}}">
        <a href="#" class="nav-link {{setMenuClass('admin.gestvoitures','active')}}">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Gestion Voitures
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item ">
            <a href="{{route('admin.gestvoitures.types')}}" 
              class="nav-link {{setMenuClass('admin.gestvoitures.types','active')}}">
              <i class="nav-icon far fa-circle"></i>
              <p>Types</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.gestvoitures.voitures')}}" class="nav-link {{setMenuClass('admin.gestvoitures.voitures','active')}}">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>Voitures</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan

    @can("employe")
    <li class="nav-item {{setMenuClass('employe.gestvoitures','menu-open')}}">
      <a href="#" class="nav-link {{setMenuClass('employe.gestvoitures','active')}}">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Gestion vehicules
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('employe.gestvoitures.types')}}"
            class="nav-link {{setMenuActive('employe.gestvoitures.types')}}">
            <i class="nav-icon far fa-circle"></i>
            <p>Type</p>
          </a>
            </li>
            <li class="nav-item">
              <a href="{{route('employe.gestvoitures.voitures')}}"
                class="nav-link {{setMenuActive('employe.gestvoitures.voitures')}}">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>Vehicules</p>
              </a>
            </li>
      </ul>
    </li>
    <li class="nav-header">Location</li>
    <li class="nav-item">
        <a href="{{ route('employe.clients.index') }}" class="nav-link ">
            <i class="nav-icon fas fa-users"></i>
            <p>
            Gestion des clients
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('employe.locations.index') }}" class="nav-link">
            <i class="nav-icon fas fa-exchange-alt"></i>
            <p>
            Gestion des locations
            </p>
        </a>
    </li>

    
    @endcan

    </ul>
  </nav>
