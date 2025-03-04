let btn = document.querySelector('.tog-btn');
let menu = document.querySelector('.main-menu');

btn.addEventListener('click', function() {
    menu.classList.toggle('show-nav');
    
    let expanded = this.getAttribute('aria-expanded') === 'true';
    this.setAttribute('aria-expanded', !expanded);
});

