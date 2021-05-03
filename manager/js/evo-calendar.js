/*!
 * Evo Calendar - Simple and Modern-looking Event Calendar Plugin
 *
 * Licensed under the MIT License
 *
 * Version: 1.1.3
 * Author: Edlyn Villegas
 * Docs: https://edlynvillegas.github.com/evo-calendar
 * Repo: https://github.com/edlynvillegas/evo-calendar
 * Issues: https://github.com/edlynvillegas/evo-calendar/issues
 *
 */

(function (factory) {
    "use strict";
    if (typeof define === "function" && define.amd) {
        define(["jquery"], factory);
    } else if (typeof exports !== "undefined") {
        module.exports = factory(require("jquery"));
    } else {
        factory(jQuery);
    }
})(function ($) {
    "use strict";
    var EvoCalendar = window.EvoCalendar || {};

    EvoCalendar = (function () {
        var instanceUid = 0;

        function EvoCalendar(element, settings) {
            var _ = this;
            _.defaults = {
                theme: null,
                format: "mm-dd-yyyy",
                titleFormat: "MM yyyy",
                eventHeaderFormat: "MM d, yyyy",
                firstDayOfWeek: 0,
                language: "en",
                todayHighlight: false,
                sidebarDisplayDefault: true,
                sidebarToggler: true,
                eventDisplayDefault: true,
                eventListToggler: true,
                calendarEvents: null,
            };
            _.options = $.extend({}, _.defaults, settings);

            _.initials = {
                default_class: $(element)[0].classList.value,
                validParts: /dd?|DD?|mm?|MM?|yy(?:yy)?/g,
                dates: {
                    en: {
                        days: [
                            "Sunday",
                            "Monday",
                            "Tuesday",
                            "Wednesday",
                            "Thursday",
                            "Friday",
                            "Saturday",
                        ],
                        daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                        daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                        months: [
                            "January",
                            "February",
                            "March",
                            "April",
                            "May",
                            "June",
                            "July",
                            "August",
                            "September",
                            "October",
                            "November",
                            "December",
                        ],
                        monthsShort: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "May",
                            "Jun",
                            "Jul",
                            "Aug",
                            "Sep",
                            "Oct",
                            "Nov",
                            "Dec",
                        ],
                        noEventForToday: "No event for today.. so take a rest! :)",
                        noEventForThisDay: "No event for this day.. so take a rest! :)",
                        previousYearText: "Previous year",
                        nextYearText: "Next year",
                        closeSidebarText: "Close sidebar",
                        closeEventListText: "Close event list",
                    },
                    es: {
                        days: [
                            "Domingo",
                            "Lunes",
                            "Martes",
                            "Miércoles",
                            "Jueves",
                            "Viernes",
                            "Sábado",
                        ],
                        daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
                        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                        months: [
                            "Enero",
                            "Febrero",
                            "Marzo",
                            "Abril",
                            "Mayo",
                            "Junio",
                            "Julio",
                            "Agosto",
                            "Septiembre",
                            "Octubre",
                            "Noviembre",
                            "Diciembre",
                        ],
                        monthsShort: [
                            "Ene",
                            "Feb",
                            "Mar",
                            "Abr",
                            "May",
                            "Jun",
                            "Jul",
                            "Ago",
                            "Sep",
                            "Oct",
                            "Nov",
                            "Dic",
                        ],
                        noEventForToday: "No hay evento para hoy.. ¡así que descanse! :)",
                        noEventForThisDay: "Ningún evento para este día.. ¡así que descanse! :)",
                        previousYearText: "Año anterior",
                        nextYearText: "El próximo año",
                        closeSidebarText: "Cerrar la barra lateral",
                        closeEventListText: "Cerrar la lista de eventos",
                    },
                    de: {
                        days: [
                            "Sonntag",
                            "Montag",
                            "Dienstag",
                            "Mittwoch",
                            "Donnerstag",
                            "Freitag",
                            "Samstag",
                        ],
                        daysShort: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                        daysMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
                        months: [
                            "Januar",
                            "Februar",
                            "März",
                            "April",
                            "Mai",
                            "Juni",
                            "Juli",
                            "August",
                            "September",
                            "Oktober",
                            "November",
                            "Dezember",
                        ],
                        monthsShort: [
                            "Jan",
                            "Feb",
                            "Mär",
                            "Apr",
                            "Mai",
                            "Jun",
                            "Jul",
                            "Aug",
                            "Sep",
                            "Okt",
                            "Nov",
                            "Dez",
                        ],
                        noEventForToday: "Keine Veranstaltung für heute.. also ruhen Sie sich aus! :)",
                        noEventForThisDay: "Keine Veranstaltung für diesen Tag.. also ruhen Sie sich aus! :)",
                        previousYearText: "Vorheriges Jahr",
                        nextYearText: "Nächstes Jahr",
                        closeSidebarText: "Schließen Sie die Seitenleiste",
                        closeEventListText: "Schließen Sie die Ereignisliste",
                    },
                    pt: {
                        days: [
                            "Domingo",
                            "Segunda-Feira",
                            "Terça-Feira",
                            "Quarta-Feira",
                            "Quinta-Feira",
                            "Sexta-Feira",
                            "Sábado",
                        ],
                        daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
                        daysMin: ["Do", "2a", "3a", "4a", "5a", "6a", "Sa"],
                        months: [
                            "Janeiro",
                            "Fevereiro",
                            "Março",
                            "Abril",
                            "Maio",
                            "Junho",
                            "Julho",
                            "Agosto",
                            "Setembro",
                            "Outubro",
                            "Novembro",
                            "Dezembro",
                        ],
                        monthsShort: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Abr",
                            "Mai",
                            "Jun",
                            "Jul",
                            "Ago",
                            "Set",
                            "Out",
                            "Nov",
                            "Dez",
                        ],
                        noEventForToday: "Nenhum evento para hoje.. então descanse! :)",
                        noEventForThisDay: "Nenhum evento para este dia.. então descanse! :)",
                        previousYearText: "Ano anterior",
                        nextYearText: "Próximo ano",
                        closeSidebarText: "Feche a barra lateral",
                        closeEventListText: "Feche a lista de eventos",
                    },
                    fr: {
                        days: [
                            "Dimanche",
                            "Lundi",
                            "Mardi",
                            "Mercredi",
                            "Jeudi",
                            "Vendredi",
                            "Samedi",
                        ],
                        daysShort: ["Dim", "Lun", "Mar", "Mer", "Jeu", "Ven", "Sam"],
                        daysMin: ["Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa"],
                        months: [
                            "Janvier",
                            "Février",
                            "Mars",
                            "Avril",
                            "Mai",
                            "Juin",
                            "Juillet",
                            "Août",
                            "Septembre",
                            "Octobre",
                            "Novembre",
                            "Décembre",
                        ],
                        monthsShort: [
                            "Jan",
                            "Fév",
                            "Mar",
                            "Avr",
                            "Mai",
                            "Juin",
                            "Juil",
                            "Août",
                            "Sept",
                            "Oct",
                            "Nov",
                            "Déc",
                        ],
                        noEventForToday: "Rien pour aujourd'hui... Belle journée :)",
                        noEventForThisDay: "Rien pour ce jour-ci... Profite de te réposer :)",
                        previousYearText: "Année précédente",
                        nextYearText: "L'année prochaine",
                        closeSidebarText: "Fermez la barre latérale",
                        closeEventListText: "Fermer la liste des événements",
                    },
                    nl: {
                        days: [
                            "Zondag",
                            "Maandag",
                            "Dinsdag",
                            "Woensdag",
                            "Donderdag",
                            "Vrijdag",
                            "Zaterdag",
                        ],
                        daysShort: ["Zon", "Maan", "Din", "Woe", "Don", "Vrij", "Zat"],
                        daysMin: ["Zo", "Ma", "Di", "Wo", "Do", "Vr", "Za"],
                        months: [
                            "Januari",
                            "Februari",
                            "Maart",
                            "April",
                            "Mei",
                            "Juni",
                            "Juli",
                            "Augustus",
                            "September",
                            "Oktober",
                            "November",
                            "December",
                        ],
                        monthsShort: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "Mei",
                            "Jun",
                            "Jul",
                            "Aug",
                            "Sep",
                            "Okt",
                            "Nov",
                            "Dec",
                        ],
                        noEventForToday: "Geen event voor vandaag.. dus rust even uit! :)",
                        noEventForThisDay: "Geen event voor deze dag.. dus rust even uit! :)",
                        previousYearText: "Vorig jaar",
                        nextYearText: "Volgend jaar",
                        closeSidebarText: "Sluit de zijbalk",
                        closeEventListText: "Sluit de event lijst",
                    },
                    id: {
                        days: [
                            "Minggu",
                            "Senin",
                            "Selasa",
                            "Rabu",
                            "Kamis",
                            "Jumat",
                            "Sabtu",
                        ],
                        daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                        daysMin: ["Mi", "Sn", "Sl", "Ra", "Ka", "Ju", "Sa"],
                        months: [
                            "Januari",
                            "Februari",
                            "Maret",
                            "April",
                            "Mei",
                            "Juni",
                            "Juli",
                            "Agustus",
                            "September",
                            "Oktober",
                            "November",
                            "Desember",
                        ],
                        monthsShort: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "Mei",
                            "Jun",
                            "Jul",
                            "Agu",
                            "Sep",
                            "Okt",
                            "Nov",
                            "Des",
                        ],
                        noEventForToday: "Tidak ada Acara untuk Sekarang.. Jadi Beristirahatlah! :)",
                        noEventForThisDay: "Tidak ada Acara untuk Hari Ini.. Jadi Beristirahatlah! :)",
                        previousYearText: "Tahun Sebelumnya",
                        nextYearText: "Tahun Berikutnya",
                        closeSidebarText: "Tutup Sidebar",
                        closeEventListText: "Tutup Daftar Acara",
                    },
                },
            };
            _.initials.weekends = {
                sun: _.initials.dates[_.options.language].daysShort[0],
                sat: _.initials.dates[_.options.language].daysShort[6],
            };

            // Format Calendar Events into selected format
            if (_.options.calendarEvents != null) {
                for (var i = 0; i < _.options.calendarEvents.length; i++) {
                    // If event doesn't have an id, throw an error message
                    if (!_.options.calendarEvents[i].id) {
                        console.log(
                            '%c Event named: "' +
                            _.options.calendarEvents[i].name +
                            "\" doesn't have a unique ID ",
                            "color:white;font-weight:bold;background-color:#e21d1d;"
                        );
                    }
                    if (_.isValidDate(_.options.calendarEvents[i].date)) {
                        _.options.calendarEvents[i].date = _.formatDate(
                            _.options.calendarEvents[i].date,
                            _.options.format
                        );
                    }
                }
            }

            // Global variables
            _.startingDay = null;
            _.monthLength = null;
            _.windowW = $(window).width();

            // CURRENT
            _.$current = {
                month: isNaN(this.month) || this.month == null ?
                    new Date().getMonth() : this.month,
                year: isNaN(this.year) || this.year == null ?
                    new Date().getFullYear() : this.year,
                date: _.formatDate(
                    _.initials.dates[_.defaults.language].months[new Date().getMonth()] +
                    " " +
                    new Date().getDate() +
                    " " +
                    new Date().getFullYear(),
                    _.options.format
                ),
            };

            // ACTIVE
            _.$active = {
                month: (localStorage.getItem("monthIndex") === null) ? _.$current.month : localStorage.getItem("monthIndex"),
                year: _.$current.year,
                date: _.$current.date,
                event_date: _.$current.date,
                events: [],
            };

            // LABELS
            _.$label = {
                days: [],
                months: _.initials.dates[_.defaults.language].months,
                days_in_month: [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
            };

            // HTML Markups (template)
            _.$markups = {
                calendarHTML: "",
                mainHTML: "",
                sidebarHTML: "",
                eventHTML: "",
            };
            // HTML DOM elements
            _.$elements = {
                calendarEl: $(element),
                innerEl: null,
                sidebarEl: null,
                eventEl: null,

                sidebarToggler: null,
                eventListToggler: null,

                activeDayEl: null,
                activeMonthEl: null,
                activeYearEl: null,
            };
            _.$breakpoints = {
                tablet: 768,
                mobile: 425,
            };
            _.$UI = {
                hasSidebar: true,
                hasEvent: true,
            };

            _.formatDate = $.proxy(_.formatDate, _);
            _.selectDate = $.proxy(_.selectDate, _);
            _.selectMonth = $.proxy(_.selectMonth, _);
            _.selectYear = $.proxy(_.selectYear, _);
            _.selectEvent = $.proxy(_.selectEvent, _);
            _.toggleSidebar = $.proxy(_.toggleSidebar, _);
            _.toggleEventList = $.proxy(_.toggleEventList, _);

            _.instanceUid = instanceUid++;

            _.init(true);
        }

        return EvoCalendar;
    })();

    // v1.0.0 - Initialize plugin
    EvoCalendar.prototype.init = function (init) {
        var _ = this;

        if (!$(_.$elements.calendarEl).hasClass("calendar-initialized")) {
            $(_.$elements.calendarEl).addClass(
                "evo-calendar calendar-initialized sidebar-hide"
            );
            if (_.windowW <= _.$breakpoints.tablet) {
                // tablet/mobile
                _.toggleSidebar(false);
                _.toggleEventList(false);
            } else {
                if (!_.options.sidebarDisplayDefault) _.toggleSidebar(false);
                else _.toggleSidebar(true);

                if (!_.options.eventDisplayDefault) _.toggleEventList(false);
                else _.toggleEventList(true);
            }
            if (_.options.theme) _.setTheme(_.options.theme); // set calendar theme
            _.buildTheBones(); // start building the calendar components
        }
    };
    // v1.0.0 - Destroy plugin
    EvoCalendar.prototype.destroy = function () {
        var _ = this;
        // code here
        _.destroyEventListener();
        if (_.$elements.calendarEl) {
            _.$elements.calendarEl.removeClass("calendar-initialized");
            _.$elements.calendarEl.removeClass("evo-calendar");
            _.$elements.calendarEl.removeClass("sidebar-hide");
            _.$elements.calendarEl.removeClass("event-hide");
        }
        _.$elements.calendarEl.empty();
        _.$elements.calendarEl.attr("class", _.initials.default_class);
        $(_.$elements.calendarEl).trigger("destroy", [_]);
    };

    // v1.0.0 - Limit title (...)
    EvoCalendar.prototype.limitTitle = function (title, limit) {
        var newTitle = [];
        limit = limit === undefined ? 18 : limit;
        if (title.split(" ").join("").length > limit) {
            var t = title.split(" ");
            for (var i = 0; i < t.length; i++) {
                if (t[i].length + newTitle.join("").length <= limit) {
                    newTitle.push(t[i]);
                }
            }

            return newTitle.join(" ") + "...";
        }
        return title;
    };

    // v1.1.2 - Check and filter strings
    EvoCalendar.prototype.stringCheck = function (d) {
        return d.replace(/[^\w]/g, "\\$&");
    };

    // v1.0.0 - Parse format (date)
    EvoCalendar.prototype.parseFormat = function (format) {
        var _ = this;
        if (
            typeof format.toValue === "function" &&
            typeof format.toDisplay === "function"
        )
            return format;
        // IE treats \0 as a string end in inputs (truncating the value),
        // so it's a bad format delimiter, anyway
        var separators = format.replace(_.initials.validParts, "\0").split("\0"),
            parts = format.match(_.initials.validParts);
        if (!separators || !separators.length || !parts || parts.length === 0) {
            console.log(
                "%c Invalid date format ",
                "color:white;font-weight:bold;background-color:#e21d1d;"
            );
        }
        return { separators: separators, parts: parts };
    };

    // v1.0.0 - Format date
    EvoCalendar.prototype.formatDate = function (date, format, language) {
        var _ = this;
        if (!date) return "";
        language = language ? language : _.defaults.language;
        if (typeof format === "string") format = _.parseFormat(format);
        if (format.toDisplay) return format.toDisplay(date, format, language);

        var ndate = new Date(date);
        // if (!_.isValidDate(ndate)) { // test
        //     ndate = new Date(date.replace(/-/g, '/'))
        // }

        var val = {
            d: ndate.getDate(),
            D: _.initials.dates[language].daysShort[ndate.getDay()],
            DD: _.initials.dates[language].days[ndate.getDay()],
            m: ndate.getMonth() + 1,
            M: _.initials.dates[language].monthsShort[ndate.getMonth()],
            MM: _.initials.dates[language].months[ndate.getMonth()],
            yy: ndate.getFullYear().toString().substring(2),
            yyyy: ndate.getFullYear(),
        };

        val.dd = (val.d < 10 ? "0" : "") + val.d;
        val.mm = (val.m < 10 ? "0" : "") + val.m;
        date = [];
        var seps = $.extend([], format.separators);
        for (var i = 0, cnt = format.parts.length; i <= cnt; i++) {
            if (seps.length) date.push(seps.shift());
            date.push(val[format.parts[i]]);
        }
        return date.join("");
    };

    // v1.0.0 - Get dates between two dates
    EvoCalendar.prototype.getBetweenDates = function (dates) {
        var _ = this,
            betweenDates = [];
        for (var x = 0; x < _.monthLength; x++) {
            var active_date = _.formatDate(
                _.$label.months[_.$active.month] + " " + (x + 1) + " " + _.$active.year,
                _.options.format
            );
            if (_.isBetweenDates(active_date, dates)) {
                betweenDates.push(active_date);
            }
        }
        return betweenDates;
    };

    // v1.0.0 - Check if date is between the passed calendar date
    EvoCalendar.prototype.isBetweenDates = function (active_date, dates) {
        var sd, ed;
        if (dates instanceof Array) {
            sd = new Date(dates[0]);
            ed = new Date(dates[1]);
        } else {
            sd = new Date(dates);
            ed = new Date(dates);
        }
        if (sd <= new Date(active_date) && ed >= new Date(active_date)) {
            return true;
        }
        return false;
    };

    // v1.0.0 - Check if event has the same event type in the same date
    EvoCalendar.prototype.hasSameDayEventType = function (date, type) {
        var _ = this,
            eventLength = 0;

        for (var i = 0; i < _.options.calendarEvents.length; i++) {
            if (_.options.calendarEvents[i].date instanceof Array) {
                var arr = _.getBetweenDates(_.options.calendarEvents[i].date);
                for (var x = 0; x < arr.length; x++) {
                    if (date === arr[x] && type === _.options.calendarEvents[i].type) {
                        eventLength++;
                    }
                }
            } else {
                if (
                    date === _.options.calendarEvents[i].date &&
                    type === _.options.calendarEvents[i].type
                ) {
                    eventLength++;
                }
            }
        }

        if (eventLength > 0) {
            return true;
        }
        return false;
    };

    // v1.0.0 - Set calendar theme
    EvoCalendar.prototype.setTheme = function (themeName) {
        var _ = this;
        var prevTheme = _.options.theme;
        _.options.theme = themeName.toLowerCase().split(" ").join("-");

        if (_.options.theme) $(_.$elements.calendarEl).removeClass(prevTheme);
        if (_.options.theme !== "default")
            $(_.$elements.calendarEl).addClass(_.options.theme);
    };

    // v1.0.0 - Called in every resize
    EvoCalendar.prototype.resize = function () {
        var _ = this;
        _.windowW = $(window).width();

        if (_.windowW <= _.$breakpoints.tablet) {
            // tablet
            _.toggleSidebar(false);
            _.toggleEventList(false);

            if (_.windowW <= _.$breakpoints.mobile) {
                // mobile
                $(window).off("click.evocalendar.evo-" + _.instanceUid);
            } else {
                $(window).on(
                    "click.evocalendar.evo-" + _.instanceUid,
                    $.proxy(_.toggleOutside, _)
                );
            }
        } else {
            if (!_.options.sidebarDisplayDefault) _.toggleSidebar(false);
            else _.toggleSidebar(true);

            if (!_.options.eventDisplayDefault) _.toggleEventList(false);
            else _.toggleEventList(true);

            $(window).off("click.evocalendar.evo-" + _.instanceUid);
        }
    };

    // v1.0.0 - Initialize event listeners
    EvoCalendar.prototype.initEventListener = function () {
        var _ = this;

        // resize
        $(window)
            .off("resize.evocalendar.evo-" + _.instanceUid)
            .on("resize.evocalendar.evo-" + _.instanceUid, $.proxy(_.resize, _));

        // IF sidebarToggler: set event listener: toggleSidebar
        if (_.options.sidebarToggler) {
            _.$elements.sidebarToggler
                .off("click.evocalendar")
                .on("click.evocalendar", _.toggleSidebar);
        }

        // IF eventListToggler: set event listener: toggleEventList
        if (_.options.eventListToggler) {
            _.$elements.eventListToggler
                .off("click.evocalendar")
                .on("click.evocalendar", _.toggleEventList);
        }

        // set event listener for each month
        _.$elements.sidebarEl
            .find("[data-month-val]")
            .off("click.evocalendar")
            .on("click.evocalendar", _.selectMonth);

        // set event listener for year
        _.$elements.sidebarEl
            .find("[data-year-val]")
            .off("click.evocalendar")
            .on("click.evocalendar", _.selectYear);

        // set event listener for every event listed
        _.$elements.eventEl
            .find("[data-event-index]")
            .off("click.evocalendar")
            .on("click.evocalendar", _.selectEvent);
    };

    // v1.0.0 - Destroy event listeners
    EvoCalendar.prototype.destroyEventListener = function () {
        var _ = this;

        $(window).off("resize.evocalendar.evo-" + _.instanceUid);
        $(window).off("click.evocalendar.evo-" + _.instanceUid);

        // IF sidebarToggler: remove event listener: toggleSidebar
        if (_.options.sidebarToggler) {
            _.$elements.sidebarToggler.off("click.evocalendar");
        }

        // IF eventListToggler: remove event listener: toggleEventList
        if (_.options.eventListToggler) {
            _.$elements.eventListToggler.off("click.evocalendar");
        }

        // remove event listener for each day
        _.$elements.innerEl
            .find(".calendar-day")
            .children()
            .off("click.evocalendar");

        // remove event listener for each month
        _.$elements.sidebarEl.find("[data-month-val]").off("click.evocalendar");

        // remove event listener for year
        _.$elements.sidebarEl.find("[data-year-val]").off("click.evocalendar");

        // remove event listener for every event listed
        _.$elements.eventEl.find("[data-event-index]").off("click.evocalendar");
    };

    // v1.0.0 - Calculate days (incl. monthLength, startingDays based on :firstDayOfWeekName)
    EvoCalendar.prototype.calculateDays = function () {
        var _ = this,
            nameDays,
            weekStart,
            firstDay;
        _.monthLength = _.$label.days_in_month[_.$active.month]; // find number of days in month
        if (_.$active.month == 1) {
            // compensate for leap year - february only!
            if (
                (_.$active.year % 4 == 0 && _.$active.year % 100 != 0) ||
                _.$active.year % 400 == 0
            ) {
                _.monthLength = 29;
            }
        }
        nameDays = _.initials.dates[_.options.language].daysShort;
        weekStart = _.options.firstDayOfWeek;

        while (_.$label.days.length < nameDays.length) {
            if (weekStart == nameDays.length) {
                weekStart = 0;
            }
            _.$label.days.push(nameDays[weekStart]);
            weekStart++;
        }
        firstDay = new Date(_.$active.year, _.$active.month).getDay() - weekStart;
        _.startingDay = firstDay < 0 ? _.$label.days.length + firstDay : firstDay;
    };

    // v1.0.0 - Build the bones! (incl. sidebar, inner, events), called once in every initialization
    EvoCalendar.prototype.buildTheBones = function () {
        var _ = this;
        _.calculateDays();

        if (!_.$elements.calendarEl.html()) {
            var markup;

            // --- BUILDING MARKUP BEGINS --- //

            // sidebar
            markup =
                '<div class="calendar-sidebar">' +
                '<div class="calendar-year">' +
                '<button class="icon-button" role="button" data-year-val="prev" title="' +
                _.initials.dates[_.options.language].previousYearText +
                '">' +
                '<span class="chevron-arrow-left"></span>' +
                "</button>" +
                "&nbsp;<p></p>&nbsp;" +
                '<button class="icon-button" role="button" data-year-val="next" title="' +
                _.initials.dates[_.options.language].nextYearText +
                '">' +
                '<span class="chevron-arrow-right"></span>' +
                "</button>" +
                '</div><div class="month-list">' +
                '<ul class="calendar-months">';
            for (var i = 0; i < _.$label.months.length; i++) {
                markup +=
                    '<li class="month" role="button" data-month-val="' +
                    i +
                    '" onclick="monthChange(' + i + ')">' +
                    _.initials.dates[_.options.language].months[i] +
                    "</li>";
            }
            markup += "</ul>";
            markup += "</div></div>";

            // inner
            markup +=
                '<div class="calendar-inner">' +
                '<table class="calendar-table">' +
                '<tr ><th colspan="6"></th><td class="hijri_date"></td></tr>' +
                '<tr class="calendar-header">';
            for (var i = 0; i < _.$label.days.length; i++) {
                var headerClass = "calendar-header-day";
                if (
                    _.$label.days[i] === _.initials.weekends.sat ||
                    _.$label.days[i] === _.initials.weekends.sun
                ) {
                    headerClass += " --weekend";
                }
                markup +=
                    '<td class="' + headerClass + '">' + _.$label.days[i] + "</td>";
            }
            markup += "</tr></table>" + "</div>";

            // events
            markup +=
                '<div class="calendar-events"><div class="target-box"  ><table class="target" id="OwnerTargetBox">'
            markup += '<tr><td colspan="6"><h3>BOOKING TARGET</h3></td></tr>'
            markup += '<tr>'
            markup += '<th rowspan="2">A</th>'
            markup += '<td><i class="fas fa-sun"></i></td>'
            markup += '<td id="mor_target_a">0</td>'
            markup += '<th rowspan="2">B</th>'
            markup += '<td><i class="fas fa-sun"></i></td>'
            markup += '<td id="mor_target_b">0</td>'
            markup += '</tr>'
            markup += '<tr>'
            markup += '<td><i class="fas fa-moon"></i></td>'
            markup += '<td id="eve_target_a" >0</td>'
            markup += '<td><i class="fas fa-moon"></i></td>'
            markup += '<td id="eve_target_b" >0</td>'
            markup += ' </tr>'
            markup += '</table></div>' +
                '<div class="event-header"><p></p><span id="islDate"></span></div>' +
                '<div class="event-list"></div>' +
                ' <div class="action_btns mt-3"><button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="add_event">Inquiry</button><button  type="button" class="btn btn-success"style="margin-left:5px" data-bs-toggle="modal" data-bs-target="#booking_modal" id="add_event" onclick="BookingEventHandler()">Booking</button></div></div>';

            // --- Finally, build it now! --- //
            _.$elements.calendarEl.html(markup);

            if (!_.$elements.sidebarEl)
                _.$elements.sidebarEl = $(_.$elements.calendarEl).find(
                    ".calendar-sidebar"
                );
            if (!_.$elements.innerEl)
                _.$elements.innerEl = $(_.$elements.calendarEl).find(".calendar-inner");
            if (!_.$elements.eventEl)
                _.$elements.eventEl = $(_.$elements.calendarEl).find(
                    ".calendar-events"
                );

            // if: _.options.sidebarToggler
            if (_.options.sidebarToggler) {
                $(_.$elements.sidebarEl).append(
                    '<span id="sidebarToggler" onclick="togglemonthsSidebar()" role="button" aria-pressed title="' +
                    _.initials.dates[_.options.language].closeSidebarText +
                    '"><button class="icon-button"><span class="bars"></span></button></span>'
                );
                if (!_.$elements.sidebarToggler)
                    _.$elements.sidebarToggler = $(_.$elements.sidebarEl).find(
                        "span#sidebarToggler"
                    );
            }
            if (_.options.eventListToggler) {
                $(_.$elements.calendarEl).append(
                    '<span id="eventListToggler" onclick="toggleSideBar()" role="button" aria-pressed title="' +
                    _.initials.dates[_.options.language].closeEventListText +
                    '"><button class="icon-button"><span class="chevron-arrow-right"></span></button></span>'
                );
                if (!_.$elements.eventListToggler)
                    _.$elements.eventListToggler = $(_.$elements.calendarEl).find(
                        "span#eventListToggler"
                    );
            }
        }

        _.buildSidebarYear();
        _.buildSidebarMonths();
        _.buildCalendar();
        _.buildEventList();
        _.initEventListener(); // test

        _.resize();
    };

    // v1.0.0 - Build Event: Event list
    EvoCalendar.prototype.buildEventList = function () {
        var _ = this,
            markup,
            hasEventToday = false;

        _.$active.events = [];
        // Event date
        var title = _.formatDate(
            _.$active.date,
            _.options.eventHeaderFormat,
            _.options.language
        );
        _.$elements.eventEl.find(".event-header > p").text(title);
        $("#booking_event_date").html(title);
        // Event list
        var eventListEl = _.$elements.eventEl.find(".event-list");
        // Clear event list item(s)
        if (eventListEl.children().length > 0) eventListEl.empty();
        if (_.options.calendarEvents) {
            for (var i = 0; i < _.options.calendarEvents.length; i++) {
                if (
                    _.isBetweenDates(_.$active.date, _.options.calendarEvents[i].date)
                ) {
                    eventAdder(_.options.calendarEvents[i]);
                } else if (_.options.calendarEvents[i].everyYear) {
                    var d =
                        new Date(_.$active.date).getMonth() +
                        1 +
                        " " +
                        new Date(_.$active.date).getDate();
                    var dd =
                        new Date(_.options.calendarEvents[i].date).getMonth() +
                        1 +
                        " " +
                        new Date(_.options.calendarEvents[i].date).getDate();
                    // var dates = [_.formatDate(_.options.calendarEvents[i].date[0], 'mm/dd'), _.formatDate(_.options.calendarEvents[i].date[1], 'mm/dd')];

                    if (d == dd) {
                        eventAdder(_.options.calendarEvents[i]);
                    }
                }
            }
        }

        function eventAdder(event) {
            hasEventToday = true;
            _.addEventList(event);
        }
        // IF: no event for the selected date
        // if (!hasEventToday) {
        //   markup = '<div class="event-empty">';
        //   if (_.$active.date === _.$current.date) {
        //     markup +=
        //       "<p>" + _.initials.dates[_.options.language].noEventForToday + "</p>";
        //   } else {
        //     markup +=
        //       "<p>" +
        //       _.initials.dates[_.options.language].noEventForThisDay +
        //       "</p>";
        //   }
        //   markup += "</div>";
        // }
        eventListEl.append(markup);
    };

    // v1.0.0 - Add single event to event list
    EvoCalendar.prototype.addEventList = function (event_data) {
        var _ = this,
            markup;
        var eventListEl = _.$elements.eventEl.find(".event-list");
        if (eventListEl.find("[data-event-index]").length === 0)
            eventListEl.empty();
        _.$active.events.push(event_data);
        markup =
            '<div class="event-container" role="button" data-event-index="' +
            event_data.id +
            '">';
        markup +=
            '<div class="event-icon"><div class="event-bullet-' +
            event_data.type +
            '"';
        if (event_data.color) {
            markup += 'style="background-color:' + event_data.color + '"';
        }
        markup +=
            '></div></div><div class="event-info"><p class="event-title">' +
            _.limitTitle(event_data.name);
        if (event_data.badge) markup += "<span>" + event_data.badge + "</span>";
        markup += "</p>";
        if (event_data.description)
            markup += '<p class="event-desc">' + event_data.description + "</p>";
        markup +=
            ' <button type="button" class="btn btn-success" id="' +
            event_data.id +
            '" onclick="editInquiryEvent(this.id)">Edit</button>';
        markup +=
            '</div>';
        markup += "</div>";
        eventListEl.append(markup);

        _.$elements.eventEl
            .find('[data-event-index="' + event_data.id + '"]')
            .off("click.evocalendar")
            .on("click.evocalendar", _.selectEvent);
    };
    // v1.0.0 - Remove single event to event list
    EvoCalendar.prototype.removeEventList = function (event_data) {
        var _ = this,
            markup;
        var eventListEl = _.$elements.eventEl.find(".event-list");
        if (
            eventListEl.find('[data-event-index="' + event_data + '"]').length === 0
        )
            return; // event not in active events
        eventListEl.find('[data-event-index="' + event_data + '"]').remove();
        if (eventListEl.find("[data-event-index]").length === 0) {
            eventListEl.empty();
            if (_.$active.date === _.$current.date) {
                markup +=
                    "<p>" + _.initials.dates[_.options.language].noEventForToday + "</p>";
            } else {
                markup +=
                    "<p>" +
                    _.initials.dates[_.options.language].noEventForThisDay +
                    "</p>";
            }
            eventListEl.append(markup);
        }
    };

    // v1.0.0 - Build Sidebar: Year text
    EvoCalendar.prototype.buildSidebarYear = function () {
        var _ = this;

        _.$elements.sidebarEl.find(".calendar-year > p").text(_.$active.year);
    };

    // v1.0.0 - Build Sidebar: Months list text
    EvoCalendar.prototype.buildSidebarMonths = function () {
        var _ = this;

        _.$elements.sidebarEl
            .find(".calendar-months > [data-month-val]")
            .removeClass("active-month");
        _.$elements.sidebarEl
            .find('.calendar-months > [data-month-val="' + _.$active.month + '"]')
            .addClass("active-month");
    };

    // v1.0.0 - Build Calendar: Title, Days
    EvoCalendar.prototype.buildCalendar = function () {
        var _ = this,
            markup,
            title;

        _.calculateDays();

        title = _.formatDate(
            new Date(_.$label.months[_.$active.month] + " 1 " + _.$active.year),
            _.options.titleFormat,
            _.options.language
        );
        _.$elements.innerEl.find(".calendar-table th").text(title);

        _.$elements.innerEl.find(".calendar-body").remove(); // Clear days

        markup += '<tr class="calendar-body">';
        var day = 1;
        for (var i = 0; i < 9; i++) {
            // this loop is for is weeks (rows)
            for (var j = 0; j < _.$label.days.length; j++) {
                // this loop is for weekdays (cells)
                if (day <= _.monthLength && (i > 0 || j >= _.startingDay)) {
                    var dayClass = "calendar-day";
                    if (
                        _.$label.days[j] === _.initials.weekends.sat ||
                        _.$label.days[j] === _.initials.weekends.sun
                    ) {
                        dayClass += " --weekend"; // add '--weekend' to sat sun
                    }
                    markup += '<td class="' + dayClass + '">';

                    var thisDay = _.formatDate(
                        _.$label.months[_.$active.month] + " " + day + " " + _.$active.year,
                        _.options.format
                    );
                    // var islamic_url = 'http://api.aladhan.com/v1/gToH?date=' +thisDay;
                    // // fetch(islamic_url){}
                    // fetch(islamic_url)
                    // .then(response => response.json())
                    // .then(json => console.log(json))

                    // let url = 'http://api.aladhan.com/v1/gToH?date='+thisDay;

                    // fetch(url)
                    // .then(res => res.json())
                    // .then((out) => {
                    // var first_date_year = out.data.hijri.date.substring(0,2);
                    // // console.log('Checkout this JSON! ', first_date_year);
                    // // alert(first_date_year)

                    // })
                    // .catch(err => { throw err });
                    markup +=
                        '<div class="day" role="button" data-date-val="' +
                        thisDay +
                        '" id="' +
                        thisDay +
                        '" onclick="hello(this.id)"><div class="data_show"><span class="iconb" id="moonb' + thisDay + '"></span>' +
                        day +
                        "</div><span class='moon_icon' id='moon" + thisDay + "'></span></div>";

                    day++;
                    changeTargetBorder(thisDay)
                } else {
                    markup += "<td>";
                }
                markup += "</td>";
            }
            if (day > _.monthLength) {
                break; // stop making rows if we've run out of days
            } else {
                markup += '</tr><tr class="calendar-body">'; // add if not
            }
        }
        markup += "</tr>";
        _.$elements.innerEl.find(".calendar-table").append(markup);

        if (_.options.todayHighlight) {
            _.$elements.innerEl
                .find("[data-date-val='" + _.$current.date + "']")
                .addClass("calendar-today");
        }

        // set event listener for each day
        _.$elements.innerEl
            .find(".calendar-day")
            .children()
            .off("click.evocalendar")
            .on("click.evocalendar", _.selectDate);

        var selectedDate = _.$elements.innerEl.find(
            "[data-date-val='" + _.$active.date + "']"
        );

        if (selectedDate) {
            // Remove active class to all
            _.$elements.innerEl.children().removeClass("calendar-active");
            // Add active class to selected date
            selectedDate.addClass("calendar-active");
        }
        if (_.options.calendarEvents != null) {
            // For event indicator (dots)
            _.buildEventIndicator();
        }
    };

    // v1.0.0 - Add event indicator/s (dots)
    EvoCalendar.prototype.addEventIndicator = function (event) {
        // var _ = this,
        //   htmlToAppend,
        //   thisDate;
        // var event_date = event.date;
        // var type = _.stringCheck(event.type);

        // if (event_date instanceof Array) {
        //   if (event.everyYear) {
        //     for (var x = 0; x < event_date.length; x++) {
        //       event_date[x] = _.formatDate(
        //         new Date(event_date[x]).setFullYear(_.$active.year),
        //         _.options.format
        //       );
        //     }
        //   }
        //   var active_date = _.getBetweenDates(event_date);

        //   for (var i = 0; i < active_date.length; i++) {
        //     appendDot(active_date[i]);
        //   }
        // } else {
        //   if (event.everyYear) {
        //     event_date = _.formatDate(
        //       new Date(event_date).setFullYear(_.$active.year),
        //       _.options.format
        //     );
        //   }
        //   // console.log("type-bullet=>",$(".type-bullet").length)
        //   appendDot(event_date);
        // }

        // function appendDot(date) {
        //   thisDate = _.$elements.innerEl.find('[data-date-val="' + date + '"]');

        //   if (thisDate.find("span.event-indicator").length === 0) {
        //     thisDate.append('<span class="event-indicator"></span>');
        //   }

        //   if (
        //     thisDate.find("span.event-indicator > .type-bullet > .type-" + type)
        //       .length === 0
        //   ) {
        //     htmlToAppend = '<div class="type-bullet"><div ';

        //     htmlToAppend += 'class="type-' + event.type + '"';
        //     if (event.color) {
        //       htmlToAppend += 'style="background-color:' + event.color + '"';
        //     }
        //     htmlToAppend += "></div></div>";
        //     thisDate.find(".event-indicator").append(htmlToAppend);
        //   }
        // }
    };

    // v1.0.0 - Remove event indicator/s (dots)
    EvoCalendar.prototype.removeEventIndicator = function (event) {
        var _ = this;
        var event_date = event.date;
        var type = _.stringCheck(event.type);

        if (event_date instanceof Array) {
            var active_date = _.getBetweenDates(event_date);

            for (var i = 0; i < active_date.length; i++) {
                removeDot(active_date[i]);
            }
        } else {
            removeDot(event_date);
        }

        function removeDot(date) {
            // Check if no '.event-indicator', 'cause nothing to remove
            if (
                _.$elements.innerEl.find(
                    '[data-date-val="' + date + '"] span.event-indicator'
                ).length === 0
            ) {
                return;
            }

            // // If has no type of event, then delete
            if (!_.hasSameDayEventType(date, type)) {
                _.$elements.innerEl
                    .find(
                        '[data-date-val="' +
                        date +
                        '"] span.event-indicator > .type-bullet > .type-' +
                        type
                    )
                    .parent()
                    .remove();
            }
        }
    };

    /****************
     *    METHODS    *
     ****************/

    // v1.0.0 - Build event indicator on each date
    EvoCalendar.prototype.buildEventIndicator = function () {
        var _ = this;

        // prevent duplication
        _.$elements.innerEl.find(".calendar-day > day > .event-indicator").empty();

        for (var i = 0; i < _.options.calendarEvents.length; i++) {
            _.addEventIndicator(_.options.calendarEvents[i]);
            // console.log(_.options.calendarEvents[i].date)

        }
    };

    // v1.0.0 - Select event
    EvoCalendar.prototype.selectEvent = function (event) {
        var _ = this;
        var el = $(event.target).closest(".event-container");
        var id = $(el).data("eventIndex").toString();
        var index = _.options.calendarEvents
            .map(function (event) {
                return event.id.toString();
            })
            .indexOf(id);
        var modified_event = _.options.calendarEvents[index];
        if (modified_event.date instanceof Array) {
            modified_event.dates_range = _.getBetweenDates(modified_event.date);
        }
        $(_.$elements.calendarEl).trigger("selectEvent", [
            _.options.calendarEvents[index],
        ]);
    };

    // v1.0.0 - Select year
    EvoCalendar.prototype.selectYear = function (event) {
        var _ = this;
        var el, yearVal;

        if (typeof event === "string" || typeof event === "number") {
            if (parseInt(event).toString().length === 4) {
                yearVal = parseInt(event);
            }
        } else {
            el = $(event.target).closest("[data-year-val]");
            yearVal = $(el).data("yearVal");
        }

        if (yearVal == "prev") {
            --_.$active.year;
        } else if (yearVal == "next") {
            ++_.$active.year;
        } else if (typeof yearVal === "number") {
            _.$active.year = yearVal;
        }

        if (_.windowW <= _.$breakpoints.mobile) {
            if (_.$UI.hasSidebar) _.toggleSidebar(false);
        }

        $(_.$elements.calendarEl).trigger("selectYear", [_.$active.year]);

        _.buildSidebarYear();
        _.buildCalendar();
    };

    // v1.0.0 - Select month
    EvoCalendar.prototype.selectMonth = function (event) {
        var _ = this;

        if (typeof event === "string" || typeof event === "number") {
            if (event >= 0 && event <= _.$label.months.length) {
                // if: 0-11
                _.$active.month = event.toString();
            }
        } else {
            // if month is manually selected
            _.$active.month = $(event.currentTarget).data("monthVal");
        }

        _.buildSidebarMonths();
        _.buildCalendar();

        if (_.windowW <= _.$breakpoints.tablet) {
            if (_.$UI.hasSidebar) _.toggleSidebar(false);
        }

        // EVENT FIRED: selectMonth
        $(_.$elements.calendarEl).trigger("selectMonth", [
            _.initials.dates[_.options.language].months[_.$active.month],
            _.$active.month,
        ]);
    };

    // v1.0.0 - Select specific date
    EvoCalendar.prototype.selectDate = function (event) {
        var _ = this;
        var oldDate = _.$active.date;
        var date, year, month, activeDayEl, isSameDate;

        if (
            typeof event === "string" ||
            typeof event === "number" ||
            event instanceof Date
        ) {
            date = _.formatDate(new Date(event), _.options.format);
            year = new Date(date).getFullYear();
            month = new Date(date).getMonth();

            if (_.$active.year !== year) _.selectYear(year);
            if (_.$active.month !== month) _.selectMonth(month);
            activeDayEl = _.$elements.innerEl.find("[data-date-val='" + date + "']");
        } else {
            activeDayEl = $(event.currentTarget);
            date = activeDayEl.data("dateVal");
        }
        isSameDate = _.$active.date === date;
        // Set new active date
        _.$active.date = date;
        _.$active.event_date = date;
        // Remove active class to all
        _.$elements.innerEl.find("[data-date-val]").removeClass("calendar-active");
        // Add active class to selected date
        activeDayEl.addClass("calendar-active");

        // Build event list if not the same date events built
        if (!isSameDate) _.buildEventList();

        // EVENT FIRED: selectDate
        $(_.$elements.calendarEl).trigger("selectDate", [_.$active.date, oldDate]);
    };

    // v1.0.0 - Return active date
    EvoCalendar.prototype.getActiveDate = function () {
        var _ = this;
        return _.$active.date;
    };

    // v1.0.0 - Return active events
    EvoCalendar.prototype.getActiveEvents = function () {
        var _ = this;
        return _.$active.events;
    };

    // v1.0.0 - Hide Sidebar/Event List if clicked outside
    EvoCalendar.prototype.toggleOutside = function (event) {
        var _ = this,
            isInnerClicked;

        isInnerClicked = event.target === _.$elements.innerEl[0];

        if (_.$UI.hasSidebar && isInnerClicked) _.toggleSidebar(false);
        if (_.$UI.hasEvent && isInnerClicked) _.toggleEventList(false);
    };

    // v1.0.0 - Toggle Sidebar
    EvoCalendar.prototype.toggleSidebar = function (event) {
        var _ = this;

        if (event === undefined || event.originalEvent) {
            $(_.$elements.calendarEl).toggleClass("sidebar-hide");
            _.$UI.hasSidebar = !_.$UI.hasSidebar;
        } else {
            if (!event) {
                $(_.$elements.calendarEl).removeClass("sidebar-hide");
                _.$UI.hasSidebar = true;
            } else {
                $(_.$elements.calendarEl).addClass("sidebar-hide");
                _.$UI.hasSidebar = false;
            }
        }

        if (_.windowW <= _.$breakpoints.tablet) {
            if (_.$UI.hasSidebar && _.$UI.hasEvent) _.toggleEventList();
        }
    };

    // v1.0.0 - Toggle Event list
    EvoCalendar.prototype.toggleEventList = function (event) {
        var _ = this;

        if (event === undefined || event.originalEvent) {
            $(_.$elements.calendarEl).toggleClass("event-hide");
            _.$UI.hasEvent = !_.$UI.hasEvent;
        } else {
            if (!event) {
                $(_.$elements.calendarEl).removeClass("event-hide");
                _.$UI.hasEvent = true;
            } else {
                $(_.$elements.calendarEl).addClass("event-hide");
                _.$UI.hasEvent = false;
            }
        }

        if (_.windowW <= _.$breakpoints.tablet) {
            if (_.$UI.hasEvent && _.$UI.hasSidebar) _.toggleSidebar();
        }
    };

    // v1.0.0 - Add Calendar Event(s)
    EvoCalendar.prototype.addCalendarEvent = function (arr) {
        var _ = this;

        function addEvent(data) {
            if (!data.id) {
                console.log(
                    '%c Event named: "' + data.name + "\" doesn't have a unique ID ",
                    "color:white;font-weight:bold;background-color:#e21d1d;"
                );
            }

            if (data.date instanceof Array) {
                for (var j = 0; j < data.date.length; j++) {
                    if (isDateValid(data.date[j])) {
                        data.date[j] = _.formatDate(
                            new Date(data.date[j]),
                            _.options.format
                        );
                    }
                }
            } else {
                if (isDateValid(data.date)) {
                    data.date = _.formatDate(new Date(data.date), _.options.format);
                }
            }

            if (!_.options.calendarEvents) _.options.calendarEvents = [];
            _.options.calendarEvents.push(data);
            // add to date's indicator
            _.addEventIndicator(data);
            // add to event list IF active.event_date === data.date
            if (_.$active.event_date === data.date) _.addEventList(data);
            // _.$elements.innerEl.find("[data-date-val='" + data.date + "']")

            function isDateValid(date) {
                if (_.isValidDate(date)) {
                    return true;
                } else {
                    console.log(
                        '%c Event named: "' + data.name + '" has invalid date ',
                        "color:white;font-weight:bold;background-color:#e21d1d;"
                    );
                }
                return false;
            }
        }
        if (arr instanceof Array) {
            // Arrays of events
            for (var i = 0; i < arr.length; i++) {
                addEvent(arr[i]);
            }
        } else if (typeof arr === "object") {
            // Single event
            addEvent(arr);
        }
    };

    // v1.0.0 - Remove Calendar Event(s)
    EvoCalendar.prototype.removeCalendarEvent = function (arr) {
        var _ = this;

        function deleteEvent(data) {
            // Array index
            var index = _.options.calendarEvents
                .map(function (event) {
                    return event.id;
                })
                .indexOf(data);

            if (index >= 0) {
                var event = _.options.calendarEvents[index];
                // Remove event from calendar events
                _.options.calendarEvents.splice(index, 1);
                // remove to event list
                _.removeEventList(data);
                // remove event indicator
                _.removeEventIndicator(event);
            } else {
                console.log(
                    "%c " + data + ": ID not found ",
                    "color:white;font-weight:bold;background-color:#e21d1d;"
                );
            }
        }
        if (arr instanceof Array) {
            // Arrays of index
            for (var i = 0; i < arr.length; i++) {
                deleteEvent(arr[i]);
            }
        } else {
            // Single index
            deleteEvent(arr);
        }
    };

    // v1.0.0 - Check if date is valid
    EvoCalendar.prototype.isValidDate = function (d) {
        return new Date(d) && !isNaN(new Date(d).getTime());
    };

    $.fn.evoCalendar = function () {
        var _ = this,
            opt = arguments[0],
            args = Array.prototype.slice.call(arguments, 1),
            l = _.length,
            i,
            ret;
        for (i = 0; i < l; i++) {
            if (typeof opt == "object" || typeof opt == "undefined")
                _[i].evoCalendar = new EvoCalendar(_[i], opt);
            else ret = _[i].evoCalendar[opt].apply(_[i].evoCalendar, args);
            if (typeof ret != "undefined") return ret;
        }
        return _;
    };
});

