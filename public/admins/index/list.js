function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    Swal.fire({
        title: 'Bạn chắc chắn muốn xóa',
        text: "Sau khi xóa không thể phục hồi",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xóa',
        cancelButtonText: 'Hủy',

    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();
                    }
                    Swal.fire(
                        'Xóa thành công!',
                        '',
                        'success'
                    )
                },
                error: function () {}
            });

        }
    })
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $(document).on('click', '.action_delete', actionDelete);
});

function search() {
    if (event.key === 'Enter') {
        searchButton()
    }
}

function searchButton(searchParams) {
    if (!searchParams) {
        searchParams = new URLSearchParams(window.location.search)
    }
    searchParams.set('query', $('#input_search').val())
    window.location.search = searchParams.toString()
}

const url = new URL(decodeURIComponent(window.location.href));
$('#input_search').val(url.searchParams.get("query"))


if (url.searchParams.get("category")){
    $('.category').val(url.searchParams.get("category"))
}

$(document).ready(function () {
    $(".category").change(function () {
        let id = $(".category").val();
        let searchParams = new URLSearchParams(window.location.search)
        searchParams.set('category', id)
        window.location.search = searchParams.toString()
    })
})

if(url.searchParams.get("type")){
    $('.type').val(url.searchParams.get("type"))
}

$(document).ready(function () {
    $(".type").change(function () {
        let id = $(".type").val();
        let searchParams = new URLSearchParams(window.location.search)
        searchParams.set('type', id)
        window.location.search = searchParams.toString()
    })
})

$(document).ready(function () {
    $(".route").change(function () {
        let id = $(".route").val();
        let searchParams = new URLSearchParams(window.location.search)
        searchParams.set('route', id)
        window.location.search = searchParams.toString()
    })
})

$(document).ready(function () {
    $(".comp").change(function () {
        let id = $(".comp").val();
        let searchParams = new URLSearchParams(window.location.search)
        searchParams.set('comp', id)
        window.location.search = searchParams.toString()
    })
})

