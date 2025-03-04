document.addEventListener('DOMContentLoaded', function() {
    const userMenu = document.querySelector('.user-menu');

    userMenu.addEventListener('click', function() {
        this.classList.toggle('active');
    });

    document.addEventListener('click', function(event) {
        if (!userMenu.contains(event.target)) {
            userMenu.classList.remove('active');
        }
    });
});