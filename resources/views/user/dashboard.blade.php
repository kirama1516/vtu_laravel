<x-app-layout>
    <div class="container text-center mt-2">
        <div class="p-3 mb-2 rounded wallet">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <a href="wallet.php">
                        <img src="{{ asset('images/walletIcon.png')}}" width="60" alt="Wallet" class="me-2">
                    </a>
                    <div class="text-start text-color">
                        <div class="small">Wallet balance</div>
                        <div id="balance" class="fw-bold fs-5">
                            {{-- ₦<?php echo isset($wallet['mainBalance']) ? $wallet['mainBalance'] : '0.00'; ?> --}}
                        </div>
                    </div>
                </div>
                <button id="toggleBalance" class="btn btn-sm bg-white border-0">
                    <img id="toggleIcon" src="{{ asset('images/hideIcon.png')}}" width="25px" alt="Toggle Icon">
                </button>
            </div>
        </div>

        <!-- Add Money / History -->
        <div class="d-flex justify-content-between mb-3 px-4">
            <a href="addMoney.php" class="btn btn-color w-45 rounded-4">
                <img src="{{ asset('images/addIcon.png')}}" alt="Add Money" width="20px"> Add money
            </a>
            <a href="transactions.php" class="btn btn-color w-45 rounded-4">
                <img src="{{ asset('images/historyIcon.png')}}" alt="History" width="20px"> History
            </a>
        </div>

        <!-- Account Details -->
        <div class="p-2 mx-4 mb-4 rounded-4 text-color" id="accountdetails">
            {{-- <?php if (!empty($user['accName']) && !empty($user['accNumber']) && !empty($user['bankName'])) : ?> --}}
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="fw-semibold fs-6">{{ auth()->user()->accNumber }}</div>
                    <div class="fw-medium">{{ auth()->user()->bankName }}</div>
                </div>
                <div class="d-flex flex-column align-items-center text-end">
                    <button class="btn p-0" id="copy" aria-label="Copy account">
                        <img src="{{ asset('images/copyIcon.png')}}" width="25" alt="Copy">
                    </button>
                    <div class="fw-medium" id="accName">{{ auth()->user()->accName }}</div>
                </div>
            </div>
        {{-- <?php else : ?>
            <a href="profile.php" class="text-decoration-none">Click here to create virtual account <i class="bi bi-hand-index"></i></a>
        <?php endif; ?> --}}
        </div>
        <!-- Quick Services -->
        <div class="row text-center mx-3 g-2 rounded-5" id="services">
            <div class="col-4">
                <a href="{{ route('user.buyAirtime')}}"><img src="{{ asset('images/airtimeIcon.png')}}" width="60" alt=""></a>
                <div class="small text-color">Airtime</div>
            </div>
            <div class="col-4">
                <a href="{{ route('user.buyData')}}"><img src="{{ asset('images/dataIcon.png')}}" width="60" alt=""></a>
                <div class="small text-color">Data</div>
            </div>
            <div class="col-4">
                <a href="{{ route('user.buyCable')}}"><img src="{{ asset('images/cableIcon.png')}}" width="60" alt=""></a>
                <div class="small text-color">Cable</div>
            </div>
            <div class="col-4">
                <a href="{{ route('user.buyExam')}}"><img src="{{ asset('images/examIcon.png')}}" width="60" alt=""></a>
                <div class="small text-color">Exam</div>
            </div>
            <div class="col-4">
                <a href="{{ route('user.buyElectricity')}}"><img src="{{ asset('images/electricityIcon.png')}}" width="60" alt=""></a>
                <div class="small text-color">Electricity</div>
            </div>
            <div class="col-4 mb-3">
                <a href="{{ route('user.bulkSMS')}}"><img src="{{ asset('images/bulkIcon.png')}}" width="60" alt=""></a>
                <div class="small text-color">More</div>
            </div>
        </div>
    </div>

    <div class="fixed-bottom mx-5 mb-3 footer">
        <div class="d-flex justify-content-around text-center py-2">
            <a href="dashboard.php">
                <img src="{{ asset('images/homeIcon.png')}}" width="25" alt="Home"><br>
                <small class="text-color">Home</small>
            </a>
            <a href="customerCare.php">
                <img src="{{ asset('images/customerIcon.png')}}" width="25" alt="Customer Care"><br>
                <small class="text-color">Customer Care</small>
            </a>
            <a href="account.php">
                <img src="{{ asset('images/accountIcon.png')}}" width="25" alt="Account"><br>
                <small class="text-color">Account</small>
            </a>
        </div>
    </div>
</x-app-layout>