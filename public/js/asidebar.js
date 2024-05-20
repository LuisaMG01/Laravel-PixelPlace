document.addEventListener('DOMContentLoaded', function () {
    const toggleButton = document.querySelector('[data-drawer-toggle="default-sidebar"]');
    const sidebar = document.getElementById('default-sidebar');

    toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('-translate-x-full');
    });
});
