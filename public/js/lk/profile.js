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
    if ((window.innerWidth > 768) && (burgerMenu.style.display === 'flex')) {
        burgerMenu.style.display = 'none';
    }
}

handleResize();
window.addEventListener('resize', handleResize);


// устанавливаем триггер для модального окна (название можно изменить)
let modalTrigger = document.getElementsByClassName("trigger")[0];

// получаем ширину отображенного содержимого и толщину ползунка прокрутки
let windowInnerWidth = document.documentElement.clientWidth;
let scrollbarWidth = parseInt(window.innerWidth) - parseInt(windowInnerWidth);

// привязываем необходимые элементы
let bodyElementHTML = document.getElementsByTagName("body")[0];
let modalBackground = document.getElementsByClassName("modalBackground")[0];
let modalClose = document.getElementsByClassName("modalClose")[0];
let modalActive = document.getElementsByClassName("modalActive")[0];

// функция для корректировки положения body при появлении ползунка прокрутки
function bodyMargin() {
    bodyElementHTML.style.marginRight = "-" + scrollbarWidth + "px";
}

// при длинной странице - корректируем сразу
bodyMargin();

document.addEventListener('DOMContentLoaded', function() {

    // если размер экрана больше 1366 пикселей (т.е. на мониторе может появиться ползунок)
    if (windowInnerWidth >= 1366) {
        bodyMargin();
    }

    // позиционируем наше окно по середине, где 175 - половина ширины модального окна
    modalActive.style.left = "calc(50% - " + (175 - scrollbarWidth / 2) + "px)";

    // нажатие на крестик закрытия модального окна
    modalClose.addEventListener("click", function () {
        modalBackground.style.display = "none";
        if (windowInnerWidth >= 1366) {
            bodyMargin();
        }
    });

    // закрытие модального окна на зону вне окна, т.е. на фон
    modalBackground.addEventListener("click", function (event) {
        if (event.target === modalBackground) {
            modalBackground.style.display = "none";
            if (windowInnerWidth >= 1366) {
                bodyMargin();
            }
        }
    });
})
