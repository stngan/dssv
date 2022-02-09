const menuDepartment = document.querySelector('#menuDepartment');
const menuYear = document.querySelector('#menuYear');
const menuClass = document.querySelector('#menuClass');
const nonemenuArea = document.querySelector('.main__list');

const btnDepartment = document.querySelector('#btnDepartment');
const optionDepartment = document.querySelector('#optionDepartment');

const btnYear = document.querySelector('#btnYear');
const optionYear = document.querySelector('#optionYear');

const btnClass = document.querySelector('#btnClass');
const optionClass = document.querySelector('#optionClass');

// nạp database
let dbDepartment = ['Kinh tế', 'Kinh tế đối ngoại', 'Tài chính - Ngân hàng','Kế toán - Kiểm toán','Hệ thống thông tin','Luật','Luật kinh tế','Toán kinh tế'];

let dbYear = ['K14','K15','K16','K17','K18','K19','K20','K21'];

let dbClass = ['K19411', 'K19406', 'K19406C', 'K19411C', 'K20411', 'K20416', 'K20406C', 'K20411C', 'K20416C'];


// duyệt mảng database, onclick phần tử li nào thì lấy li đó, gán vào btn, ẩn menu

// xử lý Khoa 
function addDepartment() {
    dbDepartment.forEach(department => {
        let li = `<li onclick="updateDepartment(this)">${department}</li>`;
        optionDepartment.insertAdjacentHTML("beforeend", li);
    });
}
addDepartment();
function updateDepartment(selectedLi) {
    btnDepartment.innerText = selectedLi.innerText;
    menuDepartment.style.display = 'none';
}

// xử lý Khóa
function addYear() {
  dbYear.forEach(Year => {
      let li = `<li onclick="updateYear(this)">${Year}</li>`;
      optionYear.insertAdjacentHTML("beforeend", li);
  });
}
addYear();
function updateYear(selectedLi) {

 btnYear.innerText = selectedLi.innerText;
menuYear.style.display = 'none';
}

// xử lý Lớp
function addClass() {
  dbClass.forEach(Class => {
      let li = `<li onclick="updateClass(this)">${Class}</li>`;
      optionClass.insertAdjacentHTML("beforeend", li);
  });
}
addClass();
function updateClass(selectedLi) {

btnClass.innerText = selectedLi.innerText;
menuClass.style.display = 'none';
}

// dropdown menu khi click btn 
btnDepartment.addEventListener('click', () => {
  if (menuDepartment.style.display === 'none') {
    menuDepartment.style.display = 'block';
  } else {
    menuDepartment.style.display = 'none';
  }
});

btnYear.addEventListener('click', () => {
  if (menuYear.style.display === 'none') {
    menuYear.style.display = 'block';
  } else {
    menuYear.style.display = 'none';
  }
});

btnClass.addEventListener('click', () => {
  if (menuClass.style.display === 'none') {
    menuClass.style.display = 'block';
  } else {
    menuClass.style.display = 'none';
  }
});


nonemenuArea.addEventListener('click', outsideClick);

function outsideClick(e) {
  if (e.target == nonemenuArea) {
    menuDepartment.style.display = 'none';
    menuYear.style.display = 'none';
    menuClass.style.display = 'none';
  }
}