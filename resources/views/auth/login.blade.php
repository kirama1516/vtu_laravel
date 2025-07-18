<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 text-center">
            <div class="text-center p-3">
                <img class="img-fluid" src="assets/images/loginIcon.png" alt="userlogo" width="100px">
            </div>
            <p class="text-color text-start">Welcome Back!!!</p>
            <h2 class="text-color text-start fw-bold">Login</h2>
            <form action="login.php" method="post" class="container" style="max-width: 500px;">
                <div class="input-group mb-4">
                    <input type="text" name="usermail" class="form-control text-decoration-none py-3 rounded-start-3 borders border-end-0" id="email" placeholder="Email/Username">
                    <span class="input-group-text bg-white borders border-start-0"><i class="bi bi-envelope" style="color: darkblue; font-size: 1.5rem;"></i></span>
                </div>

                <div class="input-group mb-4">
                    <input type="password" name="password" class="form-control borders py-3 rounded-start-3 border-end-0" id="password" placeholder="Password">
                    <span class="input-group-text bg-white borders border-start-0"><i class="bi bi-eye-slash" style="color: darkblue; font-size: 1.5rem;" id="togglePassword" style="cursor: pointer;"></i></span>
                </div>
                <!-- <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control borders border-end-0" id="password" placeholder="Password">
                    <span class="input-group-text bg-white borders border-start-0">
                        <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer;"></i>
                    </span>
                </div> -->

                <div class="text-end">
                    <a href="forgotPassword.php" class="text-color text-decoration-none fw-bold">Forgot Password</a>
                </div>

                <button name="login" class="btn btn-login btn-outline-primary col-4 m-3">Login</button>
                <p class="text-color">Don't have an account? <a href="signup.php" class="fw-bold text-color text-decoration-none">Register</a></p>
            </form>
        </div>
    </div>
</div>