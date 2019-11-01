const pageSlider = document.querySelector('.page-slider');
const sliderOptions = {
  type: 'carousel',
  startAt: 0,
  perView: 1,
  gap: 0,
  autoplay: 4000,
  animationDuration: 600
}

if (pageSlider) {
  console.log('hsssilder')
  const slide = new Glide(pageSlider, sliderOptions);
  slide.mount();
}