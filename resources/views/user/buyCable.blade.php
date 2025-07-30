<x-app-layout>
 <div class="container-lg">
        <?php 
        if(isset($message)){
            echo $message;
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="text-dark m-4 fw-bold">Cable Subscription</h3>
                <form action="cable.php" method="post" onsubmit="return validateForm()">
                    <input type="hidden" name="serviceID" value="<?= isset($service['id']) ? htmlspecialchars($service['id']) : ''; ?>" id="serviceID">
                    
                    <!-- Select Cable Network -->
                    <div class="mb-3">
                        <select name="billerID" id="billerID" class="form-select border-dark py-3 rounded-5" required>
                            <option value="">Select Network</option>
                            <?php foreach ($billers as $biller): ?>
                                <option value="<?= $biller['id']; ?>"><?= htmlspecialchars($biller['title']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Select Package -->
                    <div class="mb-3">
                        <select name="packageID" id="packageID" class="form-select border-dark py-3 rounded-5" required>
                            <option value="">Select a package</option>
                            <?php foreach ($packages as $package): ?>
                                <option value="<?= htmlspecialchars($package['id']); ?>" data-price="<?= htmlspecialchars($package['price']); ?>">
                                    <?= htmlspecialchars($package['title']); ?> - N<?= htmlspecialchars($package['price']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Enter Smartcard Number -->
                    <div class="mb-3">
                        <input type="text" name="uicNumber" id="uicNumber" class="form-control border-dark py-3 rounded-5" placeholder="Enter Smartcard Number" required oninput="validateSmartcardNumber()">
                        <span id="smartcardError" class="error-message">Invalid smartcard number (10–16 digits required).</span>
                    </div>

                    <!-- Enter PIN -->
                    <div class="mb-3">
                        <input type="password" name="pin" id="pin" class="form-control border-dark py-3 rounded-5" placeholder="Enter PIN" required>
                    </div>

                    <!-- Hidden fields for amount, quantity, and total -->
                    <input type="hidden" name="amount" id="amount">
                    <input type="hidden" name="quantity" id="quantity" value="1">
                    <input type="hidden" name="total" id="total">

                    <!-- Display total cost -->
                    <!-- <div class="mb-3">
                        <label class="form-label">Total Cost:</label>
                        <span id="total-cost">0.00</span>
                    </div> -->

                    <button type="submit" name="cable" class="btn btn-buy col-sm-3">Validate Card Number</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
