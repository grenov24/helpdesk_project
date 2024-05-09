const adminNavigace = document.getElementsByClassName('admin_nav');
const closeAdminNavigace = document.getElementsByClassName('close');

closeAdminNavigace.addEventListener('click', () => {
    odkazyNavigace.classList.remove('admin_nav');  
});