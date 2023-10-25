

$(document).ready(function(){

    // set alert time
    window.setTimeout(function(){
        $('.alert').fadeTo(300, 0).slideUp(300, function(){
            $(this).remove();
        });
    }, 3000);

});


function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

     const oFReader = new FileReader();
     oFReader.readAsDataURL(image.files[0]);

     oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
     }
}