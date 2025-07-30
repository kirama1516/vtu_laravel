<x-app-layout>
      <div class="container-lg">
        <?php 
        if(isset($message)){
            echo $message;
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h2 class="text-dark m-4 fw-bold">Exam</h2>
                <form action="exam.php" method="post" onsubmit="return validateForm()">
                    <!-- Exam Type -->
                    <div class="mb-3">
                        <select name="billerID" class="form-select border-dark py-3 rounded-5" required>
                            <option value="">Exam Type</option>
                            <?php foreach ($billers as $biller): ?>
                                <option value="<?= $biller['id']; ?>"><?= htmlspecialchars($biller['title']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <input type="number" name="quantity" id="quantity" class="form-control border-dark py-3 rounded-5" placeholder="Enter Quantity" required>
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <input type="number" name="amount" id="amount" class="form-control border-dark py-3 rounded-5" placeholder="Enter Amount" required>
                    </div>

                    <!-- Hidden fields -->
                    <input type="hidden" name="serviceID" value="<?= isset($service['id']) ? htmlspecialchars($service['id']) : ''; ?>">
                    <input type="hidden" name="price" id="price">
                    <input type="hidden" name="total" id="total">

                    <!-- Enter PIN -->
                    <div class="mb-3">
                        <input type="password" name="pin" id="pin" class="form-control border-dark py-3 rounded-5" placeholder="Enter PIN" required>
                    </div>

                    <!-- Display total cost -->
                    <div class="mb-3">
                        <label class="form-label">Total Cost:</label>
                        <span id="total-cost">0.00</span>
                    </div>

                    <button type="submit" name="buyAirtime" class="btn btn-buy col-sm-3">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
