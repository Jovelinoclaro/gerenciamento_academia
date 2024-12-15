// load-footer.js
window.onload = function() {
    fetch('footer.html')
    .then(response => response.text())
    .then(data => {
        document.body.insertAdjacentHTML('beforeend', data);
    });
};
