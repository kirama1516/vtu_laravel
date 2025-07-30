  // document.getElementById("price").value = ;
$(document).ready(function() {
        // Listen for changes in the Category Dropdown
        $("#billerID").change(function() {
        var billerID = $(this).val(); // Get the selected biller ID
        });
    // Listen for changes in the Category Dropdown
    $("#categoryID").change(function() {
        var categoryID = $(this).val(); // Get the selected category ID
        var billerID = $("#billerID").val(); // Get the selected biller ID again

        // Clear the Package Dropdown
        $("#packageID").html('<option value="">Select a package</option>');

        if (billerID && categoryID) {
            // Fetch packages for the selected category
            $.ajax({
                url: 'load-package.php',
                type: 'GET',
                data: {billerID: billerID, categoryID: categoryID},
                success: function(response) {
                    $("#packageID").html(response); // Populate the Package Dropdown
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching packages: " + error);
                }
            });
        }
    });

    $("#packageID").change(function() {
        var packageID = $("#packageID").val(); // Get the selected package ID

        // Clear the amount input
        $("#amount").val(''); // Clear the amount input

        if (packageID) {
            // Fetch packages for the selected category
            $.ajax({
                url: 'load-amount.php',
                type: 'GET',
                data: {packageID: packageID},
                success: function(response) {
                    console.log(response);
                    
                    // Populate the amount input
                    $("#amount").val(response); // Set the amount input value
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching packages: " + error);
                }
            });
        }
    });

    // Calculate total cost when PIN input is focused
    $("#pin").on("focus", function() {
        calculateTotalCost();
    });

    // Calculate total cost when package or amount changes
$("#packageID, #amount").change(function() {     
        calculateTotalCost();
    });
    
});
    // Function to calculate total cost
    function calculateTotalCost() {
        const amount = parseFloat($("#amount").val()) || 0;
        const packagePrice = parseFloat($("#packageID option:selected").data("price")) || 0;
        const totalCost = amount + packagePrice;
        
        $("#quantity").val(1); // Quantity is always 1 for data
        $("#total").val(totalCost.toFixed(2));
        // console.log(totalCost);
    } 

function validatePhoneNumber() {
    let phoneInput = document.getElementById("phone");
    let phoneError = document.getElementById("phoneError");
    let phoneNumber = phoneInput.value.trim();
    
    // Regular expression for 10–11 digit phone numbers
    let phoneRegex = /^[0-9]{10,11}$/;

    if (!phoneRegex.test(phoneNumber)) {
        phoneError.style.display = "block";
        phoneInput.classList.add("is-invalid");
        return false;
    } else {
        phoneError.style.display = "none";
        phoneInput.classList.remove("is-invalid");
        phoneInput.classList.add("is-valid");
        return true;
    }
}

function validateForm() {
    return validatePhoneNumber(); // Prevent form submission if phone number is invalid
}

// bulkSMS 
$(document).ready(function() {
    const costPerSms = 4.0; // Cost per SMS

    // When the PIN input field is focused, calculate and display the total cost
    $('#pin').on('focus', function() {
        calculateSmsCost();
    });

    // Calculate and display the total cost
    function calculateSmsCost() {
        const phoneNumbers = $('#bulkSMS').val().split(',').filter(Boolean);
        const quantity = phoneNumbers.length;
        const totalCost = quantity * costPerSms;

        $('#quantity').val(quantity);
        $('#amount').val(totalCost);
        $('#total').val(totalCost);
        $('#total-cost').text(totalCost.toFixed(2));
    }
});

// cables
$(document).ready(function() {
    // Listen for changes in the Category Dropdown
    $("#billerID").change(function() {
        var billerID = $(this).val(); // Get the selected category ID

        // Clear the Package Dropdown
        $("#packageID").html('<option value="">Select a package</option>');

        if (billerID) {
            // Fetch packages for the selected category
            $.ajax({
                url: 'load-Cpackage.php',
                type: 'GET',
                data: { billerID: billerID },
                success: function(response) {
                    $("#packageID").html(response); // Populate the Package Dropdown
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching packages: " + error);
                }
            });
        }
    });

    // Calculate total cost when package changes
    $("#packageID").change(function() {
        calculateTotalCost();
    });

    // Calculate total cost when PIN input is focused
    $("#pin").on("focus", function() {
        calculateTotalCost();
    });
});


// Function to calculate total cost
function calculateTotalCost() {
    const packagePrice = parseFloat($("#packageID option:selected").data("price")) || 0;
    const quantity = 1; // Quantity is always 1 for cable subscription
    const totalCost = packagePrice * quantity;

    $("#amount").val(packagePrice);
    $("#quantity").val(quantity);
    $("#total").val(totalCost);
    $("#total-cost").text(totalCost.toFixed(2));
}

