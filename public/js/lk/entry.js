$(function() {
    $('#datepicker').datepicker();
});

var burgerBtn = document.querySelector('.burger_btn');
var burgerBtn2 = document.querySelector('.burger_btn_close');
var burgerMenu = document.querySelector('.burger');

document.addEventListener('DOMContentLoaded', function() {
    burgerBtn.addEventListener('click', function() {
        // Переключение отображения блока
        burgerMenu.style.display = 'flex';
    });
    burgerBtn2.addEventListener('click', function() {
        // Переключение отображения блока
        burgerMenu.style.display = 'none';
    });
});

function handleResize() {
    if ((window.innerWidth > 768) && (burgerMenu.style.display == 'flex')) {
        burgerMenu.style.display = 'none';
    }
};

handleResize();
window.addEventListener('resize', handleResize);
