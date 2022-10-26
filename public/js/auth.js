function logoutfunction() {
  event.preventDefault();
  document.getElementById('logout-form').submit();
}

let logout = document.querySelector('.btn-logout');
logout.addEventListener('click', logoutfunction);

