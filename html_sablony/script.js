//const adminNav = document.querySelector('nav')
//console.log(adminNav);

//adminNav.remove();







//nahrazení "přihlásit se" za iconu při zmenšení stránky na rozlišení 1001px
const headerUserInterface = document.getElementsByClassName('header_logo_h')[0];
const loginText = document.getElementsByClassName('login')[0];

function createLoginIcon(linkUrl, imgUrl) {
    
    const linkIcon = document.createElement('a');
    linkIcon.setAttribute('href', linkUrl);

    const imgIcon = document.createElement('img');
    imgIcon.setAttribute('src', imgUrl);

    linkIcon.appendChild(imgIcon);

    linkIcon.classList.add('login_icon');
    

    return linkIcon;
}
var mediaQuery = window.matchMedia('(max-width: 1000px)');

function replaceTextWithIcon() {
    if (mediaQuery.matches) {
        loginText.remove();
        headerUserInterface.append(
            createLoginIcon("admin_login.html", "user.svg")
        );
    }
}
replaceTextWithIcon();

mediaQuery.addListener(replaceTextWithIcon);
