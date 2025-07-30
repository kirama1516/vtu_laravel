<x-app-layout>
     <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="text-dark m-4 fw-bold">Electricity</h3>
                <form action="electricity.php" method="post">
                    <!-- select provider -->
                    <div class="mb-3">
                        <select name="billerID" class="form-select border-dark py-3 rounded-5" required>
                            <option value="">Select Provider</option>
                            <?php foreach ($billers as $biller): ?>
                                <option value="<?= $biller['id']; ?>"><?= htmlspecialchars($biller['title']); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                   
                    <!-- meter type -->
                    <div class="mb-3">
                        <select name="meterType" id="meterType" class="form-select border-dark py-3 rounded-5">
                            <option value="prepaid">Meter Type</option>
                            <option value="prepaid">Prepaid</option>
                            <option value="postpaid">Postpaid</option>
                        </select>
                    </div>

                    <!-- meter number -->
                    <div class="mb-3">
                        <input type="text" name="meterNumber" id="meterNumber" class="form-control border-dark py-3 rounded-5" placeholder="Enter Meter Number">
                    </div>

                     <!-- enter amount -->
                     <div class="mb-3">
                        <input type="number" name="amount" id="amount" class="form-control border-dark py-3 rounded-5" placeholder="Enter Amount">
                    </div>
                    <button name="electricity" class="btn btn-buy col-sm-3">Validate Meter</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
