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
</style>
<body>

<!-- !PAGE CONTENT! -->
<div class="w3-content" style="max-width:1500px">

    <!-- Header -->
    <header class="w3-container w3-xlarge w3-padding-24">
        <a href="{{ url('/Front') }}" class="w3-left w3-button w3-white">Geekadelphia@Contact</a>
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
    <img src="{{ asset('img/streetart4.jpg')}}" class="w3-image w3-padding-32" width="240" height="240">
    <img src="{{ asset('img/streetart4.jpg')}}" class="w3-image w3-padding-32" width="240" height="240">
    <img src="{{ asset('img/streetart4.jpg')}}" class="w3-image w3-padding-32" width="240" height="240">
    <img src="{{ asset('img/streetart4.jpg')}}" class="w3-image w3-padding-32" width="240" height="240">
    <img src="{{ asset('img/streetart4.jpg')}}" class="w3-image w3-padding-32" width="240" height="240">
    <form style="margin:auto;width:60%" action="/action_page.php" target="_blank">
        <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        <p class="w3-large w3-text-pink">Do not hesitate to contact me!</p>
        <div class="w3-section">
            <label><b>Name</b></label>
            <input class="w3-input w3-border" type="text" required name="Name">
        </div>
        <div class="w3-section">
            <label><b>Email</b></label>
            <input class="w3-input w3-border" type="text" required name="Email">
        </div>
        <div class="w3-section">
            <label><b>Message</b></label>
            <input class="w3-input w3-border" required name="Message">
        </div>
        <button type="submit" class="w3-button w3-block w3-dark-grey">Send</button>
    </form>
    <br>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
