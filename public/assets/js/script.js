function renderCalendar(profile, id) {
  // alert(id);
  document.addEventListener('DOMContentLoaded', function () {
    //Verifica qual o perfil de usuário que está logado.
    if(profile == 'admin') {
      var calendarEl = document.getElementById('calendar');
      var URL = 'http://localhost/psi-sicoob/src/views/pages/admin/eventos.php/'
      var metodo = 'POST';

    } else if (profile == 'user'){
      var calendarEl = document.getElementById('calendarUser');
      var URL = `http://localhost/psi-sicoob/src/views/pages/eventos.php?id=${id}`
      var metodo = 'GET';
    }
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
  
      initialView: 'timeGridWeek',
      nowIndicator: true,
      locale: 'pt-br',
      headerToolbar: {
        left: 'prev,next, today',
        center: 'title',
        right: 'timeGridWeek,timeGridDay,listWeek'
      },
  
      buttonText: {
        today: 'Hoje',
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
        // url: 'http://localhost/psi-sicoob/src/views/pages/admin/eventos.php',
        url: URL,
        method: metodo,
      },
      
      //Método para visualizar
             eventClick: function (info) {
           info.jsEvent.preventDefault();
           $('#visualizar #idagenda').text(info.event.id);
         
      
          
        document.getElementById('ideditar').action = 'http://localhost/psi-sicoob/public/appointments/edit/'+ info.event.id;;
          
        $('#visualizar #pac').text(info.event.paciente);
           $('#visualizar #pac').text(info.event.extendedProps.pac);
           $('#visualizar #psi').text(info.event.extendedProps.psi);
           $('#visualizar #title').val(info.event.title);
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
                 } else {
                   alert("Você não pode marcar consultas!");
                 }
        },
    });
  
    calendar.render();
  })
}
