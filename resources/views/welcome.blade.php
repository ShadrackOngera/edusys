@extends('layouts.app')
@section('content')
    <div class="py-5"></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 align-self-center">
                    <h3>About <span class="fst-italic">{{ config('app.name') }}</span></h3>
                    <p>
                        A learning management system (LMS) is a software application for the administration, documentation, tracking, reporting, automation, and delivery of educational courses, training programs, materials or learning and development programs.
                    </p>
                    <p>
                        The learning management system concept emerged directly from e-Learning. Learning management systems make up the largest segment of the learning system market.
                    </p>
                    <p>
                        The first introduction of the LMS was in the late 1990s. Learning management systems have faced a massive growth in usage due to the emphasis on remote learning during the COVID-19 pandemic.
                    </p>

                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('images/pics/laptop-one.jpg') }}" alt="..." class="img-fluid rounded-3">
                </div>
            </div>
        </div>
    </div>
    <div class="py-5"></div>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ asset('images/pics/laptop-two.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-sm-6 align-self-center">
                    <h3 class="text-center">Why Choose Our System</h3>
                    <p>
                        Learning management systems were designed to identify training and learning gaps, using analytical data and reporting.
                    </p>
                    <p>
                        LMSs are focused on online learning delivery but support a range of uses, acting as a platform for online content, including courses, both asynchronous based and synchronous based. In the higher education space, an LMS may offer classroom management for instructor-led training or a flipped classroom
                    </p>
                    <p>
                        Modern LMSs include intelligent algorithms to make automated recommendations for courses based on a user's skill profile as well as extract metadata from learning materials to make such recommendations even more accurate.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-5"></div>
    <div>
        <div class="container position-relative">
            <div class="col-sm-8 text-center position-absolute top-50 start-50 translate-middle">
                <h3>About</h3>
                <p>
                    <span class="fst-italic">{{ config('app.name') }}</span> was created by <span class="fst-italic">David Kioko</span> with the intentions of creating a more reliable system that
                    will help link Students and Their Lectures, Enable Lecturers to key in students scores and let students see their results in real time.
                </p>
            </div>
        </div>
    </div>
    <div class="py-5"></div>
@endsection