// document.getElementsByClassName("day").addEventListener("click",()=>{
//     console.log("hello world")
// })

let html = "";

function hello(selectDate) {
    html = "";
    $("#booking_view").html(html);

    let splitDate = selectDate.split("-");
    let month = splitDate[0];
    let date = splitDate[1];
    let year = splitDate[2];
    let isl_date = "";
    let isl_month = "";
    let isl_year = "";
    var weekday = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
    ];
    dayDate = month + "-" + date + "-" + year;
    let a = new Date(dayDate);
    let dayName = weekday[a.getDay()];
    // $("#booking_event_date").html(selectDate);
    let url =
        "https://api.aladhan.com/v1/gToH?date=" + date + "-" + month + "-" + year;

    fetch(url)
        .then((res) => res.json())
        .then((out) => {
            isl_date = out.data.hijri.day;
            isl_month = out.data.hijri.month.ar;
            isl_year = out.data.hijri.year;
            //   alert(first_date_year)
            $(".event-header > span").html(
                isl_date + "-" + isl_month + "-" + isl_year
            );
            $(".hijri_date").html(isl_date + "-" + isl_month + "-" + isl_year);
        })
        .then(() => {
            $("#On_event_date").val(year + "-" + month + "-" + date);
            $("#booking_program_date").val(year + "-" + month + "-" + date);
            $("#islDateInput").val($(".hijri_date").html());
            $("#bookIslDate").val($(".hijri_date").html());
            $("#booking_program_day").val(dayName);
        })
        .catch((err) => {
            throw err;
        });

    showBookings(selectDate);
    showEventsBar()

}

