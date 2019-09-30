const serviceContainer = document.querySelector('.services-section-container');
if (serviceContainer) {
    const services = serviceContainer.querySelectorAll('.service-title');
    const closeBtns = serviceContainer.querySelectorAll('.close-modal');
    const body = document.querySelector('body');
    services.forEach(service => service.addEventListener('click', function (e) {
        e.preventDefault();
        const dataset = e.target.dataset.serviceModal;
        const modal = serviceContainer.querySelector(`.modal-${dataset}`);
        body.classList.add('no-scroll');

        modal.classList.add('opened');
        setTimeout(() => {
            modal.classList.add('animation');
        }, 100)
    }))

    closeBtns.forEach(btn => btn.addEventListener('click', function (e) {
        e.preventDefault();
        const dataset = e.target.dataset.modalClose;
        const modal = serviceContainer.querySelector(`.modal-${dataset}`);

        modal.classList.remove('animation');
        setTimeout(() => {
            modal.classList.remove('opened');
            body.classList.remove('no-scroll');
        }, 300)
    }))
}