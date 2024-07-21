document.addEventListener("DOMContentLoaded",function() {
var header =document.querySelector(".sthyiik");
console.log(header)
window.addEventListener("scroll",function(){
    mini_geader=document.querySelector(".steaky-element");
    if(window.scrollY>120){

        mini_geader.classList.add("steaky","scrolled")
    }
    else {
        mini_geader.classList.remove("steaky","scrolled")
    }
})


/*** dropdown hover */

let dropdown_enter=document.querySelector('.dropdown ');
let dropdown_out=document.querySelector(' .dropdown > .dropdown-menu , .dropdown + .dropdown-toggle > .dropdown-menu');
let dropdownMenu=document.querySelector('.dropdown-menu');


dropdown_enter.addEventListener('mouseenter', function () {
    
    dropdownMenu.classList.add(['show'],['animate_dropdown'])
    console.log('gg'+dropdown1)
  });

  dropdown_out.addEventListener('mouseleave', function () {
    dropdownMenu.classList.remove(['show'],['animate_dropdown']);
  });
});
