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

// utwórz funkcję, która będzie dodawać klasę toggle do ul.sub-menu po kliknięciu na przycisk sub-menu-button
const toggleSubMenu = () => {
  subMenu.classList.toggle('toggle');
};

// dodaj nasłuchiwanie na kliknięcie przycisku sub-menu-button i wywołaj funkcję toggleSubMenu
subMenuButton.addEventListener('click', toggleSubMenu);



