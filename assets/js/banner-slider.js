
const atfSlider = document.querySelector('.atf-glide');
const options = {
    type: 'carousel',
    startAt: 0,
    perView: 1,
    gap: 0,
    autoplay: 4000,
    animationDuration: 600
}

if (atfSlider) {
    const slide = new Glide(atfSlider, options);
    slide.mount();
}