function Validator(options) {
    var formElemnt = document.querySelector(options.form);
    if(formElemnt) {
        options.rules.forEach(function (rule) {
            var inputElement = formElemnt.querySelector(rule.selector);
            var errorElement = inputElement.parentElement.querySelector('.form-message');
            if (inputElement) {
                inputElement.onblur = function () {
                    var errorMessage = rule.test(inputElement.value);
                    if(errorMessage) {
                        errorElement.innerHTML = errorMessage;
                        inputElement.parentElement.classList.add('invalid');
                    }else {
                        errorElement.innerHTML = '';
                        inputElement.parentElement.classList.remove('invalid');
                    }
                }
            }
        });
    }
}

Validator.isRequired = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Tên Tiêu Đề'
        }
    }
}

Validator.isRequiredAddress = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Địa Chỉ Nhà Cụ thể'
        }
    }
}

Validator.isRequiredQuantity = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Số Phòng'
        }
    }
}

Validator.isRequiredPrice = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Giá Phòng'
        }
    }
}

Validator.isRequiredArea = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Diện Tích Của Phòng'
        }
    }
}

Validator.isRequiredArea = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Diện Tích Của Phòng'
        }
    }
}

Validator.isRequiredNote = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Mô Tả Phòng Trọ'
        }
    }
}

Validator.isRequiredelEctricPrice = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Giá Điện'
        }
    }
}

Validator.isRequiredelWaterPrice = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Giá Nước'
        }
    }
}

Validator.isRequiredelPriceUnit = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập Đơn Vị VD: ngày, tuần, tháng, năm'
        }
    }
}

Validator.isRequiredDescription = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : 'Vui Lòng Nhập mô tả'
        }
    }
}

//validator Select
function validatorSelect(options) {
    var formElemnt = document.querySelector(options.form);
    if(formElemnt) {
        options.rules.forEach(function (rule) {
            var selectElement = formElemnt.querySelector(rule.selector) ;
            var errorElement = selectElement.parentElement.querySelector('.form-message')
            if (selectElement) {
                selectElement.onblur = function () {
                    var errorMessage = rule.test(selectElement.value);
                    if(errorMessage) {
                        errorElement.innerHTML = errorMessage;
                        selectElement.parentElement.classList.add('invalid');
                    }else {
                        errorElement.innerHTML = '';
                        selectElement.parentElement.classList.remove('invalid');
                    }
                }
            }
        });
    }
}

validatorSelect.requiredTypeRoom = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            if (value != 0){
                return undefined;
            }else {
                var message = 'Vui Lòng Nhập Loại Phòng Trọ';
                return message;
            }
        }
    }
}

validatorSelect.requiredCity = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            if (value != 0){
                return undefined;
            }else {
                var message = 'Vui Lòng Nhập Tỉnh/Thành Phố';
                return message;
            }
        }
    }
}

validatorSelect.requiredDistrict = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            if (value != 0){
                return undefined;
            }else {
                var message = 'Vui Lòng Nhập Quận/Huyện';
                return message;
            }
        }
    }
}

