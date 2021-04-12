const registerForm = document.getElementById('register');
const submitRegisterForm = document.querySelector('.register__btn');
const registerBtn = document.querySelector('.login__register-btn');
const registerModal = document.getElementById('register-modal');
const closeModal = document.querySelector('.modal .close-btn');
const notifyModal = document.getElementById('notify-modal');
const notifyModalBtn = document.querySelector('#notify-modal .button');

function toggleModal(event) {
    event.preventDefault();
    registerModal.classList.toggle('modal--active');
}

function validateString(data, pattern) {
    return pattern.test(data);
}

function validate(dataObj) {
    const errors = {};
    let pattern;

    for (let key in dataObj) {
        if (key === 'username') {
            pattern = /^[a-zA-Z0-9_]{1,20}$/;

            if (validateString(dataObj[key], pattern) === false) {
                errors.username = 'Username must have at least 1 character and less than or equal 20 characters';
            }
        } else if (key === 'password') {
            pattern = /^[a-zA-Z0-9_]{1,20}$/;

            if (validateString(dataObj[key], pattern) === false) {
                errors.password = 'Password must have at least 1 character and less than or equal 20 characters';
            }     
        } else if (key === 'confirmPassword') {
            if (dataObj[key] != dataObj['password']) {
                errors.confirmPassword = 'The password does not match the confirm password';
            }
        } else {
            errors.undefine = 'The validate type does not been defined';
        }
    }

    return errors;
}

function createElement(tagName, className, content) {
    const elem = document.createElement(tagName);
    elem.classList.add(className);
    elem.innerHTML = content;

    return elem;
}

registerBtn.addEventListener('click', toggleModal);
closeModal.addEventListener('click', toggleModal);

if (notifyModalBtn != null) {
    notifyModalBtn.addEventListener('click', function() {
        notifyModal.remove();
    });
}

submitRegisterForm.addEventListener('click', function(event) {
    event.preventDefault();

    const data = {
        'username': registerForm['username'].value,
        'password': registerForm['password'].value,
        'confirmPassword': document.getElementById('confirm-password').value
    };

    const errors = validate(data);

    if (Object.keys(errors).length === 0 && errors.constructor === Object) {
        registerForm.submit();
    } else {
        errorElement = document.querySelector('.input-error');
        
        if (errorElement != null) {
            errorElement.remove();
        }

        errorElement = createElement('div', 'input-error', '');
        errorElement.classList.add('mb-16');

        for (let key in errors) {
            errorChild = createElement('p', 'input-error__item', errors[key]);
            errorElement.appendChild(errorChild);
        }

        const lastChild = document.getElementById('register').lastElementChild;
        lastChild.insertAdjacentElement('beforebegin', errorElement);
    }
});