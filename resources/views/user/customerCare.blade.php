<x-app-layout>
    <div class="container my-5">
        <div class="row">
            <!-- Contact Information -->
            <div class="col-md-6">
                <h4 class="text-color">Contact Us</h4>
                <p><strong>📞 Phone:</strong> <span class="text-color"> +234 701 516 8580 </span></p>
                <p><strong>📧 Email:</strong> <span class="text-color"> Support@m5data.com.ng </span></p>
                <p><strong>💬 Live Chat:</strong> <span class="text-color"> Available 24/7 </span></p>
                <p class="text-muted">Reach out for M5 airtime, data, or subscription issues.</p>
            </div>

            <!-- Contact Form -->
            <div class="col-md-6">
                <h4 class="text-color">Send Us a Message</h4>
                <form id="contactForm">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" placeholder="Describe your issue" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-color w-100">Submit</button>
                </form>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h4 class="text-color">Frequently Asked Questions (FAQs)</h4>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How long does VTU top-up take?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                VTU airtime and data top-up are instant, but in rare cases, it may take up to 5 minutes.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                What should I do if my VTU transaction fails?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                If your transaction fails, check your balance. If debited, please contact our support team with the transaction details.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Can I get a refund if my VTU purchase fails?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                Yes, if your VTU purchase fails and you were debited, a refund will be processed within 24 hours.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
