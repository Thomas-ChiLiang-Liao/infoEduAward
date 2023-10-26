function beforeSubmit() {
  document.getElementById('pw').value = SHA1( document.getElementById('pw').value );
  return true;
}