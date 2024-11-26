// navbar
const toggleSidebar = document.getElementById('toggleSidebar');
const sidebar = document.getElementById('sidebar');
const closeSidebar = document.getElementById('closeSidebar');

toggleSidebar.addEventListener('click', () => {
    sidebar.classList.remove('hidden');
    toggleSidebar.classList.add('hidden');
    closeSidebar.classList.remove('hidden');
});

closeSidebar.addEventListener('click', () => {
    sidebar.classList.add('hidden');
    toggleSidebar.classList.remove('hidden');
    closeSidebar.classList.add('hidden');
});