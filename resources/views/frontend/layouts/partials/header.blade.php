<header class="header">
    @extends('backend.layouts.flash-message')
    <nav class="navbar navbar-expand-lg header-nav">
        <div class="navbar-header">
            <a id="mobile_btn" href="javascript:void(0);">
                <span class="bar-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
            <a href="{{ route('indexPage') }}" class="navbar-brand logo">
                <img src="{{ asset('ui/frontend/img/logo.png') }}" class="img-fluid" alt="Logo">
            </a>
        </div>
        <div class="main-menu-wrapper">
            <div class="menu-header">
                <a href="#" class="menu-logo">
                    <img src=" {{ asset('ui/frontend/img/logo.png') }}" class="img-fluid" alt="Logo">
                </a>
                <a id="menu_close" class="menu-close" href="javascript:void(0);">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <ul class="main-nav">
                <li class="active">
                    <a href="{{ route('indexPage') }}">Home</a>
                </li>
                {{-- <li class="has-submenu">
                    <a href="#">Patient <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
                        <li><a href="appointments.html">Appointments</a></li>
                        <li><a href="schedule-timings.html">Schedule Timing</a></li>
                        <li><a href="my-patients.html">Patients List</a></li>
                        <li><a href="patient-profile.html">Patients Profile</a></li>
                        <li><a href="chat-doctor.html">Chat</a></li>
                        <li><a href="invoices.html">Invoices</a></li>
                        <li><a href="doctor-profile-settings.html">Profile Settings</a></li>
                        <li><a href="reviews.html">Reviews</a></li>
                        <li><a href="doctor-register.html">Doctor Register</a></li>
                    </ul>
                </li>	 --}}
                <li class="has-submenu">
                    <a href="#">Doctors <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        @auth
                            @if (auth()->user()->type === 'doctor')
                                <li><a href="{{ route('doctor.own.index') }}">Doctor Dashboard</a></li>
                                <li><a href="#">Doctor Profile</a></li>
                            @endif
                        @endauth
                        <li><a href="{{ route('doctorSearch') }}">Search Doctor</a></li>
                        <li><a href="{{ route('doctorSearch') }}">Make Appointment</a></li>
                        {{-- <li><a href="checkout.html">Checkout</a></li>
                        <li><a href="booking-success.html">Booking Success</a></li>
                        <li><a href="patient-dashboard.html">Patient Dashboard</a></li>
                        <li><a href="favourites.html">Favourites</a></li>
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="profile-settings.html">Profile Settings</a></li>
                        <li><a href="change-password.html">Change Password</a></li> --}}
                    </ul>
                </li>	
                <li class="has-submenu">
                    <a href="#">Language <i class="fas fa-chevron-down"></i></a>
                    <ul class="submenu">
                        <li><a href="{{ route('language',['bn']) }}">Bangla</a></li>
                        <li><a href="{{ route('language',['en']) }}">English</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="admin/index.html" target="_blank">Admin</a>
                </li> --}}
                <li class="login-link">
                    <a href={{ route('login') }}>Login / Signup</a>
                </li>
            </ul>		 
        </div>		 
        <ul class="nav header-navbar-rht">
            <li class="nav-item contact-item">
                <div class="header-contact-img">
                    <i class="far fa-hospital"></i>							
                </div>
                <div class="header-contact-detail">
                    <p class="contact-header">Contact</p>
                    <p class="contact-info-header"> +88 017 134 479 20</p>
                </div>
            </li>
            @auth
                @php
                    $user = App\Models\User::find(auth()->user()->id);
                @endphp
                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter">{{ count($user->notifications) }}</span>
                    </a>
                    <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Alerts Center
                        </h6>
                        @if ($user->notifications)
                            @foreach ($user->notifications as $notification)
                            @php
                                $created_at = \Carbon\Carbon::parse($notification->created_at);
                            @endphp
                            <a class="dropdown-item d-flex align-items-center" href="{{ $notification->data['link'] }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-success">{{ $created_at->diffForHumans() }}</div>
                                        <span class="font-weight-bold"> {{ $notification->data['message'] }}</span>
                                </div>
                                @endforeach
                            </a>
                        @endif
                        
                        
                        {{-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> --}}
                    </div>
                </li>
            @endauth
            
            @auth
                @php     
                    //for image
                    if(auth()->user()->type === 'doctor')
                    {
                        if(isset(auth()->user()->doctorProfile->image))
                        {
                            $photo = asset(auth()->user()->doctorProfile->image);
                        }
                        else 
                        {
                            if(auth()->user()->doctorProfile->gender === "Male")
                            {
                                $photo = asset('ui/frontend/img/doctors/doctor_male.png');
                            }
                            else
                            {
                                $photo = asset('ui/frontend/img/doctors/doctor_female.png');
                            }
                        }
                    }elseif(auth()->user()->type === 'patient')
                    {
                        if(isset(auth()->user()->patientProfile->image))
                        {
                            $photo = asset(auth()->user()->patientProfile->image);
                        }
                        else 
                        {
                            if(auth()->user()->patientProfile->gender === "Male")
                            {
                                $photo = asset('ui/frontend/img/patients/patient_male.png');
                            }
                            else
                            {
                                $photo = asset('ui/frontend/img/patients/patient_female.png');
                            }
                        }
                    }elseif(auth()->user()->type === 'admin')
                    {
                        // if(isset(auth()->user()->patientProfile->image))
                        // {
                        //     $photo = asset(auth()->user()->patientProfile->image);
                        // }
                        // else 
                        // {
                            // if(auth()->user()->patientProfile->gender === "male")
                            // {
                                $photo = asset('ui/backend/images/admin.jpg');
                            // }
                            // else
                            // {
                            //     $photo = asset('ui/frontend/img/patients/patient_female.png');
                            // }
                        // }
                    }


                    // for dashboard
                    if(auth()->user()->type === 'doctor')
                    {
                        $dashboardLink = route('doctor.own.index');
                    }
                    elseif(auth()->user()->type === 'patient') {
                        $dashboardLink = route('patient.own.dashboard');
                    }elseif(auth()->user()->type === 'admin') {
                        $dashboardLink = route('admin.index');
                    }

                    //for profile link
                    if(auth()->user()->type === 'doctor')
                    {
                        $profileLink = route('doctor.own.profile');
                    }
                    elseif(auth()->user()->type === 'patient') {
                        $profileLink = route('patient.own.profile');
                    }elseif(auth()->user()->type === 'admin') {
                        $profileLink = '#';
                    }

                @endphp
            @endauth
                @guest
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ route('login') }}" style="margin: 5px">LogIn </a>
                    <a class="nav-link header-login" href="{{ route('register') }}">Signup </a>
                </li>
                @endguest
                @auth
                <!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="{{$photo ?? '---'}}" width="31" alt=" login User Image">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="{{$photo ?? '---'}}" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>{{ auth()->user()->name }}</h6>
										<p class="text-muted mb-0">{{ auth()->user()->type }}</p>
									</div>
								</div>
								<a class="dropdown-item" href="{{$dashboardLink ?? '#'}}">Dashboard</a>
								<a class="dropdown-item" href="{{$profileLink ?? '#'}}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form> 
							</div>
						</li>
						<!-- /User Menu -->
                @endauth       
                     
        </ul>
    </nav>
</header>