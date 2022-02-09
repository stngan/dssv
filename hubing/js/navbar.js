// const nav = document.querySelector("nav");
// const sidebarClose = document.querySelector(".sidebarClose").addEventListener("click", closeSide);
// const sidebarOpen = document.querySelector(".sidebarOpen");

// sidebarOpen.addEventListener("click" , () => {
//     nav.classList.add("active");
// })

// ===============scroll header
var firstPosition = window.pageYOffset;
const nav = document.querySelector("nav");

window.onscroll = function() {
  var nowPosition = window.pageYOffset;
  if (firstPosition > nowPosition) {
    nav.style.top = "0";
  } else {
    nav.style.top = "-100px";
  }
  firstPosition = nowPosition;
}
// ================scroll header

const menu = document.querySelector('.menu');
const logo = document.querySelector('.logo');
const container = document.querySelector('.container');
const sidebarOpen = document.querySelector('.sidebarOpen').addEventListener('click', openSidebar);
const sidebarClose = document.querySelector('.sidebarClose').addEventListener('click', closeSidebar);
window.addEventListener('click', outsideClick);

function openSidebar() {
  logo.style.display = 'none';
    menu.style.display = 'block';

}

function closeSidebar() {
    logo.style.display = 'block';
    menu.style.display = 'none';
    sidebarOpen.style.display = 'block';
    
}

function outsideClick(e) {
  if (e.target == menu) {
    menu.style.display = 'none';
    sidebarOpen.style.display = 'block';
  }
}

// body.addEventListener('click', e => {
//   let clickElm = e.target;
//   if (! clickElm.classList.contains('.sidebarOpen') && (! clickElm.classList.contains('.menu') )) {
//       nav.classList.remove('.active');
//   }
// })
