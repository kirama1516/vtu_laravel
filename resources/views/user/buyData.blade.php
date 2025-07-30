<x-app-layout>
    <!-- If you do not ha <div class="container-lg">
        <?php 
        if(isset($message)){
            echo $message;
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="text-dark m-4 fw-bold">Buy Data</h3>
                <form action="buyData.php" method="post" onsubmit="return validateForm()">
                    <div class="mb-3">
                        <select name="billerID" id="billerID" class="form-select border-dark py-3 rounded-5" required>
                            <option value="">Select Network</option>
                            <?php foreach ($billers as $biller): ?>
                                <option value="<?= $biller['id']; ?>"><?= htmlspecialchars($biller['title']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                
                    <div class="mb-3">
                        <!-- <label class="form-label">S -->
                        <input type="hidden" name="serviceID" value="<?= isset($service['id']) ? htmlspecialchars($service['id']) : ''; ?>" id="serviceID">
                    </div>

                    <div class="mb-3">
                        <select name="categoryID" id="categoryID" class="form-select border-dark py-3 rounded-5" required>
                            <option value="">Select Type</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= htmlspecialchars($category['id']); ?>">
                                    <?= htmlspecialchars($category['title']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="packageID" id="packageID" class="form-select border-dark py-3 rounded-5" required>
                            <option value="">Select Plan</option>
                            <!-- Packages will be loaded dynamically here -->
                        </select>
                    </div>

                     <!-- enter amount -->
                     <div class="mb-3">
                        <input type="number" name="amount" id="amount" class="form-control border-dark py-3 rounded-5" readonly>
                    </div>

                    <!-- enter phone number -->
                    <div class="mb-3">
                        <input type="tel" name="phone" id="phone" class="form-control border-dark py-3 rounded-5" placeholder="Enter Phone Number">
                        <div id="phoneError" class="error-message">Please enter a valid 10–11 digit phone number.</div>
                    </div>

                    <!-- enter pin -->
                    <div class="mb-3">
                        <input type="password" name="pin" id="pin" class="form-control border-dark py-3 rounded-5" placeholder="Enter Pin">
                    </div>
                    <!-- Display total cost -->
                    <div class="mb-3">
                        <input type="hidden" name="total" id="total">
                        <input type="hidden" name="quantity" id="quantity">
                    </div>
                    <button name="buyData" class="btn btn-buy col-sm-3">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
