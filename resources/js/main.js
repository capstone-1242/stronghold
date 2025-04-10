$(':hidden').each(function() {
    var backgroundImage = $(this).css("background-image");
    if (backgroundImage != 'none') {
      tempImage = new Image();
      tempImage.src = backgroundImage;
    }
  });
  
let btn = document.querySelector('.tog-btn');
let menu = document.querySelector('.main-menu');

btn.addEventListener('click', function () {
    menu.classList.toggle('show-nav');

    let expanded = this.getAttribute('aria-expanded') === 'true';
    this.setAttribute('aria-expanded', !expanded);
});


const toggleButton = document.querySelector('.tog-btn');
const header = document.querySelector('header');

toggleButton.addEventListener('click', function () {
    header.classList.toggle('bg-nav');
});

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {

        const label = checkbox.closest('label');

        if (checkbox.checked) {
            label.classList.add('checked');
        }
    });
});

