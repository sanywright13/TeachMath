document.addEventListener("DOMContentLoaded",function() {

$addButton=document.getElementById('lesson_add')
$addButton.addEventListener('click',function(){

    let container=document.getElementById('lesson_additional')
    let newItem=document.createElement('div')
    newItem.classList.add('lesson_item')
    newItem.innerHTML=`
                    <input type="url" name="video_lesson[]" placeholder="Video URL">
                    <input type="text" name="lesson_content[]" placeholder="Video explanation">
                    <button type="button" class="lesson_remove">Remove</button>
                `;
container.appendChild(newItem)

});

})