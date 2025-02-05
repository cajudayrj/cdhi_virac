const doctorContainer = document.querySelector('.doctor-main-content');

if (doctorContainer) {
    const modals = doctorContainer.querySelectorAll('.doctor-profile-container');
    const closeModal = doctorContainer.querySelectorAll('.close-modal');
    const body = document.querySelector('body');

    modals.forEach(m => m.addEventListener('click', function (e) {
        e.preventDefault();
        const dataId = m.dataset.doctorId;
        const modal = document.querySelector(`.doctor-modal.modal-${dataId}`);
        modal.classList.add('opened');
        body.classList.add('no-scroll');
        setTimeout(() => {
            modal.classList.add('animation');
        }, 100)
    }))

    closeModal.forEach(close => close.addEventListener('click', function (e) {
        e.preventDefault();
        const dataId = close.dataset.modalClose;
        const modal = document.querySelector(`.doctor-modal.modal-${dataId}`);
        modal.classList.remove('animation');
        setTimeout(() => {
            modal.classList.remove('opened');
            body.classList.remove('no-scroll');
        }, 300)
    }))
}

