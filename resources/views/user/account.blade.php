<x-app-layout>
    <div class="container-lg">
        <div class="row justify-content-center my-5">
            <div class="col-lg-6 text-center">
                <img src="{{asset('images/accountIcon.png')}}" alt="Profile" width="50px" class="rounded-circle m-3">
                <h3 class="text-color fw-bold">Account</h3>
                <p class="text-color text-start">
                    Username: <span class="text-dark">{{ $user->username}}</span>
                </p>
                <p class="text-color text-start">
                    Email: <span class="text-dark">{{ $user->email}}</span>
                </p>
                <p class="text-color text-start">
                    Phone Number: <span class="text-dark">{{ $user->phone}}</span>
                </p>
                <a href="settings.php" class="btn btn-account col-6">Manage profile</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="accordion mt-1" id="infoAccordion">
                    <!-- Terms and Conditions -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#terms">
                                <span class="text-color">Terms and Conditions</span>
                            </button>
                        </h2>
                        <div id="terms" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                            By using our services, you agree to our terms and conditions. Please read them carefully before using our services.
                            <br><br>
                            <a href="terms.php" class="btn btn-account">Read Terms</a>
                            </div>
                        </div>
                    </div>
                    <!-- Privacy Policy -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#privacy">
                                <span class="text-color">Privacy Policy</span>
                            </button>
                        </h2>
                        <div id="privacy" class="accordion-collapse collapse">
                           <div class="accordion-body">
                                We respect your privacy. Read our privacy policy to understand how we collect, use, and protect your personal information.
                                <br><br>
                                <a href="privacy.php" class="btn btn-account">Read Policy</a>
                            </div>
                        </div>
                    </div>
                    <!-- Rate Us -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rate">
                               <span class="text-color">App Info</span>
                            </button>
                        </h2>
                        <div id="rate" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Rate our services and help us improve. Your feedback is important to us.
                                <br><br>
                                <a href="rate.php" class="btn btn-account">Rate Us</a>
                            </div>
                        </div>
                    </div>
                    <!-- App Info -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#appinfo">
                                <span class="text-color">App Info</span>
                            </button>
                        </h2>
                        <div id="appinfo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Get information about our app, its features, and how to use it.
                                <br><br>
                                <a href="appinfo.php" class="btn btn-account">App Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
