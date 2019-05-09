<!DOCTYPE html>
<html>
<title>Services</title>
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
    <button class="collapsible">Where can I find my personalized recommendations?</button>
    <div class="content">
        <p>Geekadelphia makes personalized recommendations to help you discover movies and TV shows that you will love.


            Recommended titles will show under the section "Recommend For You" on the Geekadelphia homepage.</p>
    </div>
    </div>
    <div class="container">
        <button class="collapsible">How does Geekadelphia know what I showed interest in?</button>
        <div class="content">
            <p>When you give a movie a positive rating or add a movie to your Watchlist, we track that as a movie that you are interested in.</p>
        </div>
    </div>
    <div class="container">
        <button class="collapsible">How can I improve my personalized recommendations?</button>
        <div class="content">
            <p>To improve your personalized recommendations, find and rate the movies that you love.

            </p>
        </div>
    </div>
    <div class="container">
        <button class="collapsible">What does uncredited mean?</button>
        <div class="content">
            <p>The word uncredited next to a name means that the person did not receive an on-screen credit -- in other words, their name does not appear in the main or end titles of the film or show.



            </p>
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
 </footer>

</body>
</html>
