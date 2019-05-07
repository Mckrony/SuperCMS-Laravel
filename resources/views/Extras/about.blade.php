<!DOCTYPE html>
<html>
<title>About</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
<style>
    body {font-family: "Raleway", Arial, sans-serif}
    .w3-row img {margin-bottom: -8px}
</style>
<body>

<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1500px">

    <!-- Header -->
    <header class="w3-container w3-xlarge w3-padding-24">
        <a href="{{ url('/Front') }}" class="w3-left w3-button w3-white">Geekadelphia@About</a>
        <a href="{{ url('/about') }}" class="w3-left w3-button w3-white">About</a>
        <a href="{{ url('/services') }}" class="w3-left w3-button w3-white">Services</a>
        <a href="{{ url('/contact') }}" class="w3-left w3-button w3-white">Contact</a>

        @if (Auth::guest())
            <a href="{{ url('/login') }}" class="w3-right w3-button w3-white">Login</a>
            <a href="{{ url('/register') }}" class="w3-right w3-button w3-white">Register</a>
        @else
            <a href="{{ url('/logouts') }}" class="w3-right w3-button w3-white">Logout</a>
            @if(session('key') == '1')
                <a href="{{ url('/admin') }}" class="w3-right w3-button w3-white">Admin</a>
            @endif
        @endif
    </header>

    <!-- Photo Grid -->
    <div class="w3-row">
        <div class="w3-half">
            <img src="{{ asset('img/streetart.jpg')}}" style="width:100%">
            <img src="{{ asset('img/streetart2.jpg')}}" style="width:100%">
            <img src="{{ asset('img/streetart5.jpg')}}" style="width:100%">
        </div>

        <div class="w3-half">
            <img src="{{ asset('img/streetart3.jpg')}}" style="width:100%">
            <img src="{{ asset('img/streetart4.jpg')}}" style="width:100%">
        </div>
    </div>

    <!-- End Page Content -->
</div>

<!-- Footer / About Section -->
<footer class="w3-light-grey w3-padding-64 w3-center" id="about">
    <h2>About</h2>
    <div class="w3-container w3-padding-64 w3-center" id="team">
        <h2>OUR TEAM</h2>
        <p>Meet the team - our precious squad</p>

        <div class=""><br>

            <div class="col-sm-3">
                <img src="img/12.jpg" alt="Boss" style="width:140px; height: 140px" class="w3-circle w3-hover-opacity">
                <h3>Soham Roy</h3>

            </div>

            <div class="col-sm-3">
                <img src="img/10.jpg" alt="Boss" style="width:140px; height: 140px" class="w3-circle w3-hover-opacity">
                <h3>Aditya Rahut</h3>

            </div>

            <div class="col-sm-2">
                <img src="img/13.jpg" alt="Boss" style="width:140px; height: 140px" class="w3-circle w3-hover-opacity">
                <h3>Ivy Saha</h3>

            </div>

            <div class="col-sm-2">
                <img src="img/11.jpg" alt="Boss" style="width:140px; height: 140px"class="w3-circle w3-hover-opacity">
                <h3>Tanay Das</h3>

            </div>

            <div class="col-sm-2">
                <img src="img/15.jpg" alt="Boss" style="width:140px; height: 140px"class="w3-circle w3-hover-opacity">
                <h3>Sreeparna Dutta</h3>

            </div>
        </div>
    </div>

</footer>

</body>
</html>
