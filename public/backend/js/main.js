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

function checkExistsEmail() {
        let email = $('#email').val();
        if(email == '') {
            $('#email-msg').html('');
            $('#submit_btn').removeAttr('disabled');
        } else {
            let msg = '';
            $.ajax({
                url: base_url + '/checkExistsEmail/'+email, // base_url được khai báo ở đầu page == http://renthouse.co
                type: 'GET',
                data: {}, // dữ liệu truyền sang nếu có
                dataType: "json", // kiểu dữ liệu trả về
                success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                    if(response != true) {
                        $('#submit_btn').attr('disabled', 'true');
                        msg = 'Email này đã tồn tại. Vui lòng chọn email khác!';
                        $('#email-msg').html(msg);
                        $('#email-msg').css('color', 'red');
                    } else {
                        $('#submit_btn').removeAttr('disabled');
                        msg = 'Email này có thể sử dụng';
                        $('#email-msg').html(msg);
                        $('#email-msg').css('color', '#00fa04');
                    }
                },
                error: function (e) { // lỗi nếu có
                    console.log(e.message);
                }
            });
        }

}

function markAsRead(noti_id, pos) {

        $.ajax({
            url: base_url + '/owner/markAsRead/'+ noti_id, // base_url được khai báo ở đầu page == http://renthouse.co
            type: 'GET',
            data: {}, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true && pos == 'index') {
                    // xóa dòng vừa được click delete
                    $('.item-'+ noti_id).css('background-color', '#c2d6d6');
                    $('#be_seen-'+ noti_id).html('Đã xem');
                    $('#markAsRead-btn-'+noti_id).remove();
                    let my_tag = `<a href="javascript:void(0)" class="btn btn-danger" id="markAsUnRead-btn-${noti_id}" onclick="markAsUnRead( ${noti_id} , 'index')" >Đánh dấu là chưa xem</a>`;
                    $('#action-' + noti_id).append(my_tag);

                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
}

function markAsUnRead(noti_id, pos) {

    $.ajax({
        url: base_url + '/owner/markAsUnRead/'+ noti_id, // base_url được khai báo ở đầu page == http://renthouse.co
        type: 'GET',
        data: {}, // dữ liệu truyền sang nếu có
        dataType: "json", // kiểu dữ liệu trả về
        success: function (response) { // success : kết quả trả về sau khi gửi request ajax
            // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
            if (response.status != 'undefined' && response.status == true && pos == 'index') {
                // xóa dòng vừa được click delete
                $('.item-'+ noti_id).css('background-color', '#ffffff');
                $('#be_seen-'+ noti_id).html('Chưa xem');
                $('#markAsUnRead-btn-' + noti_id).remove();
                let my_tag = `<a href="javascript:void(0)" class="btn btn-danger" id="markAsRead-btn-${noti_id}" onclick="markAsRead( ${noti_id} , 'index')" >Đánh dấu là đã xem</a>`;
                $('#action-' + noti_id).append(my_tag);

            }
        },
        error: function (e) { // lỗi nếu có
            console.log(e.message);
        }
    });
}

