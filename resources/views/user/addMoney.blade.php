<x-app-layout>
    <div class="container-lg">
        <div class="row justify-content-center my-5">
            <div class="col-lg-6 text-center">
                <h3 class="text-color fw-bold">Add money</h3>
                <p class="text-dark">
                    The account number display below is your unique account number. You can transfer money to this account number to add money to your wallet.
                </p>
                <p class="text-color">
                    Automated Bank transfer attack Additions to your wallet will be reflected in your wallet balance within 24 hours.
                </p>
                <p class="text-danger">
                    Charges of N50 will be deducted from your wallet balance for every transaction.
                </p>
                <div class="row justify-content-center">
                    <div class="col-sm-3 m-3 d-flex flex-column align-items-center gap-2" id="accountdetails">
                        <!-- Account Details -->
                        <span class="text-color">{{ $user->accNumber}}
                        <br>{{ $user->accName}}
                        <br>{{ $user->bankName}}</span>
                        <!-- Copy Button -->
                        <button class="btn p-0" id="copy">
                            <img src="{{asset('/images/copyIcon.png')}}" width="20px" alt="Copy">
                        </button>

                        <!-- Name Below -->
                        <!-- <span class="text-primary fw-bold text-center">Abdullahi Faruk Adam</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