const showBookings = (selectDate) => {
    let splitDate = selectDate.split("-");
    let month = splitDate[0];
    let date = splitDate[1];
    let year = splitDate[2];
    let convertDate = year + "-" + month + "-" + date;
    let FetchEventObj = {
        eventDate: convertDate,
    };
    fetch("https://vesapi.ves-engr.com/api-fetch-booking.php", {
        method: "POST",
        body: JSON.stringify(FetchEventObj),
    })
        .then((result) => {
            return result.json();
        })
        .then((data) => {
            if (data.length > 0) {
                for (let i = 0; i < data.length; i++) {
                    let adv_amnt = data[i].advanceAmount;
                    let booking_amnt = data[i].bookingAmount;
                    let booking_ = (date = data[i].bookingDate);
                    let booking_id = data[i].booking_id;
                    let eventDate = data[i].eventDate;
                    let eventDay = data[i].eventDay;
                    let eventName = data[i].eventName;
                    let eventShift = data[i].eventShift;
                    let hallportion = data[i].hallportion;
                    let personAddress = data[i].personAddress;
                    let personCinc = data[i].personCinc;
                    let personContact = data[i].personContact;
                    let personEmail = data[i].personEmail;
                    let personName = data[i].personName;
                    let totalGuest = data[i].totalGuest;
                    let totalPrice = data[i].totalPrice;
                    html +=
                        "<div class='event-container'role='button' data-event-index='19'>";
                    html += "<div class='event-icon'>";
                    html +=
                        "<div class='event-bullet-19' style='background-color: red'></div></div>";

                    html += "<div class='event-info'>";
                    html += "<p class='event-title'>" + eventName + "</p>";
                    html +=
                        "<p class='event-desc'>Hall: " +
                        hallportion +
                        "<br />Booking Price: " +
                        booking_amnt +
                        " <br />Advance: " +
                        adv_amnt +
                        " <br />Conact:" +
                        personContact +
                        "</p>";
                    html +=
                        "<button type='button' class='btn btn-success ' id='" +
                        booking_id +
                        "' onclick='bookEditEvent(this.id)'>Edit </button><button type='button' class='btn btn-primary' id='" +
                        booking_id +
                        "' onclick='balancePayment(this.id)'>Add Balance</button>";

                    html += "<button type='button' class='btn btn-danger' id='" +
                        booking_id +
                        "' onclick='addPackages(this.id)'>Add Packges</button></div></div>";
                    $("#booking_view").html(html);
                }
            }
        })
        .catch((err) => {
            throw err;
        });

    // show target
    let pushTargetDateObj = {
        targetDate: convertDate,
    };
    let html_setTarget =
        ' <table class="text-center">'
    fetch("https://vesapi.ves-engr.com/api-target-fetch.php", {
        method: "POST",
        body: JSON.stringify(pushTargetDateObj),
    })
        .then((result) => {
            return result.json();
        })
        .then((data) => {
            if (data.length > 0) {
                for (let i = 0; i < data.length; i++) {
                    if (data[i].selectHall === "a" && data[i].selectShift === "morning") {
                        // html_setTarget += "<tr>";
                        // html_setTarget += '<td rowspan="2">A</td>';
                        // html_setTarget += '<td><i class="fas fa-sun"></i></td>';
                        // html_setTarget += '<td >' + data[i].target_price + "</td>";
                        // html_setTarget += "</tr>";
                        $("#mor_target_a").html(data[i].target_price)

                    } else if (data[i].selectHall === "a" && data[i].selectShift === "evening") {
                        // html_setTarget += "<tr>";
                        // // html_setTarget += '<td >A</td>';
                        // html_setTarget += '<td ><i class="fas fa-moon"></i></td>';
                        // html_setTarget += '<td >' + data[i].target_price + "</td>";
                        // html_setTarget += "</tr>";
                        $("#eve_target_a").html(data[i].target_price)

                    } else if (data[i].selectHall === "b" && data[i].selectShift === "morning") {
                        // html_setTarget += "<tr>";
                        // html_setTarget += '<td  rowspan="2">B</td>';
                        // html_setTarget += '<td><i class="fas fa-sun"></i></td>';
                        // html_setTarget += '<td >' + data[i].target_price + "</td>";
                        // html_setTarget += "</tr>";
                        $("#mor_target_b").html(data[i].target_price)

                    } else if (
                        data[i].selectHall === "b" &&
                        data[i].selectShift === "evening"
                    ) {
                        // html_setTarget += "<tr>";
                        // // html_setTarget += '<td >B</td>';
                        // html_setTarget +=
                        //     '<td ><i class="fas fa-moon"></i></td>';
                        // html_setTarget +=
                        //     '<td >' + data[i].target_price + "</td>";
                        // html_setTarget += "</tr>";
                        $("#eve_target_b").html(data[i].target_price)

                    }
                }
            }
            else {
                // html_setTarget = "";
                // $("#OwnerTargetBox").html("");
                // console.log("empty")
                $("#mor_target_a").html("0")
                $("#mor_target_b").html("0")
                $("#eve_target_a").html("0")
                $("#eve_target_b").html("0")

            }
        })
        // .then(() => $("#OwnerTargetBox").html(html_setTarget))
        .catch((err) => {
            throw err;
        });
};

