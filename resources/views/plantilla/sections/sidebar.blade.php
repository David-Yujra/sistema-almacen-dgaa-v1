<nav class="sidebar sidebar-offcanvas active" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <div class="sidebar-brand brand-logo text-white" href="../../index.html">
            <h5>FUERZA AÉREA BOLIVIANA</h5>
        </div>
        <div class="sidebar-brand brand-logo-mini text-white mr-4" href="../../index.html">FAB</div>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <router-link to="/">
                            <img class="img-xs rounded-circle " src="../../assets/images/logos/comando.png"
                                alt="">
                        </router-link>
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <router-link to="/">
                            <h5 class="mb-0 font-weight-normal">
                                <center>D.G.A.A.</center>
                            </h5>
                            <span>DIR.GRAL.AS.ADM.</span>
                        </router-link>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                    aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">MENÚ</span>
        </li>
        <li class="nav-item menu-items">
            <router-link to="/productos">
                <a class="nav-link" href="index.html">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">ITEMS INDIVIDUAL</span>
                </a>
            </router-link>
        </li>
        <li class="nav-item menu-items">
            <router-link to="/proveedores">
                <a class="nav-link" href="index.html">
                    <span class="menu-icon">
                        <i class="mdi mdi-speedometer"></i>
                    </span>
                    <span class="menu-title">PROVEEDORES</span>
                </a>
            </router-link>
        </li>
        <li class="nav-item menu-items">
            <div class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <div><span class="menu-icon">
                        <i class="mdi mdi-file-document-box"></i>
                    </span>
                </div>
                <span class="menu-title">LISTAS DESPLEGABLES</span>
                <i class="menu-arrow"></i>
            </div>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <div class="nav-link">
                            <router-link to="/listas-desplegables/marca">Marca</router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <router-link to="/listas-desplegables/contenido">Contenido</router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <router-link to="/listas-desplegables/color">Color</router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <router-link to="/listas-desplegables/medida">Medida</router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <router-link to="/listas-desplegables/tipoItem">Tipo Item</router-link>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-icon">
                    <i class="mdi mdi-security"></i>
                </span>
                <span class="menu-title">REPORTES</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <div class="nav-link">
                            <router-link to="/reportes/uno">Reportes 1</router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <router-link to="/reportes/dos">Reportes 2</router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <router-link to="/reportes/tres">Reportes 3</router-link>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            <router-link to="/reportes/cuatro">Reportes 4</router-link>
                        </div>
                    </li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item menu-items">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-icon">
                    <i class="mdi mdi-chart-bar"></i>
                </span>
                <span class="menu-title">ERRORES</span>
            </a>
        </li> --}}
    </ul>
</nav>
