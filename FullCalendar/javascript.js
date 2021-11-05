(function(win,doc){
'use strict';

let calendarEl = doc.querySelector('.calendar');

let calendar = new FullCalendar.Calendar(calendarEl, {
    
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
      dateClick: function(info) {
        alert('Clicked on: ' + info.dateStr);
        alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
        alert('Current view: ' + info.view.type);
        // change the day's background color just for fun

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
