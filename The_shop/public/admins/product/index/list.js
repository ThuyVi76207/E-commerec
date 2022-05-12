function action_delete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    
    let that = $(this);
    Swal.fire({
        title: 'Xóa sản phẩm?',
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
                            'Sản phẩm đã bị xóa.',
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

//Banner
var slideIndex = 0;
let slideIndex1 = 1;

function plusSlides(n) {
    showSlides1(slideIndex1 += n);
    slideIndex = slideIndex1-1;
}
function currentSlide(n) {
    showSlides1(slideIndex1 = n);
    slideIndex = slideIndex1-1;
}
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds

}

showSlides();
function showSlides1(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex1 = 1}
    if (n < 1) {slideIndex1 = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex1-1].style.display = "block";
    dots[slideIndex1-1].className += " active";
}
