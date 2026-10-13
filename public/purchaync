const Toast = Swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 2500,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

export function handleValidationErrors(errors) {
  if (errors) {
    for (let [key, obj] of Object.entries(errors)) {
      Toast.fire({
        icon: 'error',
        title: 'Uh Oh!',
        text: obj[0]
      });
      break;
    }
    return true;
  }
  return false
}

export function handleMessage(icon, title, message) {
  if (message) {
    Toast.fire({
      icon,
      title,
      text: message
    });
    return true;
  }
  return false
}

export function generateRandomString() {
  return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
}