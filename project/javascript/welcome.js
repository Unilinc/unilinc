let timeoutId;

function checkConnection() {
    if (navigator.onLine) {
        if (!timeoutId) {
            timeoutId = setTimeout(() => {
                window.location.href = "/project/home.html"; 
            }, 5000);
        }
    } else {
        clearTimeout(timeoutId); 
        timeoutId = null; 
    }
}

window.addEventListener('load', () => {
    checkConnection(); 
    window.addEventListener('online', checkConnection);
    window.addEventListener('offline', checkConnection);
});
