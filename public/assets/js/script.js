function renderCalendar(profile) {
  document.addEventListener('DOMContentLoaded', function () {
    if(profile == 'admin') {
      var calendarEl = document.getElementById('calendar');
    } else if (profile == 'user'){
      var calendarEl = document.getElementById('calendarUser');
    }
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
  
      initialView: 'timeGridWeek',
      nowIndicator: true,
      locale: 'pt-br',
      headerToolbar: {
        left: 'prev,next, today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
  
      buttonText: {
        prev: 'Anterior',
        next: 'Próximo',
        today: 'Hoje',
        month: 'Mês',
        week: 'Semana',
        day: 'Dia',
        list: 'Lista',
      },
  
      navLinks: true,
      editable: true,
      selectable: true,
      selectMirror: true,
      dayMaxEvents: true, 
  
      events: {
        url: 'http://localhost/psi-sicoob/src/views/pages/admin/eventos.php',
        method: 'POST',
      },
      
      //Método para visualizar
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
  
         //Método para cadastrar consulta
         
               select: function (info) {
                 if(profile == 'admin') {
                   $("#marcar_consulta #inicio").val(info.start.toLocaleString());
                   $("#marcar_consulta #fim").val(info.end.toLocaleString());
                   $('#marcar_consulta').modal('show');
                 }
        },
    });
  
    calendar.render();
  })
}