const deleteInquiryEvent = (delId) => {
    let delIdObj = {
        inqid: delId,
    };
    if (confirm("do you want to delete?")) {
        fetch("https://vesapi.ves-engr.com/api-delete.php", {
            method: "POST",
            body: JSON.stringify(delIdObj),
        })
            .then((result) => {
                result.json();
            })
            .catch((err) => {
                throw err;
            });
        location.reload();
    }
};

const editInquiryEvent = (editId) => {
    let editIdObj = {
        inqid: editId,
    };
    $("#edit_inq_id_concat").val("MHS-SM-" + (1000 + parseInt(editId)));
    $("#edit_id").val(editId);
    fetch("https://vesapi.ves-engr.com/api-fetch.php", {
        method: "POST",
        body: JSON.stringify(editIdObj),
    })
        .then((result) => {
            return result.json();
            // console.log(editData);
        })
        .then((data) => {
            $("#Edit_On_event_date").val(data[0].inquery_date);
            $("#editIslDate").val(data[0].hijridate);
            $("#editPartyName").val(data[0].personName);
            $("#editAddress").val(data[0].personAddress);
            $("#edit_contact").val(data[0].personContact);
            $("#editCnic").val(data[0].personCinc);
            $("#editemail").val(data[0].personEmail);
            $("#edit_event_name").val(data[0].event_name);
            $("#edit_event_cost").val(data[0].estimated_cost);
            $("#edit_event_number_guest").val(data[0].totalGuest);

            if (data[0].hallportion === "a") {
                $("#edit_b").prop("checked", false);
                $("#edit_a").prop("checked", true);
            } else {
                $("#edit_a").prop("checked", false);
                $("#edit_b").prop("checked", true);
            }
            if (data[0].hall_shift === "morning") {
                $("#edit_evening").prop("checked", false);
                $("#edit_moning").prop("checked", true);
            } else {
                $("#edit_moning").prop("checked", false);
                $("#edit_evening").prop("checked", true);
            }
            $("#inq_print").html('<a href="screen/print_inquiry.html?id=' + editId + '" target="_blank" class="btn btn-primary ml-4">Go to Print</a>')
            $("#editModal").modal("show");
        })
        .catch((err) => {
            throw err;
        });
};

