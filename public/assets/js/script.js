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
    events: [{
      id: 1,
      title: 'Surprise',
      start: '2022-02-02',
      end: '2022-02-02'
    }, 
    {
      id: 2,
      title: 'Pagar Fatura',
      start: '2022-02-12',
      end: '2022-02-12'
    },
   ],

    //Fim
    eventClick: function(info) {

      $('#visualizar #id').text(info.event.id);
      $('#visualizar #title').text(info.event.title);
      $('#visualizar #start').text(info.event.start.toLocaleString());
      $('#visualizar #end').text(info.event.end.toLocaleString());
      $('#visualizar').modal('show');
    }
  }, );
  calendar.render();
});