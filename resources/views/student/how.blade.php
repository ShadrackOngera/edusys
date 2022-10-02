@extends('layouts.app')
@section('content')
    <div>
        <div class="container text-center">
            <h2 class="fw-bold">Guide on how to use some of the features on this website</h2>
            <p>
                On this page, You will be guided on how to use some of the features, This
            </p>
        </div>
    </div>
    <div class="py-5"></div>

    <div>
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            How to Register Units
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    On the Student home page, click <span>Register Units.</span>
                                </li>
                                <li>
                                    You will be redirected to the <a href="{{ route('regUnits.index') }}" class="text-decoration-none">Register units page.</a>
                                </li>
                                <li>
                                    Select the unit you are registering. Make sure the unit you are registering is correctly put. (The unit code and programme the unit belong to)
                                </li>
                                <li>
                                    click on Register unit
                                </li>
                                <li>
                                    <span class="fst-italic">Bravo!! You have succesfully registered for a unit.  </span> The registered unit will be on your dashborad and results page.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How To Print results
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    Open the <a href="{{ route('student.results') }}" class="text-decoration-none">Results page</a>.
                                </li>
                                <li>
                                    At the bottom of the page, click the print results button
                                </li>
                                <li>
                                    A screenshot of the button is shown below
                                </li>
                                <div class="card">
                                    <img src="{{ asset('images/pics/print-button.png') }}" alt="..." class="img-fluid border-2">
                                </div>
                                <li>
                                    <span class="fst-italic">BRAVO!! You have Printed your results</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            How to Contact support
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p>
                                To contact support, you can <strong>chat</strong> with the <strong>Admin</strong> directly from your student
                                <a href="{{ route('dashboard') }}">dashboard.</a>
                            </p>
                            <p>
                                All messages sent to the Admin are replied to and stored.
                            </p>
                            <p>
                                The chat is private(Between the account user and the Admin)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
