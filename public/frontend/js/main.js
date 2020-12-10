$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// function search fulltext tile room,da lay dc du lieu json, se viet js in ra web khi co frontend
function searchTitle(key_title) {

        $.ajax({
            url: base_url + '/room/search/'+key_title, // base_url được khai báo ở đầu page == http://renthouse.co
            type: 'GET',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                console.log(response);
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
}
