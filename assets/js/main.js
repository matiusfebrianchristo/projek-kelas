// Untuk menyembunyikan password dan menampilkannya

let hidePass = true
let hidePass2 = true

// console.log(document.querySelector('.login .form .password .hide')); 

function hideShowPass(){
	const hideEl = document.querySelector('.login-register .form .password .hide')
	const showEl = document.querySelector('.login-register .form .password .show')
	const inputEl = document.querySelector('.login-register .form .password input')

	if (hidePass == true) {
		hideEl.classList.add('d-none')
		showEl.classList.remove('d-none')
		inputEl.setAttribute('type', 'text')
		// console.log(hideEl, showEl, "aman");

		hidePass = false
	} else {
		hideEl.classList.remove('d-none')
		showEl.classList.add('d-none')
		inputEl.setAttribute('type', 'password')
		// console.log(hideEl, showEl);

		hidePass = true
	}
}

function hideShowPass2(){
	const hideEl = document.querySelector('.login-register .form .confirmation .hide')
	const showEl = document.querySelector('.login-register .form .confirmation .show')
	const inputEl = document.querySelector('.login-register .form .confirmation input')

	if (hidePass2 == true) {
		hideEl.classList.add('d-none')
		showEl.classList.remove('d-none')
		inputEl.setAttribute('type', 'text')
		
		// console.log(hideEl, showEl, "aman");

		hidePass2 = false
	} else {
		hideEl.classList.remove('d-none')
		showEl.classList.add('d-none')
		inputEl.setAttribute('type', 'password')
		// console.log(hideEl, showEl);

		hidePass2 = true
	}
}

// ==============================================
// Untuk Login

// Ketika password atau username salah

function wrongUserPass() {
	windows.onload(() => {
		const result = document.getElementsByClassName('login-register')
		console.log(result) 
	})
}