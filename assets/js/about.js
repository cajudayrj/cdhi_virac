const aboutSection = document.querySelector('.about-section-container');

if (aboutSection) {
    const tabBtns = aboutSection.querySelectorAll('.tab-btns');
    const tabContents = aboutSection.querySelectorAll('.tab-content-container');
    const pageAddress = window.location.href;
    const currentPage = `${window.location.origin}/about/`;
    let address;
    if (pageAddress == currentPage) {
        address = "#not-found-btn";
    } else {
        address = pageAddress.replace(`${currentPage}`, '');
    }

    const activeBtn = aboutSection.querySelector(`button${address}`);
    if (activeBtn) {
        setTimeout(() => {
            activeBtn.click();
            window.scrollTo(0, 0);
        }, 300)
    }

    tabBtns.forEach(btn => btn.addEventListener('click', function (e) {
        e.preventDefault();
        const contClass = btn.dataset.targetContent;
        const cont = aboutSection.querySelector(`.${contClass}`)
        tabBtns.forEach(item => item.classList.remove('active'));
        btn.classList.add('active');
        tabContents.forEach(container => container.classList.remove('active'));
        cont.classList.add('active');
    }))
}

