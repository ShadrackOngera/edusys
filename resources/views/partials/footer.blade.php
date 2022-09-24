<div class="bg-primary-fade">
    <div class="py-2"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-center">
                <ul class="navbar-nav text-orange">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home.student') }}" class="nav-link">
                            Student Home
                        </a>
                    </li>
                    @can('create unit')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.admin') }}">
                                Admin Home
                            </a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{ route('regUnits.index') }}" class="nav-link">
                            Register Units
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('student.results') }}" class="nav-link">
                            View Results
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Back to top
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4 text-indigo align-self-center text-center">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    My Dashboard
                </a>
                <p>
                    Scaling greater Heights
                </p>
            </div>
            <div class="col-sm-4 align-self-center text-center">
                <h5 class="text-muted">Contacts</h5>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        +254782466615
                    </li>
                    <li class="nav-item">
                        admin@email.com
                    </li>
                </ul>

            </div>
        </div>
        <hr>
        <p>
        <span class="d-flex justify-content-between">
            <small>©Copyright {{ date('Y') }} {{ config('app.name') }}.</small>
            <small>All Rights Reserved</small>
        </span>
        </p>
    </div>
    <div class="py-5"></div>
</div>
