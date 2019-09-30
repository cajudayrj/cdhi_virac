const serviceSection = document.querySelector('.services-section-container');

if (serviceSection) {
    const serviceTabs = serviceSection.querySelectorAll('.services-tabs-btn');
    const serviceContainers = serviceSection.querySelectorAll('.service-container');
    const pageAddress = window.location.href;
    const currentPage = `${window.location.origin}/our-services/#`;
    const address = pageAddress.replace(currentPage, '');

    if (address == "resource-center" || address == "community-program") {
        const activeBtn = serviceSection.querySelector(`button#${address}`);
        setTimeout(() => {
            activeBtn.click();
        }, 100)
    }

    serviceTabs.forEach(btn => btn.addEventListener('click', function (e) {
        e.preventDefault();
        const cat = btn.dataset.catBtn;
        const service = serviceSection.querySelector(`.service-container[data-category="${cat}"]`)
        serviceTabs.forEach(item => item.classList.remove('active'));
        btn.classList.add('active');
        serviceContainers.forEach(container => container.classList.remove('opened'));
        service.classList.add('opened');
    }))
}