// Validate smartcard number
function validateSmartcardNumber() {
    const smartcardInput = document.getElementById("uicNumber");
    const smartcardError = document.getElementById("smartcardError");
    const smartcardNumber = smartcardInput.value.trim();
    
    // Regular expression for 10–16 digit smartcard numbers
    const smartcardRegex = /^\d{10,16}$/;

    if (!smartcardRegex.test(smartcardNumber)) {
        smartcardError.style.display = "block";
        smartcardInput.classList.add("is-invalid");
        return false;
    } else {
        smartcardError.style.display = "none";
        smartcardInput.classList.remove("is-invalid");
        smartcardInput.classList.add("is-valid");
        return true;
    }
}

// Validate form before submission
function validateForm() {
    return validateSmartcardNumber(); // Prevent form submission if smartcard number is invalid
}

// Data
// document.getElementById("price").value = ;
$(document).ready(function() {
    // Listen for changes in the Category Dropdown
    $("#billerID").change(function() {
        var billerID = $(this).val(); // Get the selected biller ID
    });
    // Listen for changes in the Category Dropdown
    $("#categoryID").change(function() {
        var categoryID = $(this).val(); // Get the selected category ID
        var billerID = $("#billerID").val(); // Get the selected biller ID again

        // Clear the Package Dropdown
        $("#packageID").html('<option value="">Select a package</option>');

        if (billerID && categoryID) {
            // Fetch packages for the selected category
            $.ajax({
            url: 'load-package.php',        
            type: 'GET',
            data: {billerID: billerID, categoryID: categoryID},
            success: function(response) {
                $("#packageID").html(response); // Populate the Package Dropdown
            },
            error: function(xhr, status, error) {
                console.error("Error fetching packages: " + error);
            }
        });
    }
});

$("#packageID").change(function() {
    var packageID = $("#packageID").val(); // Get the selected package ID

    // Clear the amount input
    $("#amount").val(''); // Clear the amount input

    if (packageID) {
        // Fetch packages for the selected category
        $.ajax({
            url: 'load-amount.php',
            type: 'GET',
            data: {packageID: packageID},
            success: function(response) {
                console.log(response);
            // Populate the amount input
                $("#amount").val(response); // Set the amount input value
            },
            error: function(xhr, status, error) {
                console.error("Error fetching packages: " + error);
            }
        });
    }
});

// Calculate total cost when PIN input is focused
$("#pin").on("focus", function() {
    calculateTotalCost();
});

// // Calculate total cost when package or amount changes
// $("#packageID, #amount").change(function() {     
//     calculateTotalCost();
// });

});
// Function to calculate total cost
function calculateTotalCost() {
    const amount = parseFloat($("#amount").val()) || 0;
    const packagePrice = parseFloat($("#packageID option:selected").data("price")) || 0;
    const totalCost = amount + packagePrice;

    $("#quantity").val(1); // Quantity is always 1 for data
    $("#total").val(totalCost.toFixed(2));
    // console.log(totalCost);
} 

function validatePhoneNumber() {
    let phoneInput = document.getElementById("phone");
    let phoneError = document.getElementById("phoneError");
    let phoneNumber = phoneInput.value.trim();

    // Regular expression for 10–11 digit phone numbers
    let phoneRegex = /^[0-9]{10,11}$/;

    if (!phoneRegex.test(phoneNumber)) {
        phoneError.style.display = "block";
        phoneInput.classList.add("is-invalid");
        return false;
    } else {
        phoneError.style.display = "none";
        phoneInput.classList.remove("is-invalid");
        phoneInput.classList.add("is-valid");
        return true;
    }
}

function validateForm() {
    return validatePhoneNumber(); // Prevent form submission if phone number is invalid
}

// Exam
 $(document).ready(function() {
    // Calculate total cost when quantity or amount changes
    $("#quantity, #amount").on("input", function() {
        calculateTotalCost();
    });

    // Calculate total cost when PIN input is focused
    $("#pin").on("focus", function() {
        calculateTotalCost();
    });
});

// Function to calculate total cost
function calculateTotalCost() {
    const quantity = parseFloat($("#quantity").val()) || 0;
    const amount = parseFloat($("#amount").val()) || 0;
    const totalCost = quantity * amount;

    $("#price").val(amount);
    $("#total").val(totalCost);
    $("#total-cost").text(totalCost.toFixed(2));
}

// Validate form before submission
function validateForm() {
    const quantity = parseFloat($("#quantity").val()) || 0;
    const amount = parseFloat($("#amount").val()) || 0;

    if (quantity <= 0 || isNaN(quantity)) {
        alert("Quantity must be a positive number.");
        return false;
    }

    if (amount <= 0 || isNaN(amount)) {
        alert("Amount must be a positive number.");
        return false;
    }

    return true; // Allow form submission
}