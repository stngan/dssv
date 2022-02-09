const tablenormal = document.querySelector('.tablefull');
const tablecollapse = document.querySelector('.tablecollapse');
const info = document.querySelector('.info-div');
const infoView = document.querySelector('#viewinfo');
const infoClose = document.querySelector('#closeinfo');


// const Idstu = document.querySelector('.col-idstu');
// const Department = document.querySelector('.col-department');
// const Year = document.querySelector('.col-year');
// const Class = document.querySelector('.col-class');


infoView.addEventListener('click', () => {
    if (info.style.display === 'none' && tablecollapse.style.display === 'none') {
        info.style.display = 'block';
        tablecollapse.style.display = 'block';
    } 
    else  {
        info.style.display = 'none';
        tablefull.style.display = 'block';
        tablecollapse.style.display = 'none';
    }
});

infoClose.addEventListener('click', () => {
    if(info.style.display === 'block' && tablecollapse.style.display === 'block' && tablefull.style.display === 'none') {
        info.style.display = 'none';
        tablecollapse.style.display = 'none';
        tablefull.style.display = 'block';
    } 
    else if (info.style.display === 'none' && tablecollapse.style.display === 'block' && tablefull.style.display === 'block')
    {
        info.style.display = 'block';
        tablefull.style.display = 'none';
        tablecollapse.style.display = 'block';
    }
});


