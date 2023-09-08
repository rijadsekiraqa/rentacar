// Get all input fields with name="todate" and convert the NodeList to an array
const allInputFields = Array.from(document.querySelectorAll('input[name="todate"]'));

// Get the last input field (todate)
const lastInputField = allInputFields[allInputFields.length - 1];

// Extract the vehicle ID from the URL
const urlParams = new URLSearchParams(window.location.search);
const vehicleId = urlParams.get('id');

// Function to disable date picker for the "fromdate" input field
function disableDatePicker() {
    const fromDateInput = document.querySelector('input[name="fromdate"]');
    fromDateInput.setAttribute('readonly', true);
    fromDateInput.setAttribute('onkeydown', 'return false');
    fromDateInput.setAttribute('onfocus', 'this.blur()');
}

// Add an event listener to the "fromdate" input field
const fromDateInput = document.querySelector('input[name="fromdate"]');
fromDateInput.addEventListener("click", function () {
    // Get the current date and format it (yyyy-mm-dd)
    const currentDate = new Date().toISOString().split('T')[0];

    // Set the "fromdate" input field to the current date
    this.value = currentDate;

    // Set the value of the hidden input field to the current date
    document.querySelector('input[name="currentdate"]').value = currentDate;

    // Disable the date picker for "fromdate" input field
    disableDatePicker();
});

// Add an event listener to the last input field
lastInputField.addEventListener("input", function () {
    // Check if the last input field is filled
    if (lastInputField.value !== "") {
        // Get the fromdate and todate values
        const fromDate = document.querySelector('input[name="fromdate"]').value;
        const toDate = lastInputField.value;

        // Validate the dates
        if (validateDates(fromDate, toDate)) {
            // Make an AJAX request to fetch the price
            const request = new XMLHttpRequest();
            const url = `/get-price?id=${vehicleId}&fromdate=${fromDate}&todate=${toDate}`;
            request.open("GET", url, true);

            request.onload = function () {
                if (request.status >= 200 && request.status < 400) {
                    const pricePerDay = parseFloat(request.responseText);
                    const numberOfDays = calculateNumberOfDays(fromDate, toDate);
                    const totalPrice = pricePerDay * numberOfDays;

                    // Display the total price within the dynamicInputContainer div
                    const priceField = createPriceField(totalPrice);
                    const dynamicInputContainer = document.querySelector(".dynamicInputContainer");
                    dynamicInputContainer.innerHTML = ""; // Clear any previous content
                    dynamicInputContainer.appendChild(priceField);

                    // Remove any previous error message if it exists
                    const errorMessage = document.querySelector('.error-message');
                    if (errorMessage) {
                        errorMessage.remove();
                    }
                }
            };

            request.send();
        } else {
            // Handle invalid date range (e.g., display an error message)
            const errorMessage = document.createElement("p");
            errorMessage.textContent = "Sorry, toDate must be greater than fromDate.";
            errorMessage.classList.add("error-message");
            const dynamicInputContainer = document.querySelector('.dynamicInputContainer');
            dynamicInputContainer.innerHTML = ""; // Clear any previous content
            dynamicInputContainer.appendChild(errorMessage);
        }
    } else {
        // If the last input field is empty, remove the price field and any previous error message
        const dynamicInputContainer = document.querySelector('.dynamicInputContainer');
        dynamicInputContainer.innerHTML = ""; // Clear any previous content
        const errorMessage = document.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }
});

// Function to validate the date range
function validateDates(fromDate, toDate) {
    const fromDateObj = new Date(fromDate);
    const toDateObj = new Date(toDate);

    // Check if todate is greater than fromDate
    return toDateObj > fromDateObj;
}

// Function to calculate the number of days between two dates
function calculateNumberOfDays(fromDate, toDate) {
    const oneDay = 24 * 60 * 60 * 1000; // Number of milliseconds in a day
    const fromDateObj = new Date(fromDate);
    const toDateObj = new Date(toDate);
    const diffDays = Math.round(Math.abs((fromDateObj - toDateObj) / oneDay));
    return diffDays;
}

// Function to create and format the price field
function createPriceField(totalPrice) {
    const priceField = document.createElement("input");
    priceField.type = "text";
    priceField.className = "form-control";
    priceField.name = "price";
    priceField.value = totalPrice + " euro";
    priceField.readOnly = true;
    return priceField;
}

// Add an event listener to the form submission
const bookingForm = document.getElementById('bookingForm'); // Replace 'bookingForm' with the actual ID of your form
bookingForm.addEventListener('submit', function(event) {
    // Get the fromdate and todate values
    const fromDate = document.querySelector('input[name="fromdate"]').value;
    const toDate = lastInputField.value;

    // Validate the dates
    if (!validateDates(fromDate, toDate)) {
        // If toDate is smaller than fromDate, prevent form submission
        event.preventDefault();

        // Handle the error and display a message
        const errorMessage = document.createElement("p");
        errorMessage.textContent = "Sorry, toDate must be greater than fromDate.";
        errorMessage.classList.add("error-message");
        const dynamicInputContainer = document.querySelector('.dynamicInputContainer');
        dynamicInputContainer.innerHTML = ""; // Clear any previous content
        dynamicInputContainer.appendChild(errorMessage);
    }
});