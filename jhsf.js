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


/*
document.querySelectorAll('.ssheader ').forEach(box =>{
    console.log(box)
    
    box.addEventListener('mouseenter', ()=>{
   
      icon=this.querySelector('.circle-icon');
        box.classList.add('activey');
    
    });
    box.addEventListener('mouseleave', () => {
 
        box.classList.remove('activey');
 
      });
})*/
});