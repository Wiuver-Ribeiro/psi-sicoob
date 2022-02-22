document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'pt-br',
    editable: true,
    selectable: true,
    businessHours: true,
    dayMaxEvents: true, // allow "more" link when too many events

    //Busca dos banco de dados
    // events: 'list_events.php',
    events: [
    {
      id: 1,
      title: 'Boleto ',
      start: '2022-02-10 09:00',
      end: '2022-02-10 12:00'
    },
    {
      id: 2,
      title: 'Pagar Fatura ',
      start: '2022-02-20 10:00',
      end: '2022-02-20 12:00'
    },
   ],

    //Fim
    eventClick: function(info) {
      info.jsEvent.preventDefault();
      $('#visualizar #id').text(info.event.id);
      $('#visualizar #title').text(info.event.title);
      $('#visualizar #start').text(info.event.start.toLocaleString());
      $('#visualizar #end').text(info.event.end.toLocaleString());
      $('#visualizar').modal('show');
    },
        select: function(info) {
      // alert('Início do Evento: '+ info.start.toLocaleString());
      $('#cadastrar #title').val(info.title);
      $('#cadastrar #start').val(info.start.toLocaleString());
      $('#cadastrar #end').val(info.end.toLocaleString());
      $('#cadastrar').modal('show');
      
      
    }
  }, );
  calendar.render();
});



//Mascara para o campo data e hora
function DataHora(evento, objeto) {
  var keypress = (window.event) ? event.keyCode : evento.which;
  campo = eval(objeto);
  if (campo.value == '00/00/0000 00:00:00') {
      campo.value = "";
  }

  caracteres = '0123456789';
  separacao1 = '/';
  separacao2 = ' ';
  separacao3 = ':';
  conjunto1 = 2;
  conjunto2 = 5;
  conjunto3 = 10;
  conjunto4 = 13;
  conjunto5 = 16;
  if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
      if (campo.value.length == conjunto1)
          campo.value = campo.value + separacao1;
      else if (campo.value.length == conjunto2)
          campo.value = campo.value + separacao1;
      else if (campo.value.length == conjunto3)
          campo.value = campo.value + separacao2;
      else if (campo.value.length == conjunto4)
          campo.value = campo.value + separacao3;
      else if (campo.value.length == conjunto5)
          campo.value = campo.value + separacao3;
  } else {
      event.returnValue = false;
  }
}



// Manipulação da DOM
const btn = document.querySelector('#menu-mobile-icone');
const menu = document.querySelector('.menu-mobile');
const logo = document.querySelector('.logo-text');
const link = document.querySelectorAll('.link-menu');
const sidebar = document.querySelector('.sidebar');


btn.addEventListener('click', () => {
  menu.style.width = "80px";
  menu.style.transition = "ease-in-out .4s";

  logo.style.display = "none";
  //Menu opções
    for(i = 0; i < link.length; i++) {
      link[i].style.overflow = 'hidden';
    }
})

// MODAIS DOS PSI

