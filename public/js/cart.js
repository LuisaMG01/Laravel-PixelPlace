document.addEventListener("DOMContentLoaded", function () {
    // Check if there's a previously selected quantity and set it
    const selectedQuantities = JSON.parse(localStorage.getItem('selectedQuantities')) || {};
    const quantitySelectors = document.querySelectorAll('.quantity-selector');
    
    quantitySelectors.forEach(selector => {
        const productId = selector.getAttribute('id').split('_')[1];
        if (selectedQuantities[productId]) {
            selector.value = selectedQuantities[productId];
        }

        selector.addEventListener('change', function() {
            const selectedQuantity = parseInt(this.value);
            selectedQuantities[productId] = selectedQuantity;
            localStorage.setItem('selectedQuantities', JSON.stringify(selectedQuantities));
            // Submit the form when a quantity is selected
            this.closest('form').submit();
        });
    });
});