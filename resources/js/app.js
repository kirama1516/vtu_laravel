document.addEventListener("DOMContentLoaded", () => {
    // ✅ Toggle Balance
    const balanceText = document.getElementById("balance");
    const toggleButton = document.getElementById("toggleBalance");
    const toggleIcon = document.getElementById("toggleIcon");

    if (balanceText && toggleButton && toggleIcon) {
        let isShow = true;
        const actualBalance = "******";
        const formattedBalance = balanceText.textContent.replace("₦", "").trim();

        toggleButton.addEventListener("click", function () {
            if (isShow) {
                balanceText.textContent = actualBalance;
                toggleIcon.src = "/images/showIcon.png";
            } else {
                balanceText.textContent = "₦" + formattedBalance;
                toggleIcon.src = "/images/hideIcon.png";
            }
            isShow = !isShow;
        });
    }

    // ✅ Category Toggle Switch (No jQuery)
    document.querySelectorAll(".toggle-switch").forEach(toggle => {
        toggle.addEventListener("change", function () {
            let categoryID = this.dataset.id;
            let column = this.dataset.column;
            let status = this.checked ? 1 : 0;

            fetch("{{ route('category.updateStatus') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    id: categoryID,
                    column: column,
                    status: status
                })
            })
            .then(res => res.json())
            .then(data => console.log(data.message))
            .catch(err => console.error("Error:", err));
        });
    });

    // ✅ Airtime Total Calculator
    function calculateTotalCost() {
        const amountInput = document.getElementById("amount");
        const totalInput = document.getElementById("total");
        const quantityInput = document.getElementById("quantity");
        const btnTotal = document.getElementById("btnTotal");

        if (!amountInput || !totalInput || !quantityInput || !btnTotal) return;

        const amount = parseFloat(amountInput.value) || 0;
        const discount = 2; // 2% discount
        const totalCost = amount * (1 - discount / 100);

        totalInput.value = totalCost.toFixed(2);
        quantityInput.value = 1; // Airtime always 1
        btnTotal.textContent = totalCost.toFixed(2); // Update button text
    }

    // ✅ Validate phone number
    function validatePhoneNumber() {
        const phoneInput = document.getElementById("phone");
        const phoneError = document.getElementById("phoneError");
        if (!phoneInput || !phoneError) return true;

        const phoneNumber = phoneInput.value.trim();
        const phoneRegex = /^[0-9]{10,11}$/; // Only 10–11 digits

        if (!phoneRegex.test(phoneNumber)) {
            phoneError.style.display = "block";
            phoneInput.classList.add("is-invalid");
            phoneInput.classList.remove("is-valid");
            return false;
        } else {
            phoneError.style.display = "none";
            phoneInput.classList.remove("is-invalid");
            phoneInput.classList.add("is-valid");
            return true;
        }
    }

    // ✅ Form Validation
    function validateForm() {
        return validatePhoneNumber();
    }

    // ✅ Attach listeners
    const amountInput = document.getElementById("amount");
    const phoneInput = document.getElementById("phone");
    const form = document.getElementById("airtimeForm"); // make sure form has id="airtimeForm"

    if (amountInput) {
        amountInput.addEventListener("input", calculateTotalCost);
    }

    if (phoneInput) {
        phoneInput.addEventListener("input", validatePhoneNumber);
    }

    if (form) {
        form.addEventListener("submit", function (e) {
            if (!validateForm()) {
                e.preventDefault();
            }
        });
    }
});

$(document).ready(function() {
    // Load Categories when Biller changes
    $("#biller_id").change(function() {
        let biller_id = $(this).val();
        $("#category_id").html('<option value="">Select type</option>');
        $("#package_id").html('<option value="">Select Package</option>');
        $("#amount").val('');

        if (biller_id) {
            $.get("{{ route('categories.load') }}", { biller_id }, function(response) {
                let options = '<option value="">Select type</option>';
                response.forEach(cat => {
                    options += `<option value="${cat.id}">${cat.title}</option>`;
                });
                $("#category_id").html(options);
                console.log('yawwa');
            });
        }
    });

    // Load Packages when Category changes
    $("#category_id").change(function() {
        let category_id = $(this).val();
        $("#package_id").html('<option value="">Select type</option>');
        $("#amount").val('');

        if (category_id) {
            $.get("{{ route('packages.load') }}", { category_id }, function(response) {
                let options = '<option value="">Select Package</option>';
                response.forEach(pkg => {
                    options += `<option value="${pkg.id}" data-price="${pkg.price}">${pkg.name}</option>`;
                });
                $("#package_id").html(options);
            });
        }
    });

    // Load Amount when Package changes
    $("#package_id").change(function() {
        let package_id = $(this).val();
        $("#amount").val('');
        $("#total").val(0);

        if (package_id) {
            $.get("{{ route('package.amount') }}", { package_id }, function(response) {
                $("#amount").val(response.amount);
                calculateTotalCost();
            });
        }
    });

    // Calculate total
    function calculateTotalCost() {
        const amount = parseFloat($("#amount").val()) || 0;
        $("#total").val(amount.toFixed(2));
    }
});

 