"use strict";function initMap(){var e={lat:13.5900749,lng:124.1933298},t=new google.maps.Map(document.getElementById("map"),{zoom:15,center:e});new google.maps.Marker({position:e,map:t})}function toggleSideBar(e){e.preventDefault(),sidebar.classList.contains("opened")?(body.classList.remove("no-scroll"),sidebar.classList.toggle("opened"),setTimeout(function(){sidebar.classList.toggle("animation")},300)):(body.classList.add("no-scroll"),sidebar.classList.toggle("animation"),setTimeout(function(){sidebar.classList.toggle("opened")},100))}var atfSlider=document.querySelector(".atf-glide"),options={type:"carousel",startAt:0,perView:1,gap:0,autoplay:4e3,animationDuration:600};if(atfSlider){var slide=new Glide(atfSlider,options);slide.mount()}var sideBtn=document.querySelector(".burger-btn"),body=document.querySelector("body"),sidebar=document.querySelector(".mobile-sidebar-navigation"),sidebarOverlay=sidebar.querySelector(".bg-overlay"),closeSidebar=sidebar.querySelector(".close-sidebar");sideBtn.addEventListener("click",toggleSideBar),sidebarOverlay.addEventListener("click",toggleSideBar),closeSidebar.addEventListener("click",toggleSideBar),window.addEventListener("resize",function(e){window.innerWidth>=768&&(sidebar.classList.remove("opened"),sidebar.classList.remove("animation"))}),$(document).ready(function(){var e=document.querySelectorAll(".schedule-container");e.forEach(function(e){return e.addEventListener("click",function(e){e.preventDefault();var t=acf.getField("header","option");alert(t.address)})})});
//# sourceMappingURL=scripts.js.map
