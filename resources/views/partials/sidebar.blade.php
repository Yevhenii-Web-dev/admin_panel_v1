<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ __('Checklister') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span> {{ __('Dashboard') }}</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    @if(auth()->user()->is_admin)
        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Admin') }}
        </div>

        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.pages.index') }}" data-toggle="collapse"
               data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Other Pages:</h6>
                    <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a>
                </div>
            </div>
        </li>



        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Checklist groups') }}
        </div>
        @forelse(\App\Models\ChecklistGroup::with('checklists')->get() as $group)
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.pages.index') }}" data-toggle="collapse"
                   data-target="#collapseChecklistGroups_{{ $group->id }}"
                   aria-expanded="true" aria-controls="collapseChecklistGroups">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>{{ $group->name }}</span>
                </a>
                <div id="collapseChecklistGroups_{{ $group->id }}" class="collapse" aria-labelledby="headingPages"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item d-flex align-items-center justify-content-around"
                           href="{{ route('admin.checklist_groups.edit', $group->id )}}">{{ __('Edit group') }}
                            <i class="fas fa-edit"></i>
                        </a>
                        <h6 class="collapse-header">{{ __('Checklists') }}</h6>
                        @forelse($group->checklists as $cheklist)
                            <a class="collapse-item" href="{{ route('admin.checklist_groups.checklists.edit', [$group->id, $cheklist->id]) }}">
                                {{ $cheklist->name }}</a>
                        @empty
                            <a class="collapse-item d-flex align-items-center justify-content-around"
                               href="{{ route('admin.checklist_groups.checklists.create', $group->id)  }}">
                                <i class="fas fa-plus-circle mr-3"></i>
                                <span>{{ __('Add new checklist') }}</span>
                            </a>
                        @endforelse
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>
        @empty
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.checklist_groups.create')  }}">
                    <i class="fas fa-plus-circle mr-3"></i>
                    <span>{{ __('Add new checklist') }}</span>
                </a>
            </li>
        @endforelse

    @else
        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('User name') }}
        </div>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>

