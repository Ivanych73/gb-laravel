$(document).ready(()=>{
    $("[data-delete]").click(()=>{
        if(confirm('Вы действительно хотите удалить изображение?'))
        {    
            $("[data-image]").attr("src", "http://fakeimg.pl/300/")
            $('[name="removeImage"]').val(1)
            $('[name="image"]').val(null)
        }
    })
    $('[name="image"]').change(function(){
        const file = this.files[0];
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            $('[data-image]').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
})