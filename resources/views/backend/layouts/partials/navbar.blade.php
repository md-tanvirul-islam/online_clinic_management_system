<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-moon" ></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
            </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>


{{--    nav item dashboard end--}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>All Tables</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tables</h6>
                        <a class="collapse-item" href="{{route('departments.index')}}">Department </a>

                        <a class="collapse-item" href="{{route('doctors.index')}}">Doctors </a>

                        <a class="collapse-item" href="{{route('patients.index')}}">Patients </a>

                        <a class="collapse-item" href="#">Tests </a>

                        <a class="collapse-item" href="#">Staffs </a>

                        <a class="collapse-item" href="#">Doctor Schedules </a>

                        <a class="collapse-item" href="{{route('dayOfWeek.index')}}">Days of the Week </a>



            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{route('doctors.index')}}">
                    <i class="fa fa-h-square" aria-hidden="true"></i>
                    <span>Doctors</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('patients.index')}}">
                    <i class="fas fa-bed"></i>
                    <span>Patients</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-users"></i>
                    <span>Appointments</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-registered"></i>
                    <span>Tests</span></a>
            </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-save"></i>
            <span>Staffs</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
