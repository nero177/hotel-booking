let disabledDates = []; 

$(document).ready(function(){
    fetch('http://127.0.0.1:8000/bookedDates')
        .then(response => response.json())
        .then(data => {disabledDates = data})
})

function isDateDisabled(date) {
    const currentDate = moment(date);
    
    if (disabledDates.includes(currentDate.format('MM/DD/YYYY'))) {
        return true;
    }

    return false;
}

$('input[class="input-dates"]').daterangepicker({
    singleDatePicker: true,
    minDate: moment().startOf('day'),
    maxDate: moment().set('year', moment().year() + 1).endOf('year'),
    autoApply: true,
    isInvalidDate: isDateDisabled // Provide the callback function to disable specific dates
});

$('#check_on').on('apply.daterangepicker', function(ev, picker) {
    $('#check_off').val(ev.target.value);
})