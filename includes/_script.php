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




    // Etkinlik verisi
    const events = {
        1: [{
                title: "Düğün Töreni",
                date: "25 Ocak 2024",
                description: "En özel gününüzü paylaşacağımız büyük an."
            },
            {
                title: "Takı Töreni",
                date: "27 Ocak 2024",
                description: "Geleneksel takı töreni."
            }
        ],
        2: [{
            title: "Balayı Çıkışı Kutlaması",
            date: "15 Şubat 2024",
            description: "Balayı sonrası kutlama."
        }],
        3: [{
            title: "Gelin Evi Ziyareti",
            date: "10 Mart 2024",
            description: "Gelin evine yapılan geleneksel ziyaret."
        }],
        4: [{
            title: "Düğün Eğlencesi",
            date: "5 Nisan 2024",
            description: "Geleneksel düğün eğlencesi."
        }],
        // Diğer aylar için verileri burada ekleyebilirsiniz.
    };

    // Ay seçimi
    const months = document.querySelectorAll('.month');
    const eventList = document.getElementById('event-list');

    // Ay tıklandığında etkinlikleri göster
    months.forEach(month => {
        month.addEventListener('click', () => {
            const monthNumber = month.getAttribute('data-month');
            const monthEvents = events[monthNumber];

            eventList.innerHTML = ''; // Önceki etkinlikleri temizle

            if (monthEvents) {
                monthEvents.forEach(event => {
                    const eventItem = document.createElement('div');
                    eventItem.classList.add('event-item');
                    eventItem.innerHTML = `
                    <h3>${event.title}</h3>
                    <p><strong>Tarih:</strong> ${event.date}</p>
                    <p>${event.description}</p>
                `;
                    eventList.appendChild(eventItem);
                });
            } else {
                eventList.innerHTML = '<p>Bu ayda etkinlik bulunmamaktadır.</p>';
            }
        });
    });


    
</script>