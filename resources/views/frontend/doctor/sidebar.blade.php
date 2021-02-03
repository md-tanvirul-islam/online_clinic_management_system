<div class="profile-sidebar">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">    
                    @php
                        if(isset($doctor->image))
									{
										$photo = asset($doctor->image);
									}
									else {
										if($doctor->gender === "Male")
										{
                                            $photo = asset('ui/frontend/img/doctors/doctor_male.png');
										}
										else
										{
                                            $photo = asset('ui/frontend/img/doctors/doctor_female.png');
										}
									}
                    @endphp                                      
                <img src="{{ $photo }}" alt="Doctor Image">
            </a>
            <div class="profile-det-info">
                <h3>Dr. {{ $doctor->name }}</h3>
                
                <div class="patient-details">
                    <h5 class="mb-0">{{ $doctor->degree }} {{ $doctor->speciality }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li >
                    <a href="{{ route('doctor.own.index') }}">
                        <i class="fas fa-columns"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.own.appointment') }}">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-user-injured"></i>
                        <span>My Patients</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('doctor.own.schedule') }}">
                        <i class="fas fa-hourglass-start"></i>
                        <span>Schedule Timings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>