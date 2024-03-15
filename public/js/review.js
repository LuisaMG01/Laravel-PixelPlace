document.addEventListener('DOMContentLoaded', function() {
    const stars = document.querySelectorAll('.star');

    stars.forEach(function(star, index) {
        star.addEventListener('click', function() {
            const value = this.getAttribute('data-value');
            document.querySelector('input[name="rating"]').value = value;
            document.getElementById('rating-label').textContent = value;
            stars.forEach(function(s, i) {
                s.classList.toggle('active', i <= index);
            });
        });

        star.addEventListener('mouseover', function() {
            const value = this.getAttribute('data-value');
            document.getElementById('rating-label').textContent = value;
            stars.forEach(function(s, i) {
                s.classList.toggle('active', i <= index);
            });
        });

        star.addEventListener('mouseleave', function() {
            const rating = document.querySelector('input[name="rating"]').value;
            document.getElementById('rating-label').textContent = rating;
            stars.forEach(function(s, i) {
                s.classList.toggle('active', i < rating);
            });
        });
    });
});