<div class="container-fluid">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-6 m-5 text-center">
                <div class="text-center">
                    <p class="text-color">create an account</p>
                </div>
                <h2 class="text-color fw-bold text-start">Register</h2>
                <form action="signup.php" method="post" enctype="multipart/form-data" class="container" style="max-width: 500px;">
                    <div class="input-group mb-3">
                        <input type="text" name="firstname" class="form-control py-3 rounded-start-3 borders border-end-0" id="firstname" placeholder="firstname">
                        <span class="input-group-text bg-white borders border-start-0"><i class="bi bi-person" style="color: darkblue; font-size: 1.5rem;"></i></span>
                    </div> 
                    
                    <div class="input-group mb-3">
                        <input type="text" name="surname" class="form-control py-3 rounded-start-3 borders border-end-0" id="surname" placeholder="surname">
                        <span class="input-group-text bg-white borders border-start-0"><i class="bi bi-person" style="color: darkblue; font-size: 1.5rem;"></i></span>
                    </div> 

                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control py-3 rounded-start-3 borders border-end-0" id="username" placeholder="Username">
                        <span class="input-group-text bg-white borders border-start-0"><i class="bi bi-person" style="color: darkblue; font-size: 1.5rem;"></i></span>

                    </div>

                    <div class="input-group mb-3">
                        <input type="tel" name="phone" class="form-control py-3 rounded-start-3 borders border-end-0" id="phone" placeholder="Phone Number">
                        <span class="input-group-text bg-white borders border-start-0"><i class="bi bi-telephone" style="color: darkblue; font-size: 1.5rem;"></i></span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control py-3 rounded-start-3 borders border-end-0" id="email" placeholder="Email">
                        <span class="input-group-text bg-white borders border-start-0"><i class="bi bi-envelope" style="color: darkblue; font-size: 1.5rem;"></i></span>
                    </div>

                    <!-- <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control py-3 rounded-start-3 borders border-end-0" id="imageInput" accept="image/*">
                        <span class="input-group-text bg-white borders border-start-0"><i class="bi bi-image" style="color: darkblue; font-size: 1.5rem;"></i></span>
                    </div> -->

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control py-3 rounded-start-3 borders border-end-0" id="password" placeholder="Password">
                        <span class="input-group-text bg-white borders border-start-0">
                            <i class="bi bi-eye-slash" style="color: darkblue; font-size: 1.5rem;" id="togglePassword" style="cursor: pointer;" onclick="togglePasswordVisibility('password', this)"></i>
                        </span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="Cpassword" class="form-control py-3 rounded-start-3 borders border-end-0" id="Cpassword" placeholder="Confirm Password">
                        <span class="input-group-text bg-white borders border-start-0">
                            <i class="bi bi-eye-slash" style="color: darkblue; font-size: 1.5rem;" id="toggleCPassword" style="cursor: pointer;" onclick="togglePasswordVisibility('Cpassword', this)"></i>
                        </span>
                    </div>

                    <div class="text-start col-sm-3">
                        <input type="checkbox" class="form-checkbox">
                        By signing up, you agree to our <span class="text-color fw-bold">Terms & Conditions</span>
                    </div>


                    <button name="signup" class="btn btn-sign btn-outline-primary col-sm-3 m-3">Register</button>

                    <p class="text-color">Already have account? <a href="login.php" class="fw-bold text-color text-decoration-none">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</div>