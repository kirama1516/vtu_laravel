<x-app-layout>
   <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="text-dark m-4 fw-bold">Buy Airtime</h3>
                @if ($service->status !== 'active')
                    <div class="alert alert-danger d-flex align-items-center justify-content-center rounded-pill py-3 shadow-sm">
                        <i class="bi bi-exclamation-triangle-fill me-2" style="font-size: 1.5rem;"></i>
                        <span class="fw-semibold">Airtime is no longer available at this moment. Please check back later.</span>
                    </div>
                    <a href="{{ route('user.dashboard')}}" class="btn btn-outline-dark rounded-pill px-4 fw-semibold mt-3">
                        <i class="bi bi-box-arrow-left me-3" style="font-size: 1.5rem;"></i> Back to Dashboard
                    </a>
                @else
                    <form action="{{ route('user.buyAirtime') }}" method="post" onsubmit="return validateForm()" class="p-4">
                    @csrf
                        <div class="mb-4">
                            <select name="biller_id" id="biller_id" class="form-select py-3 rounded-pill" required>
                                <option value="">Select network</option>
                                @foreach ($billers as $biller)
                                    <option value="{{ $biller->id }}">{{ $biller->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <input type="text" name="service_id" value="{{ $service->id }}" id="service_id" readonly>
                        </div>
                    
                        <div class="mb-4">
                            <select name="category_id" id="category_id" class="form-select py-3 rounded-pill" required>
                                <option value="">Select type</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <input type="number" name="price" id="amount" class="form-control py-3 rounded-pill" placeholder="Enter amount" required>
                        </div>

                        <div class="mb-4">
                            <input type="number" name="beneficiary" id="phone" class="form-control py-3 rounded-pill" placeholder="Enter phone Number" required">
                            <span id="phoneError" class="error-message">Invalid phone number (10–11 digits required).</span>
                        </div>

                        <div class="mb-4">
                            <input type="password" name="pin" id="pin" class="form-control py-3 rounded-pill" placeholder="Enter Pin" required>
                        </div>
                    
                        <input type="hidden" name="total" id="total">
                        <input type="hidden" name="quantity" id="quantity">
                    
                        <button type="submit" name="buyAirtime" class="btn w-100 py-3 text-white fw-bold rounded-pill" style="background-color: #0a0a7a;">
                            Buy Now - Pay: ₦<span id="btnTotal">0.00</span>
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
