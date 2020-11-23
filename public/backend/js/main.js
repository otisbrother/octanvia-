// ajaxSetup() là phương thức set giá trị mặc định cho tất cả các request ajax tiếp theo
// Để gửi được request ajax chúng ta cũng cần xác thực csrf giống như Form
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/* Xóa một row - user */
function destroyUser(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa người dùng ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/user/'+id, // base_url được khai báo ở đầu page == http://renthouse.co
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}

/* Xóa một comment - user */
function destroyComment(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa bình luận này ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/comment/'+id, // base_url được khai báo ở đầu page == http://renthouse.co
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}

/* Xóa một comment - user */
function destroyReport(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa báo cáo này ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/report/'+id, // base_url được khai báo ở đầu page == http://renthouse.co
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}
function destroyRoom(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa bài đăng phòng này ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/room/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}
function destroyRoomType(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa loại phòng này ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/roomtype/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}

function destroyCity(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa Tỉnh / Thành Phố này ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/city/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}
function destroyDistrict(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa Quận/Huyện này ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/district/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}


function removeExtendRequest(id) {
    var result = confirm("Bạn có chắc chắn muốn duyệt bài gia hạn này ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/approveExtendRequest/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'GET',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}

function destroyRoomImage(id, role_id) {
    var role_url = '';
    if(role_id == 1) {
        role_url = 'admin';
    }
    else if(role_id == 2) {
        role_url = 'owner';
    }
    var result = confirm("Bạn có chắc chắn muốn xóa ảnh chi tiết này ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/' + role_url + '/roomimage/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('#detailImage'+id).remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}

function destroyRoomImage_byOwner(id) {
    var result = confirm("Bạn có chắc chắn muốn xóa ảnh chi tiết này ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/owner/roomimage/'+id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'DELETE',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('#detailImage'+id).remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}
// function approveOwnerAccount(id) {
//     var result = confirm("Bạn có chắc chắn muốn duyệt owner account này ?");
//     if (result) { // neu nhấn == ok , sẽ send request ajax
//         $.ajax({
//             url: base_url + '/admin/approveOwnerAccount/'+id, // base_url được khai báo ở đầu page == http://webshop.local
//             type: 'GET',
//             data: {}, // dữ liệu truyền sang nếu có
//             dataType: "json", // kiểu dữ liệu trả về
//             success: function (response) { // success : kết quả trả về sau khi gửi request ajax
//                 // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
//                 if (response.status != 'undefined' && response.status == true) {
//                     // xóa dòng vừa được click delete
//                     $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
//                 }
//             },
//             error: function (e) { // lỗi nếu có
//                 console.log(e.message);
//             }
//         });
//     }
// }

function getAllDistrict(city_id) {
        $.ajax({
            url: base_url + '/getListDistrict/'+city_id, // base_url được khai báo ở đầu page == http://webshop.local
            type: 'GET',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                //     console.log(response);

                $.each(response, function (i, item) {
                    el = `<option value="${item.id}">${item.name}</option>`;
                    $('#district').append(el);
                })
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
}


function approveRequestEditRoom(id) {
    var result = confirm("Bạn có chắc chắn muốn duyệt ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/approveRequestEditRoom/'+id, // base_url được khai báo ở đầu page == http://renthouse.co
            type: 'GET',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}

function declineRequestEditRoom(id) {
    var result = confirm("Bạn có chắc chắn muốn từ chối cho phép chỉnh sửa ?");
    if (result) { // neu nhấn == ok , sẽ send request ajax
        $.ajax({
            url: base_url + '/admin/declineRequestEditRoom/'+id, // base_url được khai báo ở đầu page == http://renthouse.co
            type: 'GET',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    $('.item-'+id).closest('tr').remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}
