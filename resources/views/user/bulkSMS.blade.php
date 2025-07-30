<x-app-layout>
<div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <h3 class="text-dark m-4 fw-bold">Bulk SMS</h3>
                <?php if (isset($message)) { echo $message; } ?>
                <form action="bulkSMS.php" method="post" class="container" style="max-width: 500px;">
                    <input type="hidden" name="serviceID" value="<?= isset($service['id']) ? htmlspecialchars($service['id']) : ''; ?>" id="serviceID">
                    <input type="hidden" name="packageID" value="<?= isset($package['id']) ? htmlspecialchars($package['id']) : ''; ?>" id="packageID">
                    <div class="mb-3">
                        <input type="text" name="sender" id="sender" class="form-control border-dark py-3 rounded-5" placeholder="Enter sender" required>
                    </div>
                    <div class="mb-3">
                        <textarea name="smsMessage" id="smsMessage" class="form-control border-dark rounded-5" rows="4" placeholder="Enter your message here..." required></textarea>
                    </div>
                    <div class="mb-3">
                        <textarea name="bulkSMS" id="bulkSMS" class="form-control border-dark rounded-5" rows="4" placeholder="Enter phone numbers, separated by commas (e.g., 1234567890, 0987654321)" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="pin" id="pin" class="form-control border-dark py-3 rounded-5" placeholder="Enter PIN" maxlength="4" required>
                    </div>
                    <input type="hidden" name="quantity" id="quantity" class="form-control" readonly>
                    <input type="hidden" name="amount" id="amount" class="form-control" readonly>
                    <input type="hidden" name="total" id="total" class="form-control" readonly>
                    <button type="submit" name="sendSMS" class="btn btn-send col-sm-3 rounded-5">Send - Pay:N<span id="total-cost"></span></button>
                </form>
            </div>
        </div>

        <!-- Order History Section -->
        <div class="row justify-content-center my-5">
            <div class="col-lg-10">
                <h3 class="text-color fw-bold">Order History</h3>
                <?php if (empty($orderHistory)): ?>
                    <div class="alert alert-info">No orders found.</div>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <!-- <th>Reference</th> -->
                                <th>Sender</th>
                                <th>Message</th>
                                <th>Beneficiary</th>
                                <th>Service</th>
                                <th>Package</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serialNumber = 1; // Initialize serial number
                            foreach ($orderHistory as $order): ?>
                                <tr>
                                    <td><?= $serialNumber++; ?></td>
                                    <!-- <td><?= htmlspecialchars($order['reference']) ?></td> -->
                                    <td><?= htmlspecialchars($order['sender']) ?></td>
                                    <td><?= htmlspecialchars($order['message']) ?></td>
                                    <td><?= htmlspecialchars($order['beneficiary']) ?></td>
                                    <td><?= htmlspecialchars($order['serviceName']) ?></td>
                                    <td><?= htmlspecialchars($order['packageName']) ?></td>
                                    <td><?= htmlspecialchars($order['status']) ?></td>
                                    <td><?= htmlspecialchars($order['created_at']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</x-app-layout>
