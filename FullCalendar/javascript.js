(function(win,doc){
'use strict';

let calendarEl = doc.querySelector('.calendar');

let calendar = new FullCalendar.Calendar(calendarEl, {
    
  timeZone:'America/Sao_Paulo',
    initialView: 'dayGridMonth',
    headerToolbar:{
        start: 'prev,next,today',
        center: 'title',
        end:'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
    },
    eventClick: function(info) {
        alert('ID: ' + info.event.id);
        alert('Event: ' + info.event.title);
        alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
        alert('View: ' + info.view.type);
    
        // change the border color just for fun
        info.el.style.borderColor = 'red';
      },

      dayHeaderFormat:
      { 
        weekday: 'short', month: 'numeric', day: 'numeric', omitCommas: true
      },
      dateClick: function(info) {
        
        document.getElementById('data').value = info.dateStr;
        click('botaoModal')

      },
      eventLimit: true, // for all non-TimeGrid views
      views: {
        timeGrid: {
          eventLimit: 2 // adjust to 6 only for timeGridWeek/timeGridDay
        }
      },
    buttonText:{
        today:    'Hoje',
        month:    'Mês',
        week:     'Semana',
        day:      'Dia',
        list:     'Lista'
    },
events:{
    url:'preencherAgenda.php'
},
    locale:'pt-br'
  });
  calendar.render();
})(window,document);
