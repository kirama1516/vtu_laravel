<x-layout>
    <div class="container">
        <div class="pin-container">
            <h4 class="text-center m-5 text-color">Create Your PIN</h4>
            @if ($errors->any())
                <div>
                    <ul style="color: red">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>  
            @endif
            <form action="{{ route('auth.set-pinPost')}}" method="POST" class="container" style="max-width: 500px;">
                @csrf
                <!-- PIN Input -->
                <div class="input-group mb-4">
                        <input type="password" id="pin" name="pin" class="form-control py-3 rounded-start-3 borders border-end-0" placeholder="Enter 4-digit PIN" maxlength="4" required>
                        <span class="input-group-text bg-white borders border-start-0">
                            {{-- <i class="bi bi-eye-slash" style="color: darkblue; font-size: 1.5rem;" id="togglePin" style="cursor: pointer;"></i> --}}
                        </span>
                    </div>
                    <small class="text-danger d-none" id="pinError">PIN must be 4 digits</small>

                    <!-- Confirm PIN -->
                    <div class="input-group mb-4">
                        <input type="password" id="confirmPin" name="pin_confirmation" class="form-control py-3 rounded-start-3 borders border-end-0" placeholder="Confirm PIN" maxlength="4" required>
                        <span class="input-group-text bg-white borders border-start-0">
                            {{-- <i class="bi bi-eye-slash" style="color: darkblue; font-size: 1.5rem;" id="toggleConfirmPin" style="cursor: pointer;"></i> --}}
                        </span>
                    </div>
                    <small class="text-danger d-none" id="confirmPinError">PINs do not match</small>

                <!-- Submit Button -->
                <button type="submit" name="setPin" class="btn btn-pin w-100 mt-4">Create PIN</button>
            </form>
        </div>
    </div>
</x-layout>