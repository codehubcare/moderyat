 <div id="layoutSidenav_nav">
     <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
         <div class="sb-sidenav-menu">
             <div class="nav">
                 <a class="nav-link" href="{{ route('dashboard') }}">
                     <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                     Dashboard
                 </a>
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                     aria-expanded="false" aria-controls="collapseLayouts">
                     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                     Posts
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                 </a>
                 <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                         <a class="nav-link" href="{{ route('posts.index') }}">All posts</a>
                         <a class="nav-link" href="{{ route('post-categories.index') }}">Categories</a>
                     </nav>
                 </div>
                 <a class="nav-link" href="{{ route('pages.index') }}">
                     <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                     Pages
                 </a>
                 <a class="nav-link" href="{{ route('users.index') }}">
                     <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                     Users
                 </a>
                 <a class="nav-link" href="{{ route('settings.index') }}">
                     <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                     Settings
                 </a>

                 <a class="nav-link" href="{{ route('files.index') }}">
                     <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                     File Manager
                 </a>
             </div>
         </div>
         <div class="sb-sidenav-footer">
             <div class="small">Logged in as:</div>
             {{ auth()->user()->name ?? '' }}
         </div>
     </nav>
 </div>
