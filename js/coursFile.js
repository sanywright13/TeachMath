document.addEventListener("DOMContentLoaded",function() {
  buttonElement=document.querySelectorAll('ul.btn-toggle-nav li button')
  let Firstsection='Cours';
  let h2Section=document.querySelector('h2.gfpr')
h2Section.innerHTML=Firstsection;
console.log(buttonElement);
  buttonElement.forEach(elementcour => {  
    elementcour.addEventListener('click',function(){

        console.log(elementcour);
        console.log(elementcour.parentNode.parentNode.parentNode.parentNode.querySelector('button').innerText)
        let sectionName=elementcour.parentNode.parentNode.parentNode.parentNode.querySelector('button').innerText;
   let  dataElement=elementcour.getAttribute('data-target')
        console.log(dataElement);
    let  elementID=dataElement.split("-")[1]
    console.log(elementID);
// get the section place 

let sectionElement=document.getElementById(elementID);
//let activeSection=document.getElementById('.scfrb');
let Allsections=document.querySelectorAll('.fgoru')

h2Section.innerHTML=sectionName;

// remove the active class from the other buttons
Allsections.forEach(element => {  
    element.classList.remove('active')


})
console.log(Allsections);
sectionElement.classList.add('active')

selectedSection=sectionElement.parentNode
console.log(selectedSection);

    /** remove all section active */
let AllsectionsActive=document.querySelectorAll('.scfrb')
AllsectionsActive.forEach(element => {  
    element.classList.remove('active')
}
);
selectedSection.classList.add('active')
/** add active to the selected section */

//activeSection.classList.add('active');

    })
  });
  
    

})