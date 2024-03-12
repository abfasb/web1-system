const links = document.querySelectorAll('.nav-link');

    links.forEach(link => {
        link.addEventListener('click', function() {
            links.forEach(l => l.classList.remove('blue-link'));
            this.classList.add('blue-link');
        });
    });

    const delay = (ms) => new Promise(resolve => setTimeout(resolve, ms));

    async function attachEventListenersWithDelay() {
    await delay(1000);

    const startedSign = document.getElementById("get-started-btn");
    const loginSign = document.getElementById("sign-up-btn");

    startedSign.addEventListener('click', () => {
        window.location.href = "../pages/registration.php";
    });

    loginSign.addEventListener('click', () => {
        window.location.href = "../pages/login.php";
    });
}

    attachEventListenersWithDelay();
