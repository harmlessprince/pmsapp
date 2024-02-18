const frequencySelectOption = document.getElementById('frequency');

// Add event listener for change event
frequencySelectOption.addEventListener('change', function () {
    // Get the selected value
    const selectedValue = frequencySelectOption.value;
    // Set the new URL to reload the page with the query parameter
    window.location.href = window.location.pathname + '?frequency=' + selectedValue;
});
