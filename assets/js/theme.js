$(document).ready(function () {
    const doctors = document.querySelectorAll('.schedule-container');

    doctors.forEach(doctor => doctor.addEventListener('click', function (e) {
        e.preventDefault();
        const hdr = acf.getField('header', 'option');
        alert(hdr['address']);
    }))
})