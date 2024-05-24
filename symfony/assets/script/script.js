document.addEventListener('DOMContentLoaded', () => {
    //js pro nahradu textu "přihlásit se" za ikonu user.svg
    //pokud je obrazovka menší než 1001px
    const headerUserInterface = document.getElementsByClassName('header_logo_h')[0];
    const loginText = document.getElementsByClassName('login')[0];

    //vytvořit ikonu na přihlašení - nastavení cesty k obrázku a kam ikona povede
    function createImageLink(linkUrl, imgUrl) {
        const linkIcon = document.createElement('a');
        linkIcon.setAttribute('href', linkUrl);


        const imgIcon = document.createElement('img');


        imgIcon.setAttribute('src', imgUrl);

        linkIcon.appendChild(imgIcon);

        linkIcon.classList.add('login_icon');
        return linkIcon;
    }
    //vybrání podle responzivity kdy ikonu zobrazit
    const mediaQueryMax = window.matchMedia('(max-width: 1001px)');

    var linkIcon;

    // funkce zkontroluje jestli ikona již existuje
    // pokud okno je menší 1001px zkontroluje jestli ikona existuje
    // pokud ikona neexistuje, smaže <a> z html a nahradí ho ikonou
    // pokud okno je opět zvětšeno nad 1001px ikona se smaže a <a> z html se znovu vytvoří
    function changeToIcon() {
        if (mediaQueryMax.matches) {
            if (!linkIcon) {
                linkIcon = createImageLink('/prihlasit-se', "/graphics/user.svg");
                headerUserInterface.appendChild(linkIcon);
                loginText.remove()
            }
        }
        else {
            if (linkIcon) {
                linkIcon.remove();
                linkIcon = null;
                headerUserInterface.appendChild(loginText);
            }
        }
    }
    changeToIcon();

    //vytvoří posluchač udalosti na velikost okna -- proč je přeškrtnutý??
    // přeškrtnuto, protože je označeno jako deprecated a bude brzy odstraněno
    mediaQueryMax.addEventListener('change', changeToIcon);


    function openCardContent(card) {
        var hiddenContent = card.querySelector('#hidden-content');
        var closeBtn = hiddenContent.querySelector('.close-btn');
        var preCard = card.querySelector('.pre_card');

        hiddenContent.style.display = 'block';
        closeBtn.style.display = 'block';
        preCard.style.display = 'none';
    }

    function closeCardContent(event, card) {
        event.stopPropagation();

        var hiddenContent = card.querySelector('#hidden-content');
        var closeBtn = hiddenContent.querySelector('.close-btn');
        var preCard = card.querySelector('.pre_card');

        hiddenContent.style.display = 'none';
        closeBtn.style.display = 'none';
        preCard.style.display = 'block';
    }

    const cards = document.getElementsByClassName('card');

    for (const card of cards) {
        card.addEventListener('click', () => openCardContent(card));

        // najdeme button uvnitř karty
        const closeButton = card.querySelector('.close-card');
        if (closeButton) {
            closeButton.addEventListener('click', (event) => closeCardContent(event, card));
        }
    }
});
