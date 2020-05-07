<script>
  const imageDropArea = $('label#profileImage').find('div#dropArea');
  const inputImage = imageDropArea.parent().find('input#image');

  inputImage.on('change', function(e) {
    const imageBLOB = URL.createObjectURL(e.target.files[0]);
    const img = new Image();

    img.onload = function() {
      if ( this.width <= 500 && this.height <= 500 ) {
        imageDropArea.html(`<label class="m-0" for="image">
            <img alt="image" src="${imageBLOB}" class="rounded-circle ml-0 shadow" style="width: 200px; height: 200px; background-size: cover">
            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 right-0 rounded-circle" style="width: 30px; height: 30px">
              <i class="fas fa-times"></i>
            </button>
          </label>
        `);
      } else {
        Swal.fire(
          'Size dimension too large!',
          'Image size cannot more than 500 x 500',
          'warning'
        );
        inputImage.val('');
      }
    }

    img.src = imageBLOB;
  });

  imageDropArea.on('click', function(e) {
    e.preventDefault();
    if ( e.target.tagName == 'BUTTON' || e.target.tagName == 'I' ) {
      inputImage.val('');
      $(this).html(`<div class="m-0 pt-3 text-break">
          <h6 class="mb-0">Select your profile image</h6>
          <p class="mb-0 text-center">500 &times; 500</p>
        </div>
      `);
    }
  });  

  $('form#changeProfileImageForm').on('submit', function(e) {
    if ( !inputImage.val() ) {
      e.preventDefault();
      Swal.fire(
        'Profile image empty!',
        'Please drop your profile image',
        'warning'
      );
    }
  });
</script>