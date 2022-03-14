document.addEventListener('DOMContentLoaded', function () {
// function getCalendar(profile, div) {
    // var calendarEl = document.getElementById('calendar');
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
  
      locale: 'pt-br',
      initialView: 'dayGridMonth',
      editable: true,
      selectable: true,
      dayMaxEvents: true,
      buttonText: {
        prev: 'Anterior',
        next: 'Próximo',
        today: 'Hoje',
        month: 'Mês',
        week: 'Semana',
        day: 'Dia',
        list: 'Lista',
      },
  
      //Buscando dados do banco de dados
      events: {
        url: 'http://localhost/psi-sicoob/src/views/pages/admin/eventos.php',
        method: 'POST',
      },
  
      eventClick: function (info) {
        info.jsEvent.preventDefault();
        $('#visualizar #idagenda').text(info.event.id);
        $('#visualizar #pac').text(info.event.paciente);
        $('#visualizar #pac').text(info.event.extendedProps.pac);
        $('#visualizar #psi').text(info.event.extendedProps.psi);
        $('#visualizar #title').text(info.event.title);
        $('#visualizar #start').text(info.event.start.toLocaleString());
        $('#visualizar #end').text(info.event.end.toLocaleString());
        $('#visualizar #status').text(info.event.extendedProps.status);
        $('#visualizar #description').text(info.event.extendedProps.descricao);
        $('#visualizar').modal('show');
      },
     
      select: function (info) {
        // if(profile == "user") {
        //   alert("Você não é administrador!");
        // } else {
          $("#marcar_consulta #inicio").val(info.start.toLocaleString());
          $("#marcar_consulta #fim").val(info.start.toLocaleString());
          $('#marcar_consulta').modal('show');
        // }
      },
  
    });
  
    calendar.render();
    calendar.updateSize()
    
    // if(document.querySelector('#calendarUser')) {
    //   getCalendar('user', '#calendarUser')
    // } else {
    //   getCalendar('admin', '#calendar');
    // }
  // }
});

//FULL CALLENDAR


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
