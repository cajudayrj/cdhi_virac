const sideBtn = document.querySelector('.burger-btn');
const body = document.querySelector('body');
const sidebar = document.querySelector('.mobile-sidebar-navigation');
const sidebarOverlay = sidebar.querySelector('.bg-overlay');
const closeSidebar = sidebar.querySelector('.close-sidebar');

function toggleSideBar(e) {
    e.preventDefault();
    if (sidebar.classList.contains('opened')) {
        body.classList.remove('no-scroll');
        sidebar.classList.toggle('opened');
        setTimeout(() => {
            sidebar.classList.toggle('animation');
        }, 300)
    } else {
        body.classList.add('no-scroll');
        sidebar.classList.toggle('animation');
        setTimeout(() => {
            sidebar.classList.toggle('opened');
        }, 100)
    }
}

sideBtn.addEventListener('click', toggleSideBar);
sidebarOverlay.addEventListener('click', toggleSideBar);
closeSidebar.addEventListener('click', toggleSideBar);

window.addEventListener('resize', function (e) {
    if (window.innerWidth >= 768) {
        sidebar.classList.remove('opened');
        sidebar.classList.remove('animation');
    }
})
