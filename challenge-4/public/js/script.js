document.querySelector('#toggleTheme').addEventListener('change', function () {
  if (this.checked == true) {
    document.cookie = 'theme=dark'
    location.reload()
  } else {
    document.cookie = 'theme=; Max-Age=0'
    location.reload()
  }
})
