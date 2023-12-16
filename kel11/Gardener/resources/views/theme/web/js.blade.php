

<script>var hostUrl = "{{ asset('metronic/') }}";</script>
<script src="{{ asset('metronic/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('metronic/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('metronic/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('metronic/js/custom/apps/ecommerce/catalog/products.js') }}"></script>
<script src="{{ asset('metronic/js/widgets.bundle.js') }}"></script>
<script src="{{ asset('metronic/js/custom/widgets.js') }}"></script>
<script src="{{ asset('metronic/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('metronic/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('metronic/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('metronic/js/custom/utilities/modals/users-search.js') }}"></script>
<script src="{{ asset('metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

<script src="{{asset('js/auth.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
<script src="{{asset('js/plugin.js')}}"></script>
<script src="{{asset('js/method.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>
    (function($){
  
  var Calendar = function (elem, options) {
    this.elem = elem;
    this.options = $.extend({}, Calendar.DEFAULTS, options);
    this.init();
  };
  
  Calendar.DEFAULTS = {
    datetime: undefined,
    dayFormat: 'DDD',
    weekFormat: 'DDD',
    monthFormat: 'MM/DD/YYYY',
    view: undefined,
  };

  Calendar.prototype.init = function () {
    if (! this.options.datetime || this.options.datetime == 'now') {
      this.options.datetime = moment();
    }
    if (! this.options.view) {
      this.options.view = 'month';
    }
    this.initScaffold()
        .initStyle()
        .render();
  }
  
  Calendar.prototype.initScaffold = function () {
    
    var $elem = $(this.elem),
        $view = $elem.find('.calendar-view'),
        $currentDate = $elem.find('.calendar-current-date');
    
    if (! $view.length) {
      this.view = document.createElement('div');
      this.view.className = 'calendar-view';
      this.elem.appendChild(this.view);
    } else {
      this.view = $view[0];
    }
    console.log($currentDate);
    console.log($currentDate);
    
    if ($currentDate.length > 0) {
      var dayFormat = $currentDate.data('day-format'),
          weekFormat = $currentDate.data('week-format'),
          monthFormat = $currentDate.data('month-format');
      this.currentDate = $currentDate[0];
      if (dayFormat) {
        this.options.dayFormat = dayFormat;
      }
      if (weekFormat) {
        this.options.weekFormat = weekFormat;
      }
      if (monthFormat) {
        this.options.monthFormat = monthFormat;
      }
    }
    return this;
  }
  
  Calendar.prototype.initStyle = function () {
    return this;
  }
  
  Calendar.prototype.render = function () {
    switch (this.options.view) {
      case 'day': this.renderDayView(); break;
      case 'week': this.renderWeekView(); break;
      case 'month': this.renderMonthView(); break;
      befault: this.renderMonth();
    }
  }
  
  Calendar.prototype.renderDayView = function () {

  }
  
  Calendar.prototype.renderWeekView = function () {
   
  }
  
  Calendar.prototype.renderMonthView = function () {
    
    var datetime = this.options.datetime.clone(),
        month = datetime.month();
    datetime.startOf('month').startOf('week');
    
    var $view = $(this.view),
        table = document.createElement('table'),
        tbody = document.createElement('tbody');
    
    $view.html('');
    table.appendChild(tbody);
    table.className = 'table table-bordered';
    
    var week = 0, i;
    while (week < 6) {
      tr = document.createElement('tr');
      tr.className = 'calendar-month-row';
      for (i = 0; i < 7; i++) {
        td = document.createElement('td');
        td.appendChild(document.createTextNode(datetime.format('D')));
        if (month !== datetime.month()) {
          td.className = 'calendar-prior-months-date';
        }
        tr.appendChild(td);
        datetime.add(1, 'day');
      }
      tbody.appendChild(tr);
      week++;
    }
    
    $view[0].appendChild(table);
    
    if (this.currentDate) {
      $(this.currentDate).html(
        this.options.datetime.format(this.options.monthFormat)
      );
    }
    
  }
  
  Calendar.prototype.next = function () {
    switch (this.options.view) {
      case 'day':
        this.options.datetime.add(1, 'day');
        this.render();
        break;
      case 'week':
        this.options.datetime.endOf('week').add(1, 'day');
        this.render();
        break;
      case 'month':
        this.options.datetime.endOf('month').add(1, 'day');
        this.render();
        break;
      default:
        break;
    }
  }
  
  Calendar.prototype.prev = function () {
    switch (this.options.view) {
      case 'day':
        break;
      case 'week':
        break;
      case 'month':
        this.options.datetime.startOf('month').subtract(1, 'day');
        this.render();
        break;
      default:
        break;
    }
  }
  
  Calendar.prototype.today = function () {
    this.options.datetime = moment();
    this.render();
  }

  function Plugin(option) {
    return this.each(function () {
      var $this = $(this),
          data  = $this.data('bs.calendar'),
          options = typeof option == 'object' && option;
      if (! data) {
        data = new Calendar(this, options);
        $this.data('bs.calendar', data);
      }
      
      switch (option) {
        case 'today':
          data.today();
          break;
        case 'prev':
          data.prev();
          break;
        case 'next':
          data.next();
          break;
        default:
          break;
      }
    });
  };

  var noConflict = $.fn.calendar;

  $.fn.calendar             = Plugin;
  $.fn.calendar.Constructor = Calendar;

  $.fn.calendar.noConflict = function () {
    $.fn.calendar = noConflict;
    return this;
  };

  $('[data-toggle="calendar"]').click(function(){
    var $this = $(this),
        $elem = $this.parents('.calendar'),
        action = $this.data('action');
    if (action) {
      $elem.calendar(action);
    }
  });
  
})(jQuery);

$('#calendar').calendar();
</script>
<script>
    const timeArea = document.querySelector(".time");

const timePeriod = document.querySelector(".time-per");

const tik = () => {
  const date = new Date();

  let hours = date.getHours();
  let minutes = date.getMinutes();
  let seconds = date.getSeconds();

  if (hours < 10) {
    hours = "0" + hours;
  }

  if (minutes < 10) {
    minutes = "0" + minutes;
  }

  if (seconds < 10) {
    seconds = "0" + seconds;
  }

  const ampm = hours >= 12 ? "pm" : "am";

  const time = `${hours}:${minutes}:${seconds}`;

  timeArea.innerHTML = time;
  timePeriod.innerHTML = ampm;

  setTimeout(tik, 1000);
};

tik();
</script>