<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">
<style>
    body {font-family: "Raleway", Arial, sans-serif}
    .w3-row img {margin-bottom: -8px}
    .collapsible {
        background-color: #5bc0de;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .active, .collapsible:hover {
        background-color: #555;
    }

    .content {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
    }
</style>
<body>

<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1500px">

    <!-- Header -->
    <header class="w3-container w3-xlarge w3-padding-24">
        <a href="{{ url('/Front') }}" class="w3-left w3-button w3-white">Geekadelphia@Services</a>
        <a href="{{ url('/about') }}" class="w3-left w3-button w3-white">About</a>
        <a href="{{ url('/contact') }}" class="w3-left w3-button w3-white">Services</a>
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
    <h2>Services And FAQ</h2>

    <p>FAQ</p>
    <div class="container">
    <button class="collapsible">Open Collapsible</button>
    <div class="content">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    </div>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
    <br>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