const BookingEventHandler = () => {
    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var output =
        d.getFullYear() +
        "-" +
        (month < 10 ? "0" : "") +
        month +
        "-" +
        (day < 10 ? "0" : "") +
        day;
    $("#booking_date").val(output);
    // $("#booking_program_date").val(output);

};

const bookEditEvent = (editId) => {
    let editBookingIdObj = {
        bookId: editId,
    };
    $("#edit_id").val(editBookingIdObj);
    fetch("https://vesapi.ves-engr.com/api-fetchId-booking.php", {
        method: "POST",
        body: JSON.stringify(editBookingIdObj),
    })
        .then((result) => {
            return result.json();
        })
        .then((data) => {
            $("#edit_booking_id").val(data[0].booking_id);
            $("#edit_booking_id_concat").val("MHS-SM-" + (1000 + parseInt(editId)));
            $("#booking_edit_date").val(data[0].bookingDate);
            $("#booking_edit_program_date").val(data[0].eventDate);
            $("#booking_edit_program_day").val(data[0].eventDay);
            $("#editbookIslDate").val(data[0].hijriDate);
            $("#edit_booking_party_name").val(data[0].personName);
            $("#edit_booking_address").val(data[0].personAddress);
            $("#edit_booking_cell_no").val(data[0].personContact);
            $("#editbookingcnic").val(data[0].personCinc);
            $("#editbookingEmail").val(data[0].personEmail);
            $("#edit_booking_event_name").val(data[0].eventName);
            $("#editbookAmnt").val(data[0].bookingAmount);
            $("#edit_booking_advance").val(data[0].advanceAmount);
            $("#edit_booking_no_of_guests").val(data[0].totalGuest);
            if (data[0].hallportion === "a") {
                $("#edit_book_b").prop("checked", false);
                $("#edit_book_a").prop("checked", true);
            } else {
                $("#edit_book_a").prop("checked", false);
                $("#edit_book_b").prop("checked", true);
            }
            if (data[0].eventShift === "morning") {
                $("#editevening").prop("checked", false);
                $("#editmorning").prop("checked", true);
            } else {
                $("#editmorning").prop("checked", false);
                $("#editevening").prop("checked", true);
            }
            editBalanceCal()
            $("#print_btn").html(' <a href="http://localhost/Work%20Station/manager/screen/print_booking.html?id=' + data[0].booking_id + '" target="_blank" class="btn btn-primary ml-4">Go to Print</a>')
            $("#editBookingModal").modal("show");
        })
        .catch((err) => {
            throw err;
        });
};

