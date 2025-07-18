<x-layout>
    <div class="row justify-content-center m-5">
        <div class="col-sm-2 mt-4 text-center">
            <img class="img-fluid mt-2" src="/assets/images/logo.jpg" alt="" style="width: 50%; height: 80%">
        </div>
        <div class="row-md-2 text-center">
            <h3 class="text-color fw-bold">Welcome</h3>
            <div class="row">
                <p class="text-color">M5 DATA App is an innovative digital platform that provides a wide range of essential services, making it easier for customers to access important products and services in just a few taps.</p>
            </div>
            <div class="row-md-3">
                <a href="{{ route('auth.register') }}" class="btn btn-create col-sm-3 m-3">Create Account</a>
            </div>
            <div class="row-md-3">
                <a href="{{ route('auth.login')}}" class="btn btn-login col-sm-3">Login</a>
            </div>
        </div>
        <div class="row text-color m-3 text-center">
            <footer>
                <small>All Right Reserved @ 2025</small>
            </footer>
        </div>
        <div class="text-color position-fixed" style="bottom: 50px; left: 86%;">
            <a href="https://wa.me/07015168580" target="_blank" class="text-color" style="font-size: 2rem;">
                <i class="bi bi-chat-right-text-fill"></i>
            </a>
        </div>
    </div>
</x-layout>