
const subirTela = () => {
  window.scrollTo({
    top:0, 
    left:0,
    behavior: 'smooth',
  })
}

let escondeBotao = () => {

  if(window.scrollY == 0) {
    document.querySelector('.header').style.display = 'position:relative';
  } else if(window.scrollY.value > 200) {
    // console.log(window.scrollY);
    document.querySelector('.header').style.display = 'position:fixed';

  }

}

// setInterval(escondeBotao,10); //Primeira opção
window.addEventListener('scroll',escondeBotao);