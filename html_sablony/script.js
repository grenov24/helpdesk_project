//const adminNav = document.querySelector('nav')
//console.log(adminNav);

//adminNav.remove();



const headerUserInterface = document.getElementsByClassName('header_logo_h')[0];
const loginText = document.getElementsByClassName('login')[0];


function createImageLink(linkUrl, imgUrl) {
    const linkElement = document.createElement('a');
    linkElement.setAttribute('href', linkUrl);
  
    
    const imgElement = document.createElement('img');
  
    
    imgElement.setAttribute('src', imgUrl);
  
    linkElement.appendChild(imgElement);
  
    linkElement.classList.add('login_icon');
    return linkElement;
  }

const mediaQueryMax = window.matchMedia('(max-width: 1000px)');
var linkElement;
function changeToIcon() {
if (mediaQueryMax.matches) {
    if (!linkElement) {
    linkElement = createImageLink('https://example.com', 'user.svg');
    headerUserInterface.appendChild(linkElement);
    loginText.remove()
    }
}
else {
    if (linkElement) {
    linkElement.remove();
    linkElement = null;
    headerUserInterface.appendChild(loginText);
    }
}   
}
changeToIcon();


mediaQueryMax.addListener(changeToIcon);

  
