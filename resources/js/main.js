let btn = document.querySelector('.tog-btn');
let menu = document.querySelector('.main-menu');

btn.addEventListener('click', function () {
    menu.classList.toggle('show-nav');

    let expanded = this.getAttribute('aria-expanded') === 'true';
    this.setAttribute('aria-expanded', !expanded);
});

let filterDropdown = document.querySelector('.filter-dropdown-btn');

filterDropdown.addEventListener('click', function () {
    let tagDropdown = document.querySelector('.filter-dropdown-content');
    tagDropdown.classList.toggle('show');

    let expanded = this.getAttribute('aria-expanded') === 'true';
    this.setAttribute('aria-expanded', !expanded); 
});