const BookingEditSubmissionHandler = () => {
    let hallAorB = "";
    let EvenOrMorn = "";
    let booking_current_date = $("#booking_edit_date").val();
    let date = $("#booking_edit_program_date").val();
    let day = $("#booking_edit_program_day").val();
    let islDate = $("#editbookIslDate").val();
    let editPartyName = $("#edit_booking_party_name").val();
    let event_name = $("#edit_booking_event_name").val();
    let editAddress = $("#edit_booking_address").val();
    let editCnic = $("#editbookingcnic").val();
    let editemail = $("#editbookingEmail").val();
    let editbookAmnt = $("#editbookAmnt").val();
    let editAdvance = $("#edit_booking_advance").val();
    let no_of_guests = $("#edit_booking_no_of_guests").val();
    let contact = $("#edit_booking_cell_no").val();
    let edit_book_id = $("#edit_booking_id").val();
    let hall_shift = document.getElementsByName("editshift");
    let edit_book_hall = document.getElementsByName("edit_book_hall");
    for (i = 0; i < edit_book_hall.length; i++) {
        if (edit_book_hall[i].checked) {
            hallAorB = edit_book_hall[i].value;
        }
    }
    for (i = 0; i < hall_shift.length; i++) {
        if (hall_shift[i].checked) {
            EvenOrMorn = hall_shift[i].value;
        }
    }
    let editbookingObj = {
        bokid: edit_book_id,
        bokdate: booking_current_date,
        beventdate: date,
        bhijtidate: islDate,
        beventday: day,
        bpname: editPartyName,
        bpaddress: editAddress,
        bpcontact: contact,
        bpcnic: editCnic,
        bpemail: editemail,
        beventshift: EvenOrMorn,
        bportion: hallAorB,
        bamount: editbookAmnt,
        badvance: editAdvance,
        beventname: event_name,
        bguest: no_of_guests,
    };
    fetch("https://vesapi.ves-engr.com/api-update-booking.php", {
        method: "POST",
        body: JSON.stringify(editbookingObj),
    })
        .then((result) => {
            result.json();
        })
        .catch((err) => {
            throw err;
        });
};
const bookDeleteEvent = (delId) => {
    let DelBookingObj = {
        bokid: delId,
    };
    if (confirm("do you want to delete?")) {
        fetch("https://vesapi.ves-engr.com/api-update-booking.php", {
            method: "POST",
            body: JSON.stringify(DelBookingObj),
        })
            .then((result) => {
                result.json();
            })
            .catch((err) => {
                throw err;
            });
        location.reload();
    }
};
const taodayDate = () => {
    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var output =
        d.getFullYear() +
        "-" +
        (month < 10 ? "0" : "") +
        month +
        "-" +
        (day < 10 ? "0" : "") +
        day;
    return output
}
const balancePayment = (balId) => {
    let total_payment = 0;
    let advAmnt = 0;
    let booking_amnt = 0;
    let total_recieved = 0;
    let currentBalance = 0;
    let html_payment = '<thead><tr>'
    html_payment += ' <th scope="col">#</th>'
    html_payment += '<th scope="col">Date</th>'
    html_payment += '<th scope="col">Amount</th>'
    html_payment += '</tr>'
    html_payment += '</thead>'
    html_payment += '<tbody>'

    let editBookingIdObj = {
        bookId: balId,
    };
    // $("#edit_id").val(editBookingIdObj);
    fetch("https://vesapi.ves-engr.com/api-fetchId-booking.php", {
        method: "POST",
        body: JSON.stringify(editBookingIdObj),
    })
        .then((result) => {
            return result.json();
        })
        .then((data) => {
            let currentDate = taodayDate()
            $("#balBookId").val(data[0].booking_id);
            $("#balProgramDate").val(data[0].eventDate);
            $("#balPaymentDate").val(currentDate)
            $("#balBookAmnt").val(data[0].bookingAmount);
            advAmnt = data[0].advanceAmount
            booking_amnt = data[0].bookingAmount
            let bookingDate = data[0].bookingDate
            html_payment += '<tr>'
            html_payment += '<th scope="row">' + (1) + '</th>'
            html_payment += '<td>' + bookingDate + '</td>'
            html_payment += '<td>' + advAmnt + '</td>'
            html_payment += '</tr>'

        })
        .then(() => {



            let fetchPaymentObj = {
                bookId: balId
            }
            fetch("https://vesapi.ves-engr.com/api-fetchpayments-booking.php", {
                method: "POST",
                body: JSON.stringify(fetchPaymentObj),
            })
                .then((result) => {
                    return result.json();
                })
                .then((data) => {


                    // show partial payments 
                    for (var i = 0; i < data.length; i++) {
                        let split_date = data[i].payment_date.split(" ")
                        html_payment += '<tr>'
                        html_payment += '<th scope="row">' + (i + 2) + '</th>'
                        html_payment += '<td>' + split_date[0] + '</td>'
                        html_payment += '<td>' + data[i].partial_payments + '</td>'
                        html_payment += '</tr>'
                        total_payment += parseFloat(data[i].partial_payments)
                    }
                    total_recieved = parseFloat(advAmnt) + total_payment
                    currentBalance = parseFloat(booking_amnt) - total_recieved

                    html_payment += ' <tr><th scope="col" colspan="2" class="text-center ">Total Received</th><th scope="col" id="total_payment">' + total_recieved + '</th></tr>'
                    html_payment += ' <tr><th scope="col" colspan="2" class="text-center ">Current Balance</th><th scope="col" id="total_payment">' + currentBalance + '</th></tr>'
                    html_payment += '</tbody>'

                })
                .then(() => {
                    if (currentBalance === 0) {
                        $("#balpayment").css("display", "none")
                        $("#balBalance").css("display", "none")
                        $("#addBalance").prop("disabled", true)
                        $("#balPaymentDate").prop("disabled", true)
                    } else {
                        $("#balpayment").css("display", "block")
                        $("#balBalance").css("display", "block")
                        $("#addBalance").prop("disabled", false)
                        $("#balPaymentDate").prop("disabled", false)
                    }
                    $("#partial_payment_table").html(html_payment)


                }).then(() => $("#balPayment").modal("show"))
                .catch((err) => {
                    throw err;
                });
        }).catch((err) => {
            throw err;
        });




}

