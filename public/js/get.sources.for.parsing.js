// $('button[type=submit]').click((event) => {
//     event.preventDefault();
//     const urls = [];
//     $('input:checked').each(function() {
//         if($(this).attr('id') != 'selectAll') {
//             urls.push($(this).val());
//             //$('input[name="urls[]"]').val($(this).val())
//         }
//     });
//     $('input[name="urls[]"]').val(urls);
//     console.log($('input[name="urls[]"]').val());
// });

$('form').submit(function(){
    const urls = [];
    $('input:checked').each(function() {
        if($(this).attr('id') != 'selectAll') {
            urls.push($(this).val());
        }
    });
    $('input[name="urls[]"]').val(urls);
});
