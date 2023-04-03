// Wybierz wszystkie elementy z klasą 'menu-item-has-children'
const menuItemsWithChildren = document.querySelectorAll('.menu-item-has-children');
const sub = document.querySelector('.sub-menu')

// Iteruj przez każdy znaleziony element
menuItemsWithChildren.forEach((menuItem) => {
  // Stwórz nowy przycisk
  const subMenuButton = document.createElement('button');
  

  // Dodaj klasę 'sub-menu-button' do przycisku
  subMenuButton.classList.add('sub-menu-button');

  // Ustaw tekst przycisku
  subMenuButton.textContent = '↓';

  // Dodaj przycisk do elementu z klasą 'menu-item-has-children'
  menuItem.insertBefore(subMenuButton, sub);
});


// pobierz elementy z DOM
const subMenuButton = document.querySelector('.sub-menu-button');
const subMenu = document.querySelector('ul.sub-menu');




const iconSVG = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M169.4 470.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 370.8 224 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 306.7L54.6 265.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"/></svg>`;


document.addEventListener('DOMContentLoaded', function () {
  const iconContainer = document.querySelector('.sub-menu-button');
  
  iconContainer.innerHTML = iconSVG;
});


const button = document.querySelector('.sub-menu-button')
// utwórz funkcję, która będzie dodawać klasę toggle do ul.sub-menu po kliknięciu na przycisk sub-menu-button
const toggleSubMenu = () => {
  subMenu.classList.toggle('toggle');
  
  button.style.transform = 'rotate(180deg)';
  
};

// dodaj nasłuchiwanie na kliknięcie przycisku sub-menu-button i wywołaj funkcję toggleSubMenu
subMenuButton.addEventListener('click', toggleSubMenu);

document.addEventListener('DOMContentLoaded', function () {
  
  let rotation = 0;

  subMenuButton.addEventListener('click', function () {
    rotation += 180;
    button.style.transform = `rotate(${rotation}deg)`;
  });
});
