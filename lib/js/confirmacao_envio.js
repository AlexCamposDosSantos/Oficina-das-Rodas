function submitForm() {
    var form = document.getElementById('register_form');
    var formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        document.getElementById('successMessage').innerText = data;
        document.getElementById('successMessage').style.display = 'block';
        setTimeout(function() {
          document.getElementById('successMessage').style.display = 'none';
          window.location.href = 'painel.php';
        }, 4000);
      })
      .catch(error => console.error('Error:', error));

    return false;
  }