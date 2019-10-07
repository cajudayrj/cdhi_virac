"use strict";function initMap(){if(mapContainer){var e={lat:13.5900749,lng:124.1933298},t=new google.maps.Map(mapContainer,{zoom:15,center:e});new google.maps.Marker({position:e,map:t})}}function toggleSideBar(e){e.preventDefault(),sidebar.classList.contains("opened")?(body.classList.remove("no-scroll"),sidebar.classList.toggle("opened"),setTimeout(function(){sidebar.classList.toggle("animation")},300)):(body.classList.add("no-scroll"),sidebar.classList.toggle("animation"),setTimeout(function(){sidebar.classList.toggle("opened")},100))}var aboutSection=document.querySelector(".about-section-container");if(aboutSection){var tabBtns=aboutSection.querySelectorAll(".tab-btns"),tabContents=aboutSection.querySelectorAll(".tab-content-container"),pageAddress=window.location.href,currentPage=window.location.origin+"/about/",address=void 0;address=pageAddress==currentPage?"#not-found-btn":pageAddress.replace(""+currentPage,"");var activeBtn=aboutSection.querySelector("button"+address);activeBtn&&setTimeout(function(){activeBtn.click(),window.scrollTo(0,0)},300),tabBtns.forEach(function(e){return e.addEventListener("click",function(t){t.preventDefault();var o=e.dataset.targetContent,r=aboutSection.querySelector("."+o);tabBtns.forEach(function(e){return e.classList.remove("active")}),e.classList.add("active"),tabContents.forEach(function(e){return e.classList.remove("active")}),r.classList.add("active")})})}var atfSlider=document.querySelector(".atf-glide"),options={type:"carousel",startAt:0,perView:1,gap:0,autoplay:4e3,animationDuration:600};if(atfSlider){var slide=new Glide(atfSlider,options);slide.mount()}var careerSection=document.querySelector(".career-section-container");if(careerSection){var btns=careerSection.querySelectorAll(".career-btns"),containers=careerSection.querySelectorAll(".career-content");btns.forEach(function(e){return e.addEventListener("click",function(e){e.preventDefault();var t=e.target.dataset.career,o=careerSection.querySelector("#"+t);containers.forEach(function(e){return e.classList.remove("active")}),o.classList.add("active")})})}var doctorContainer=document.querySelector(".doctor-main-content");if(doctorContainer){var modals=doctorContainer.querySelectorAll(".doctor-profile-container"),closeModal=doctorContainer.querySelectorAll(".close-modal"),body=document.querySelector("body");modals.forEach(function(e){return e.addEventListener("click",function(t){t.preventDefault();var o=e.dataset.doctorId,r=document.querySelector(".doctor-modal.modal-"+o);r.classList.add("opened"),body.classList.add("no-scroll"),setTimeout(function(){r.classList.add("animation")},100)})}),closeModal.forEach(function(e){return e.addEventListener("click",function(t){t.preventDefault();var o=e.dataset.modalClose,r=document.querySelector(".doctor-modal.modal-"+o);r.classList.remove("animation"),setTimeout(function(){r.classList.remove("opened"),body.classList.remove("no-scroll")},300)})})}var mapContainer=document.querySelector("#map"),serviceContainer=document.querySelector(".services-section-container");if(serviceContainer){var services=serviceContainer.querySelectorAll(".service-title"),closeBtns=serviceContainer.querySelectorAll(".close-modal"),body=document.querySelector("body");services.forEach(function(e){return e.addEventListener("click",function(e){e.preventDefault();var t=e.target.dataset.serviceModal,o=serviceContainer.querySelector(".modal-"+t);body.classList.add("no-scroll"),o.classList.add("opened"),setTimeout(function(){o.classList.add("animation")},100);var r=o.querySelector(".other-imgs-cont");setTimeout(function(){$(r).masonry({itemSelector:".other-imgs"})},10)})}),closeBtns.forEach(function(e){return e.addEventListener("click",function(e){e.preventDefault();var t=e.target.dataset.modalClose,o=serviceContainer.querySelector(".modal-"+t);o.classList.remove("animation"),setTimeout(function(){o.classList.remove("opened"),body.classList.remove("no-scroll")},300)})})}jQuery(window).on("load",function(){var e=document.querySelector(".services-section-container");if(e){var t=e.querySelectorAll(".services-tabs-btn"),o=e.querySelectorAll(".service-container"),r=window.location.href,n=window.location.origin+"/our-services/#",a=r.replace(n,"");if("resource-center"==a||"community-program"==a){var i=e.querySelector("button#"+a);setTimeout(function(){i.click()},300)}t.forEach(function(r){return r.addEventListener("click",function(n){n.preventDefault();var a=r.dataset.catBtn,i=e.querySelector('.service-container[data-category="'+a+'"]');t.forEach(function(e){return e.classList.remove("active")}),r.classList.add("active"),o.forEach(function(e){return e.classList.remove("opened")}),i.classList.add("opened")})}),$(".other-imgs-cont").each(function(){$(this).masonry({itemSelector:".other-imgs"});var e=$(this),t=function(){var t=[];return e.find("a").each(function(){var e=$(this).attr("href"),o=$(this).data("size").split("x"),r=o[0],n=o[1],a={src:e,w:r,h:n};t.push(a)}),t},o=t(),r=$(".pswp")[0];e.on("click","figure",function(e){e.preventDefault();var t=$(this).index(),n={index:t,bgOpacity:.9,showHideOpacity:!0},a=new PhotoSwipe(r,PhotoSwipeUI_Default,o,n);a.init()})})}});var sideBtn=document.querySelector(".burger-btn"),body=document.querySelector("body"),sidebar=document.querySelector(".mobile-sidebar-navigation"),sidebarOverlay=sidebar.querySelector(".bg-overlay"),closeSidebar=sidebar.querySelector(".close-sidebar");sideBtn.addEventListener("click",toggleSideBar),sidebarOverlay.addEventListener("click",toggleSideBar),closeSidebar.addEventListener("click",toggleSideBar),window.addEventListener("resize",function(e){window.innerWidth>=768&&(sidebar.classList.remove("opened"),sidebar.classList.remove("animation"))}),$(document).ready(function(){var e=document.querySelectorAll(".schedule-container");e.forEach(function(e){return e.addEventListener("click",function(e){e.preventDefault();var t=acf.getField("header","option");alert(t.address)})})}),jQuery(window).on("load",function(){var e=document.querySelector(".tour-section-container"),t=function(){$(".tour-gallery-container").each(function(){$(this).masonry({itemSelector:"figure"})})},o=function(){$(".tour-gallery-container").each(function(){$(this).masonry({itemSelector:"figure"});var e=$(this),t=function(){var t=[];return e.find("a").each(function(){var e=$(this).attr("href"),o=$(this).data("size").split("x"),r=o[0],n=o[1],a={src:e,w:r,h:n};t.push(a)}),t},o=t(),r=$(".pswp")[0];e.on("click","figure",function(e){e.preventDefault();var t=$(this).index(),n={index:t,bgOpacity:.9,showHideOpacity:!0},a=new PhotoSwipe(r,PhotoSwipeUI_Default,o,n);a.init()}),$(this).addClass("loaded")})};if(e){o();var r=e.querySelectorAll(".tab-btn"),n=e.querySelectorAll(".tab-content");r.forEach(function(o){return o.addEventListener("click",function(a){a.preventDefault();var i=o.dataset.tabTarget,c=e.querySelector(".tab-content"+i);r.forEach(function(e){return e.classList.remove("active")}),o.classList.add("active"),n.forEach(function(e){return e.classList.remove("active")}),c.classList.add("active"),setTimeout(function(){t()},10)})})}});
//# sourceMappingURL=scripts.js.map
