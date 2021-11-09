(function (win, doc) {
  "use strict";

  let calendarEl = doc.querySelector(".calendar");
  console.log(agora);
  let calendar = new FullCalendar.Calendar(calendarEl, {
    now: agora,
    timeZone: "local",
    nowIndicator: "true",
    selectable: "true",
    select: function (info) {
      console.log(info.start);
      console.log(info.end);
    },
    eventDidMount: function (info) {
      if (info.event.extendedProps.status === 'done') {

        // Change background color of row
        info.el.style.backgroundColor = 'red';
  
        // Change color of dot marker
        var dotEl = info.el.getElementsByClassName('fc-event-dot')[0];
        
        if (dotEl) {
          console.log(dotEl);
          dotEl.style.backgroundColor = 'white';
        }else{
          console.log('tem nao');
        }
      }
    },

    initialView: "dayGridMonth",
    headerToolbar: {
      start: "prev,next,today",
      center: "title",
      end: "dayGridMonth,timeGridWeek,timeGridDay,listWeek,listMonth",
    },
    eventClick: function (info) {
      alert("ID: " + info.event.id);
      alert("Event: " + info.event.title);
      alert("Coordinates: " + info.jsEvent.pageX + "," + info.jsEvent.pageY);
      alert("View: " + info.view.type);

      // change the border color just for fun
      info.el.style.borderColor = "red";
    },

    dayHeaderFormat: {
      weekday: "short",
      month: "numeric",
      day: "numeric",
      omitCommas: true,
    },
    dateClick: function (info) {
      if (info.view.type == "dayGridMonth" && info.dateStr != null) {
        document.getElementById("data").value = info.dateStr;
        click("botaoModal");
      }
    },
    eventLimit: "true", // for all non-TimeGrid views
    views: {
      timeGrid: {
        eventLimit: 2, // adjust to 6 only for timeGridWeek/timeGridDay
      },
    },
    buttonText: {
      today: "Hoje",
      month: "Mês",
      week: "Semana",
      day: "Dia",
      listWeek: "Lista Semanal",
      listMonth: "Lista Mensal"
    },
    events: {
      url: "preencherAgenda.php",
    },
    locale: "pt-br",
  });
  calendar.render();
})(window, document);
