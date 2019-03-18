require('./bootstrap');
var validator = require('bootstrap-validator');
var pickadate = require('./pickadate');

$(function(){
    $.extend( $.fn.pickadate.defaults, {
        monthsFull: [ 'leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec' ],
        monthsShort: [ 'led', 'úno', 'bře', 'dub', 'kvě', 'čer', 'čvc', 'srp', 'zář', 'říj', 'lis', 'pro' ],
        weekdaysFull: [ 'neděle', 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota' ],
        weekdaysShort: [ 'ne', 'po', 'út', 'st', 'čt', 'pá', 'so' ],
        today: 'dnes',
        clear: 'vymazat',
        close: 'zavřít',
        firstDay: 1,
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd'
    })

    $('.datepicker').pickadate()
})
