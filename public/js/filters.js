const toggleFilterBtn = document.getElementById('toggleFilterBtn');
const filterForm = document.getElementById('filterForm');
const closeFilterBtn = document.getElementById('closeFilterBtn');

toggleFilterBtn.addEventListener('click', () => {
    filterForm.classList.toggle('hidden');
});

closeFilterBtn.addEventListener('click', () => {
    filterForm.classList.add('hidden');
});