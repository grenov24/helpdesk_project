function openCardContent(card) {
  var hiddenContent = card.querySelector('#hidden-content');
  var closeBtn = hiddenContent.querySelector('.close-btn');
  var preCard = card.querySelector('.pre_card');

  hiddenContent.style.display = 'block';
  closeBtn.style.display = 'block';
  preCard.style.display = 'none';
}

function closeCardContent(event) {
  event.stopPropagation();

  var card = document.querySelector('#card');

  var hiddenContent = card.querySelector('#hidden-content');
  var closeBtn = hiddenContent.querySelector('.close-btn');
  var preCard = card.querySelector('.pre_card');

  hiddenContent.style.display = 'none';
  closeBtn.style.display = 'none';
  preCard.style.display = 'block';
}