const careerSection = document.querySelector('.career-section-container');

if (careerSection) {
    const btns = careerSection.querySelectorAll('.career-btns');
    const containers = careerSection.querySelectorAll('.career-content');

    btns.forEach(btn => btn.addEventListener('click', function (e) {
        e.preventDefault();
        const careerId = e.target.dataset.career;
        const cont = careerSection.querySelector(`#${careerId}`);
        containers.forEach(c => c.classList.remove('active'));
        cont.classList.add('active');

    }))
}

