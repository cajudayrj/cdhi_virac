const contactSection = document.querySelector('.contact-section-container');

if (contactSection) {
    const subjectSelect = contactSection.querySelector('select[name="contact-subject"]');
    const otherSubject = contactSection.querySelector('input[name="other-subject');

    if (subjectSelect.value === 'Others') {
        otherSubject.classList.add('shown');
    } else {
        otherSubject.classList.remove('shown')
    }

    subjectSelect.addEventListener('change', function (e) {
        if (e.target.value === 'Others') {
            otherSubject.classList.add('shown')
        } else {
            otherSubject.classList.remove('shown')
        }
    })
}

