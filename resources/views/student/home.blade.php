@extends('layouts.app')
@section('content')
    <div>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/pics/pexels-buro.jpg') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/pics/pexels-andrew.jpg') }}" class="img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/pics/pexels-fauxels.jpg') }}" class="img-fluid" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="py-5"></div>
    <div class="bg-primary-fade">
        <div class="py-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 align-self-center text-center">
                    <a href="{{ route('regUnits.index') }}" class="btn btn-primary align-items-center">Units Registration</a>
                </div>
                <div class="col-sm-6">
                    <h2>Easily Know what to study</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid doloremque molestiae nisi, perspiciatis quae qui.
                    </p>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
    </div>
    <div class="py-5"></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Check your Performance and see where to Improve</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta dignissimos dolor facilis magnam maiores, porro quis recusandae ullam. Eligendi, sint.
                    </p>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <a href="{{ route('student.results') }}" class="btn btn-primary">Check My Results</a>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5"></div>
    <div class="bg-primary-fade">
        <div class="py-5"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 align-self-center text-center">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary">View my Dashboard</a>
                </div>
                <div class="col-sm-6">
                    <h2>View Your Progress in one page</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid doloremque molestiae nisi, perspiciatis quae qui.
                    </p>
                </div>
            </div>
        </div>
        <div class="py-5"></div>
    </div>
    <div class="py-4"></div>
@endsection
