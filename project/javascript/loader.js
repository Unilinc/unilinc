window.addEventListener('load', function() {
    function checkConnection() {
        if (!navigator.onLine) {
            document.getElementById('connectionMessage').style.display = 'block';
            setTimeout(function() {
                if (!navigator.onLine) {
                    document.getElementById('connectionMessage').innerText = "Internet connection disabled. Please Reconnect!";
                }
            }, 10000); 
        }
    }

    checkConnection();

    setTimeout(function() {
        if (navigator.onLine) {
            document.getElementById('preloader').style.display = 'none';
        } else {
            setTimeout(function() {
                if (navigator.onLine) {
                    document.getElementById('preloader').style.display = 'none';
                }
            }, 10000); 
        }
    }, 2000); 
});