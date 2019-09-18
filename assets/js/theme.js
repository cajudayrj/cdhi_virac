        
    const atfSlider = document.querySelector('.atf-glide');
    const options = {
        type: 'carousel',
        startAt: 0,
        perView: 1
    }

    if(atfSlider){
        const slide = new Glide(atfSlider, options);
        slide.mount();
    }