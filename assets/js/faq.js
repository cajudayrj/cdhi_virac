const faqSection = document.querySelector('.faq-section-container');

if (faqSection) {
    const qaContainer = document.querySelectorAll('.q-and-a-container');

    qaContainer.forEach(qacont => {
        const btns = qacont.querySelectorAll('.question-btn');
        const containers = qacont.querySelectorAll('.answer-container');

        btns.forEach(btn => btn.addEventListener('click', function (e) {
            e.preventDefault();
            const qaId = e.target.dataset.question;
            const cont = qacont.querySelector(`.${qaId}`);
            containers.forEach(c => c.classList.remove('active'));
            cont.classList.add('active');
        }))
    })
}

