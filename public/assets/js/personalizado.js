// Manipulação da DOM
const btn_nav = document.querySelector('#menu-mobile-icone');
const menu = document.querySelector('.menu-mobile');
const logo = document.querySelector('.logo-text');
const link = document.querySelectorAll('.link-menu');
const sidebar = document.querySelector('.sidebar');
const navbar = document.querySelector('nav');
const teste = document.querySelectorAll('hidden');

const main_container = document.querySelector('.main-container');


btn_nav.addEventListener('click', () => {
  menu.style.width = "60px";
  menu.style.transition = "ease-in-out .4s";
  main_container.style.width = '100%';
  main_container.style.marginLeft = '0px';

  navbar.style.width = '100%';
  navbar.style.marginLeft = '0px';
  navbar.style.zIndex = '0';


  logo.style.display = "none";
  //Menu opções
    for(i = 0; i < link.length; i++) {
      link[i].style.overflow = 'hidden';
      teste[i].textContent = '';
    }
})
