"use strict";function initMap(){if(mapContainer){var e={lat:13.5900749,lng:124.1933298},t=new google.maps.Map(mapContainer,{zoom:15,center:e});new google.maps.Marker({position:e,map:t})}}function toggleSideBar(e){e.preventDefault(),sidebar.classList.contains("opened")?(body.classList.remove("no-scroll"),sidebar.classList.toggle("opened"),setTimeout(function(){sidebar.classList.toggle("animation")},300)):(body.classList.add("no-scroll"),sidebar.classList.toggle("animation"),setTimeout(function(){sidebar.classList.toggle("opened")},100))}var atfSlider=document.querySelector(".atf-glide"),options={type:"carousel",startAt:0,perView:1,gap:0,autoplay:4e3,animationDuration:600};if(atfSlider){var slide=new Glide(atfSlider,options);slide.mount()}var doctorContainer=document.querySelector(".doctor-main-content");if(doctorContainer){var modals=doctorContainer.querySelectorAll(".doctor-profile-container"),closeModal=doctorContainer.querySelectorAll(".close-modal"),body=document.querySelector("body");modals.forEach(function(e){return e.addEventListener("click",function(t){t.preventDefault();var o=e.dataset.doctorId,r=document.querySelector(".doctor-modal.modal-"+o);r.classList.add("opened"),body.classList.add("no-scroll"),setTimeout(function(){r.classList.add("animation")},100)})}),closeModal.forEach(function(e){return e.addEventListener("click",function(t){t.preventDefault();var o=e.dataset.modalClose,r=document.querySelector(".doctor-modal.modal-"+o);r.classList.remove("animation"),setTimeout(function(){r.classList.remove("opened"),body.classList.remove("no-scroll")},300)})})}var mapContainer=document.querySelector("#map"),serviceContainer=document.querySelector(".services-section-container");if(serviceContainer){var services=serviceContainer.querySelectorAll(".service-title"),closeBtns=serviceContainer.querySelectorAll(".close-modal"),body=document.querySelector("body");services.forEach(function(e){return e.addEventListener("click",function(e){e.preventDefault();var t=e.target.dataset.serviceModal,o=serviceContainer.querySelector(".modal-"+t);body.classList.add("no-scroll"),o.classList.add("opened"),setTimeout(function(){o.classList.add("animation")},100)})}),closeBtns.forEach(function(e){return e.addEventListener("click",function(e){e.preventDefault();var t=e.target.dataset.modalClose,o=serviceContainer.querySelector(".modal-"+t);o.classList.remove("animation"),setTimeout(function(){o.classList.remove("opened"),body.classList.remove("no-scroll")},300)})})}var serviceSection=document.querySelector(".services-section-container");if(serviceSection){var serviceTabs=serviceSection.querySelectorAll(".services-tabs-btn"),serviceContainers=serviceSection.querySelectorAll(".service-container"),pageAddress=window.location.href,currentPage=window.location.origin+"/our-services/#",address=pageAddress.replace(currentPage,"");if("resource-center"==address||"community-program"==address){var activeBtn=serviceSection.querySelector("button#"+address);setTimeout(function(){activeBtn.click()},100)}serviceTabs.forEach(function(e){return e.addEventListener("click",function(t){t.preventDefault();var o=e.dataset.catBtn,r=serviceSection.querySelector('.service-container[data-category="'+o+'"]');serviceTabs.forEach(function(e){return e.classList.remove("active")}),e.classList.add("active"),serviceContainers.forEach(function(e){return e.classList.remove("opened")}),r.classList.add("opened")})})}var sideBtn=document.querySelector(".burger-btn"),body=document.querySelector("body"),sidebar=document.querySelector(".mobile-sidebar-navigation"),sidebarOverlay=sidebar.querySelector(".bg-overlay"),closeSidebar=sidebar.querySelector(".close-sidebar");sideBtn.addEventListener("click",toggleSideBar),sidebarOverlay.addEventListener("click",toggleSideBar),closeSidebar.addEventListener("click",toggleSideBar),window.addEventListener("resize",function(e){window.innerWidth>=768&&(sidebar.classList.remove("opened"),sidebar.classList.remove("animation"))}),$(document).ready(function(){var e=document.querySelectorAll(".schedule-container");e.forEach(function(e){return e.addEventListener("click",function(e){e.preventDefault();var t=acf.getField("header","option");alert(t.address)})})});
//# sourceMappingURL=scripts.js.map
