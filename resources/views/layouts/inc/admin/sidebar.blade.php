 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link text-center">
         <span class="brand-text font-weight-light"><b>Admin</b></span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{ route('admin.dashboard') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.product.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Product
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('admin.category.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Category
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.brand.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-th"></i>
                         <p>
                             Brand
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
