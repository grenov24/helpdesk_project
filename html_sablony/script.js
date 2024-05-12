//const adminNav = document.querySelector('nav')
//console.log(adminNav);

//adminNav.remove();







//nahrazení "přihlásit se" za iconu při zmenšení stránky na rozlišení 1001px
const headerUserInterface = document.getElementsByClassName('header_logo_h')[0];

function createLoginIcon(linkUrl, imgUrl) {
    
    const linkIcon = document.createElement('a');
    linkIcon.setAttribute('href', linkUrl);

    const imgIcon = document.createElement('img');
    imgIcon.setAttribute('src', imgUrl);

    linkIcon.appendChild(imgIcon);
    linkIcon.classList.add('login_icon');
    

    return linkIcon;
}

headerUserInterface.appendChild(
    createLoginIcon("admin_login.html","user.svg")
);