const changePayment = () => {
    let balPaymentAmnt = $("#balPaymentAmnt").val()
    let balBookAmnt = $("#balBookAmnt").val()
    let total_payment_val = parseInt($("#total_payment").html())

    $("#balcurrentBal").val(balBookAmnt - balPaymentAmnt - total_payment_val)


}

const addPayment = () => {
    let balBookId = $("#balBookId").val();
    let balPaymentDate = $("#balPaymentDate").val();
    let balPayment = $("#balPaymentAmnt").val();

    let addPaymentObj = {
        balBookId: balBookId,
        balPaymentDate: balPaymentDate,
        balPayment: balPayment,
    }

    fetch("https://vesapi.ves-engr.com/api-addpayments-booking.php", {
        method: "POST",
        body: JSON.stringify(addPaymentObj),
    })
        .then((result) => {
            result.json();
        })
        .catch((err) => {
            throw err;
        });
    window.open("screen/print_balance.html?id=" + balBookId)


}

window.onload = () => {
    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var output =
        (month < 10 ? "0" : "") +
        month +
        "-" +
        (day < 10 ? "0" : "") +
        day +
        "-" +
        d.getFullYear();
    hello(output);
    fetch("https://vesapi.ves-engr.com/api-fetch-all-booking.php")
        .then((result) => {
            return result.json();
        }).then((data) => {
            for (let i = 0; i < data.length; i++) {
                let split_date = data[i].eventDate
                let mySplit = split_date.split("-")
                let year = mySplit[0]
                let month = mySplit[1]
                let date = mySplit[2]
                let change_format = month + "-" + date + "-" + year;
                if (data[i].hallportion === 'a') {
                    if (data[i].eventShift === "morning") {
                        $('#moon' + change_format).append('<i class="fas fa-sun"></i>')

                    } else if (data[i].eventShift === "evening") {

                        $('#moon' + change_format).append('<i class="fas fa-moon"></i>')
                    }
                    $("#" + change_format).addClass("confirm-booking-a")
                }
                if (data[i].hallportion === 'b') {
                    if (data[i].eventShift === "morning") {
                        $('#moonb' + change_format).append('<i class="fas fa-sun"></i>')
                    } else if (data[i].eventShift === "evening") {
                        $('#moonb' + change_format).append('<i class="fas fa-moon"></i>')
                    }
                    $("#" + change_format).addClass("confirm-booking-b")
                }
            }
        })
        .catch((err) => {
            throw err;
        });
    // fetch("https://vesapi.ves-engr.com/api-target-fetch-all.php")
    // .then((result) => {
    //   return result.json();
    // })
    // .then((data) => {
    //   for (let i = 0; i < data.length; i++) {
    //     let split_date = data[i].target_date;
    //     let mySplit = split_date.split("-");
    //     let year = mySplit[0];
    //     let month = mySplit[1];
    //     let date = mySplit[2];
    //     let change_format = month + "-" + date + "-" + year;
    //     if (change_format != '04-10-2021') {

    //       $("#" + change_format).addClass('targetBookingBorder')
    //       console.log(change_format, " class added")
    //     }

    //   }
    // })

};
const monthChange = (monthIndex) => {
    var d = new Date();
    var month = d.getMonth() + 1;
    var day = d.getDate();
    var output =
        (month < 10 ? "0" : "") +
        month +
        "-" +
        (day < 10 ? "0" : "") +
        day +
        "-" +
        d.getFullYear();
    hello(output);
    fetch("https://vesapi.ves-engr.com/api-fetch-all-booking.php")
        .then((result) => {
            return result.json();
        })
        .then((data) => {
            for (let i = 0; i < data.length; i++) {
                let split_date = data[i].eventDate;
                let mySplit = split_date.split("-");
                let year = mySplit[0];
                let month = mySplit[1];
                let date = mySplit[2];
                let change_format = month + "-" + date + "-" + year;
                if (data[i].hallportion === "a") {
                    if (data[i].eventShift === "morning") {
                        $('#moon' + change_format).append('<i class="fas fa-sun"></i>')

                    } else if (data[i].eventShift === "evening") {

                        $('#moon' + change_format).append('<i class="fas fa-moon"></i>')
                    }
                    $("#" + change_format).addClass("confirm-booking-a");
                }
                if (data[i].hallportion === "b") {
                    if (data[i].eventShift === "morning") {
                        $('#moonb' + change_format).append('<i class="fas fa-sun"></i>')
                    } else if (data[i].eventShift === "evening") {
                        $('#moonb' + change_format).append('<i class="fas fa-moon"></i>')
                    }
                    $("#" + change_format).addClass("confirm-booking-b");
                }
            }
        })
        .catch((err) => {
            throw err;
        });
    localStorage.setItem('monthIndex', monthIndex)
}


