jQuery(window).on('load', function () {
    const tourSection = document.querySelector('.tour-section-container');

    const initMasonry = () => {
        $('.tour-gallery-container').each(function () {
            $(this).masonry({
                itemSelector: 'figure'
            });
        })
    }
    const initGallery = () => {
        $('.tour-gallery-container').each(function () {
            $(this).masonry({
                itemSelector: 'figure'
            });
            //initialize photoswipe
            const $pic = $(this)
            const getItems = function () {
                let items = [];
                $pic.find('a').each(function () {
                    let $href = $(this).attr('href');
                    let $size = $(this).data('size').split('x');
                    let $width = $size[0];
                    let $height = $size[1];

                    let item = {
                        src: $href,
                        w: $width,
                        h: $height
                    }
                    items.push(item);
                });
                return items;
            }

            const items = getItems();
            const $pswp = $('.pswp')[0];
            $pic.on('click', 'figure', function (event) {
                event.preventDefault();

                const $index = $(this).index();
                const options = {
                    index: $index,
                    bgOpacity: .9,
                    showHideOpacity: true
                }
                const lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                lightBox.init();
            });

            $(this).addClass('loaded');
        });
    }

    if (tourSection) {
        initGallery();
        const btns = tourSection.querySelectorAll('.tab-btn');
        const contents = tourSection.querySelectorAll('.tab-content');

        btns.forEach(btn => btn.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = btn.dataset.tabTarget;
            const cont = tourSection.querySelector(`.tab-content${targetId}`)
            btns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            contents.forEach(c => c.classList.remove('active'));
            cont.classList.add('active');
            setTimeout(() => {
                initMasonry();
            }, 10)
        }))

    }
})

