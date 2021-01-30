
@php
    if(isset($patient->image))
		{
			$photo = asset($patient->image);
		}
		else {
			if($patient->gender === "male")
            {
                $photo = asset('ui/frontend/img/patients/patient_male.png');
            }
            else
            {
                $photo = asset('ui/frontend/img/patients/patient_female.png');
            }
        }
        $birthDate = \Carbon\Carbon::parse($patient->birthDate);
@endphp       
<!-- Profile Sidebar -->

    <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
            <div class="profile-info-widget">
                <a href="#" class="booking-doc-img">
                    <img src="{{ $photo }}" alt="Patient Image">
                </a>
                <div class="profile-det-info">
                    <h3>{{ $patient->name ?? '---'}}</h3>
                    <div class="patient-details">
                        <h5><i class="fas fa-birthday-cake"></i> {{ $birthDate->format('d F, Y') ?? '---' }}, {{ $birthDate->age ?? '---' }} years</h5>
                        <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> {{ $patient->address ?? '---' }}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="dashboard-widget">
            <nav class="dashboard-menu">
                <ul>
                    <li >
                        <a href="{{ route('patient.own.dashboard') }}">
                            <i class="fas fa-columns"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('patient.own.appointments') }}">
                            <i class="far fa-calendar-alt"></i>
                            <span>Appointments</span>
                        </a>
                    </li>
                      <li>
                        <a href="{{ route('patient.own.prescriptions') }}">
                            <i class="fas fa-prescription"></i>
                            <span>Prescriptions</span>
                            {{-- <small class="unread-msg">23</small> --}}
                        </a>
                    </li>
                   {{-- <li>
                        <a href="profile-settings.html">
                            <i class="fas fa-user-cog"></i>
                            <span>Profile Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="change-password.html">
                            <i class="fas fa-lock"></i>
                            <span>Change Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="index-2.html">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li> --}} 
                </ul>
            </nav>
        </div>

    </div>

<!-- / Profile Sidebar -->