const balanceCal = () => {
    let bookingAmnt = $("#bookAmnt").val();
    let advAmnt = $("#booking_advance").val();
    $("#booking_balance").val(bookingAmnt - advAmnt);
};
const editBalanceCal = () => {
    let bookingAmnt = $("#editbookAmnt").val();
    let advAmnt = $("#edit_booking_advance").val();
    $("#edit_booking_balance").val(bookingAmnt - advAmnt);
};

// document.getElementById("booking_event_date").on("click", toggleSideBar);
function toggleSideBar() {
    $('#calendar').addClass("sidebar-hide")
}

function togglemonthsSidebar() {
    $('#calendar').addClass("event-hide")
}

function showEventsBar() {
    $('#calendar').removeClass("event-hide")

}

function changeTargetBorder(getTargetDate) {
    let split_date = getTargetDate;
    let mySplit = split_date.split("-");
    let month = mySplit[0];
    let date = mySplit[1];
    let year = mySplit[2];
    let change_format = year + "-" + month + "-" + date;

    let pushTargetDateObj = {
        targetDate: change_format
    }
    fetch("https://vesapi.ves-engr.com/api-target-fetch.php", {
        method: "POST",
        body: JSON.stringify(pushTargetDateObj),
    })
        .then((result) => {
            return result.json();
        })
        .then((data) => {
            if (data.length > 0) {
                $("#" + getTargetDate).addClass("targetBookingBorder");

            } else { }
        })
        .catch((err) => {
            throw err;
        });
}

const getTargetValue = () => {
    let hall = ""
    let shift = ""
    let event_date = $("#On_event_date").val()
    let hall_select = document.getElementsByName("hall");
    for (i = 0; i < hall_select.length; i++) {
        if (hall_select[i].checked) {
            hall = hall_select[i].value;
        }
    }
    let shift_select = document.getElementsByName("inq_shift");
    for (i = 0; i < shift_select.length; i++) {
        if (shift_select[i].checked) {
            shift = shift_select[i].value;
        }
    }
    $.ajax({
        url: "js/getTarget/gettarget.php",
        method: "POST",
        data: {
            hall: hall,
            shift: shift,
            event_date: event_date
        },
        success: function (data) {
            $("#targetValue").val(data);
        }
    });
}
const addPackages = (bookID) => {
    fetchPkgData(1)
    $('#packageBookingId').val(bookID)
    fetchBookPkgs(bookID)
    $('#addPackages').modal("show")

}
const fetchBookPkgs = (bookID) => {
    // let html = ''
    // $('#pkgTable').html(html);
    html = '<thead>'
    html += '<tr>'
    html += ' <th>#</th>'
    html += '<th>Date</th>'
    html += '<th>Package</th>'
    html += '<th>Purchase</th>'
    html += '<th>Return</th>'
    html += ' <th>Total</th>'
    html += ' <th>Description</th>'
    html += '<th>Type</th>'
    html += '<th>Action</th>'
    html += '</tr>'
    html += '</thead>'

    let BookIdObj = {
        bookId: bookID
    }
    fetch('http://localhost/mhs_api/ves_api/api-bookedPackages-fetch.php', {
        method: 'POST',
        body: JSON.stringify(BookIdObj)
    })

        .then((res) => {
            return res.json()
        })
        .then((data) => {
            // let bookId = ''
            // let pkg_id = ''
            // let pkg_name = ''
            // let pkg_cost = ''
            html += '<tbody>'
            for (i = 0; i < data.length; i++) {
                // bookId = data[i].booking_id
                // pkg_id = data[i].pkg_id
                // pkg_name = data[i].pkg_name
                // pkg_cost = data[i].pkg_cost
                // included = data[i].included
                // included = data[i].datetime
                html += ' <tr>'
                html += '<td>' + (1 + i) + '</td>'
                html += '<td>' + data[i].datetime + '</td>'
                html += '<td>' + data[i].pkg_name + '</td>'
                html += '<td class="pkgCost">' + ((data[i].included === 'included') ? '0' : data[i].pkg_cost) + '</td>'
                html += '<td class="returnAmnt" id="return_' + i + '">' + data[i].return_amnt + '</td>'
                // if (data[i].included === 'included') {
                //     html += '<td class="returnAmnt">Rt</td>'

                // }
                // else {
                //     // let amnt = 0;
                //     // let sendData = {
                //     //     booked_pkg_id: data[i].id
                //     // }
                //     // console.log(sendData)
                //     // // html += getReturnData(sendData)
                //     // let gethtml = getReturnData(sendData)
                //     // gethtml.then(data=>{
                //     //     // html +=data
                //     //     console.log('return_'+i,'=>',data)
                //     //     $('return_'+i).html(data)
                //     // })
                //     $.ajax({
                //         url: "js/getReturnData/getData.php",
                //         method: "POST",
                //         data: {
                //             booked_pkg_id: data[i].id
                //         },
                //         success: function (data) {
                //             // $("#return_"+i).val(data);
                //             console.log('return_'+i,'=>',data)
                //         }
                //     });


                // }
                html += '<td>total</td>'
                html += '<td>' + data[i].pkg_desc + '</td>'
                html += '<td>' + data[i].included + '</td>'
                html += '<td><a href="#" id="' + data[i].booking_pkg_id + '" onclick="returnPkg(this.id)">' + ((data[i].included === 'included') ? '' : 'Return') + 'Return</a></td>'
                html += '</tr>'
            }
            html += '</tbody>'
            html += '<tfoot>'
            html += '<td colspan="7"> total </th>'
            html += '<td id="totalPkgCost"> </th>'
            html += '</tfoot>'
            $('#pkgTable').html(html);

            var total = 0;
            $(".pkgCost").each(function () {
                total += parseFloat($(this).text())
            });
            $('#totalPkgCost').html(total);
        })
}
// const getReturnData=(sendData)=>{
//     let amnt = 0
//     let pass = ''
//     return fetch('http://localhost/mhs_api/ves_api/api-returnPackages-getAmnt.php', {
//                         method: 'POST',
//                         body: JSON.stringify(sendData)
//                     }).then((res)=> {
//                         return res.json()
//                     }).then((get)=> {
//                         for (let i = 0; i < get.length; i++) {
//                             amnt += parseInt(get[i].amnt)
//                             console.log('amnt=>', get[i].amnt)
//                         }
//                         // html += '<td class="returnAmnt">R' + amnt + '</td>'
//                         // console.log('amnt=>', amnt)
//                         return amnt
//                     })
//                     .then((myamnt)=>{
//                         console.log(sendData,'=>', myamnt)
//                         pass = '<td class="returnAmnt">R' + myamnt + '</td>'
//                         return myamnt
//                     })
// // console.log("pass=>",pass)


// }
const returnPkg = (id) => {

    let returnPkgId = {
        packageId: id
    }
    fetch('http://localhost/mhs_api/ves_api/api-bookedPackages-fetchById.php', {
        method: "POST",
        body: JSON.stringify(returnPkgId)
    })
        .then((res) => {
            return res.json()
        })
        .then((data) => {
            $('#return_pak_name').val(data[0].pkg_name)
            $('#return_pak_pkgId').val(data[0].pkg_id)
            let sendData = {
                pkg_id: data[0].pkg_id
            }
            fetch('http://localhost/mhs_api/ves_api/api-packages-getReturnPrice.php', {
                method: "POST",
                body: JSON.stringify(sendData)
            }).then((res) => {
                return res.json()
            }).then(get => {
                $('#return_pak_price').val(get[0].return_price)

            })
            $('#return_pak_pkgBookId').val(data[0].id)
            $('#return_pak_bookingID').val(data[0].booking_id)
        })
        .catch(err => {
            throw err
        })
    $('#returnPackages').modal('show')
}

const totalReturn = () => {
    let price = $('#return_pak_price').val()
    let qty = $('#return_pak_qty').val()
    $('#return_pak_total').val(price * qty)
}

const submitReturn = () => {
    return_pak_price = $('#return_pak_price').val()
    return_pak_qty = $('#return_pak_qty').val()
    return_pak_name = $('#return_pak_name').val()
    return_pak_total = $('#return_pak_total').val()
    return_pak_pkgId = $('#return_pak_pkgId').val() // this is pkg id go to pkg_id
    return_pak_pkgBookId = $('#return_pak_pkgBookId').val() // this is pkg booked id go to  pkg_booked_id
    return_pak_bookingID = $('#return_pak_bookingID').val() // this is booking ID go to  book_id
    let returnData = {
        pkg_id: return_pak_pkgId,
        booking_id: return_pak_bookingID,
        pkg_booked_id: return_pak_pkgBookId,
        pkg_name: return_pak_name,
        pkg_cost: return_pak_total,
        qty_pkg: return_pak_qty
    }
    fetch('http://localhost/mhs_api/ves_api/api-returnPackage-insert.php', {
        method: "POST",
        body: JSON.stringify(returnData)
    })
        .then((res) => {
            return res.json()
        })
        .catch(err => {
            throw err
        })
}