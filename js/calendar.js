var date="";
$(function() { $.datepicker.regional.ru = { closeText: "Закрыть", prevText: "&#x3C;Пред", nextText: "След&#x3E;", currentText: "Сегодня", monthNames: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"], monthNamesShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"], dayNames: ["воскресенье", "понедельник", "вторник", "среда", "четверг", "пятница", "суббота"], dayNamesShort: ["вск", "пнд", "втр", "срд", "чтв", "птн", "сбт"], dayNamesMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"], weekHeader: "Нед", dateFormat: "yy-mm-dd", firstDay: 1, isRTL: !1, showMonthAfterYear: !1, yearSuffix: "" }, $.datepicker.setDefaults($.datepicker.regional.ru), $(".calendar").datepicker({ dateFormat: "yy-mm-dd", changeYear: !0, minDate: new Date(2011, 6, 26), maxDate: new Date(2025, 11, 15), onSelect: function(e) {date=e; location.href = "/page/media_s/news.php?date=" + date; date="";} }) });