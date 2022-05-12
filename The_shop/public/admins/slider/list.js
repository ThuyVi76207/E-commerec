function action_delete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    
    let that = $(this);
    Swal.fire({
        title: 'Xóa slider?',
        text: "Bạn không thể khôi phục dữ liệu khi xóa!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Thoát", 
        confirmButtonText: 'Xóa!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function(data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                        Swal.fire(
                            'Xóa thành công!',
                            'Slider đã bị xóa.',
                            'success'
                        )
                    }
                },
                error: function() {

                }
            })
        }
      })
}

$(function() {
    $(document).on('click','.action_delete', action_delete);
});