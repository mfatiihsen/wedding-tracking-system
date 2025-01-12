<script>
    // sidebarın açılıp kapanması
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        const main = document.querySelector('.main-content');
        const navbar = document.querySelector('.navbar');
        sidebar.classList.toggle('hidden');
        main.classList.toggle('hidden');
        navbar.classList.toggle('hidden');
    }

    // SİDEBARDAKİ AÇILIR MENÜLERİN AÇILMASI
    function toggleDropdown(event) {
        const parent = event.target.closest('.has-dropdown');
        const dropdown = parent.querySelector('.dropdown');
        const arrow = parent.querySelector('.arrow');

        // Toggle the visibility of the dropdown menu
        dropdown.classList.toggle('open');
        // Toggle the rotation of the arrow
        arrow.classList.toggle('rotate');
    }







    document.querySelectorAll('.day').forEach(function(day) {
        day.addEventListener('click', function() {
            const dayNumber = day.getAttribute('data-day');
            // event-detail.php sayfasına yönlendiriyoruz
            window.location.href = 'events-detail.php?day=' + dayNumber;
        });
    });

    // tarih yazdırmak - gelir gidere
    document.getElementById('date').value = new Date().toISOString().split('T')[0];
    document.getElementById('start_date').value = new Date().toISOString().split('T')[0];
</script>