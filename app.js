// declaring HTML elements
const imgDiv =document.querySelector('pic');
const img = document.querySelector('#photo');
const file = document.querySelector('#file');

//when we choose file to upload
file.addEventListener('change', function(){
    //this refers to file
    const choosedFile = this.files[0];

    if(choosedFile){
        const reader = new FileReader();
        
        reader.addEventListener('load', function(){
            img.setAttribute('src', reader.result);
        });
        reader.readAsDataURL(choosedFile);
    }
});