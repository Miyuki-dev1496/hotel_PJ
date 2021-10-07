openUploader = function() {
 document.getElementById('uploadImage').click();
}

uploadHandler = function() {
  let file = document.querySelector('input[type=file]').files[0];
    let reader = new FileReader();
    let preview = document.getElementById('uploadedImage');

    reader.addEventListener("load", function () {
      preview.src = reader.result;
    }, false);
    if (file) {
      reader.readAsDataURL(file);
      reader.onloadend = function () {
        localStorage.setItem('tempImg', reader.result.split(',')[1]);
      }
    }
  }


removeImage = function() {
     let preview = document.getElementById('uploadedImage'); 
  preview.src = '';
}