@extends('layout')
@section('main')
<div class="container mt-5 container col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Our Blogging Platform</h1>
        <p class="lead">
            Our company has been a leader in the industry for over a decade. We pride ourselves on delivering top-notch services and products to our clients. Our dedicated team of professionals works tirelessly to ensure customer satisfaction and to drive innovation in our field.
        </p>
        <hr class="my-4">
        <p>
            Our mission is to provide unparalleled quality and value to our customers. We believe in integrity, commitment, and excellence in everything we do.
        </p>
    </div>

    <h2 class="text-center mb-4">Our Team</h2>
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="team-member">
                <img src="team-member1.jpg" class="img-fluid mb-3" alt="Team Member 1">
                <h3>John Doe</h3>
                <p>CEO</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="team-member">
                <img src="team-member2.jpg" class="img-fluid mb-3" alt="Team Member 2">
                <h3>Jane Smith</h3>
                <p>CTO</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="team-member">
                <img src="team-member3.jpg" class="img-fluid mb-3" alt="Team Member 3">
                <h3>Emily Johnson</h3>
                <p>Head of Marketing</p>
            </div>
        </div>
    </div>
</div>
@endsection