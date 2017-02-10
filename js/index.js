function showLogin() {
	document.getElementById('loginform').style.display = 'block';
	document.getElementById('registerform').style.display = 'none';
	document.getElementById('pwresetform').style.display = 'none';
}

function showRegister() {
	document.getElementById('loginform').style.display = 'none';
	document.getElementById('registerform').style.display = 'block';
	document.getElementById('pwresetform').style.display = 'none';
}

function showPwreset() {
	document.getElementById('loginform').style.display = 'none';
	document.getElementById('registerform').style.display = 'none';
	document.getElementById('pwresetform').style.display = 'block';
}
