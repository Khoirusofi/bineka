import './bootstrap';

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist'
import humanize from 'humanize-duration';

/**
 * Function to format the time in human readable format
 * @param {*} seconds
 * @returns {string} formatted time
 */
window.humanizeTime = (seconds) => {
    return humanize(seconds * 1000, {
        largest: 3,
        round: true,
        language: 'id',
        units: ['h', 'm', 's'],
    });
};

window.Alpine = Alpine;
Alpine.plugin(persist);
Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    const navRef = document.getElementById('navbar');
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const navLinks = document.querySelectorAll('.x-nav-link');
    let state = false;

    menuButton.addEventListener('click', function () {
        state = !state;
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');

        const body = document.body;
        const customBodyStyle = ["overflow-hidden", "lg:overflow-visible"];
        if (state) body.classList.add(...customBodyStyle);
        else body.classList.remove(...customBodyStyle);
    });

    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            state = false;
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            document.body.classList.remove("overflow-hidden", "lg:overflow-visible");
        });
    });

    window.onscroll = () => {
        const customStyle = ["sticky-nav", "fixed", "border-b"];
        if (window.scrollY > 80) navRef.classList.add(...customStyle);
        else navRef.classList.remove(...customStyle);
    };
});


/*=============== SHOW SCROLL UP ===============*/
function scrollUp() {
    const scrollUp = document.getElementById("scroll-up");
    if (window.scrollY >= 400) {
        scrollUp.classList.remove("opacity-0", "pointer-events-none");
        scrollUp.classList.add("opacity-80");
    } else {
        scrollUp.classList.add("opacity-0", "pointer-events-none");
        scrollUp.classList.remove("opacity-80");
    }
}

window.addEventListener("scroll", scrollUp);

/*=============== ANIMATION SCROLL ===============*/
document.getElementById("scroll-up").addEventListener("click", function(event) {
    event.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

document.addEventListener('DOMContentLoaded', function() {
    function updateDateTime() {
        console.log('Updating date and time...'); // Log untuk memastikan fungsi berjalan
        const options = {
            timeZone: 'Asia/Jakarta',
            hour: '2-digit',
            minute: '2-digit',
            weekday: 'long',
            day: '2-digit',
            month: 'long',
            year: 'numeric',
            hour12: false
        };
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', options).replace(/:/g, ' : ');

        document.getElementById('datetime').textContent = timeString;
    }

    // Update the date and time initially
    updateDateTime();

    // Update the date and time every second
    setInterval(updateDateTime, 1000);
});






