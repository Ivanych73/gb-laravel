$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("[data-delete]").each(function(){
    $(this).click(function() {
        const id = $(this).data('id')
        const type = $(this).data('type')
        if (confirm(`Вы действительно хотите удалить запись с ID ${id}?`)) {
            $.ajax(
                {
                    url: `/admin/${type}/${id}`,
                    method: "delete",
                    success: function(res) {
                        if (res == 'success') {
                            alert('Запись успешно удалена!')
                        }else {
                            alert('Ошибка удаления записи!')
                        }
                        location.reload()
                    }
                }
            )
        }
    })
})