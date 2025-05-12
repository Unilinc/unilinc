const CACHE_NAME = 'unilink_cache';
const urlsToCache = [
  '/',
  '/project/home.html',
  '/project/login.html',
  '/project/signup.html',
  '/project/welcome.html',
  '/project/css/home.css',
  '/project/css/login.css',
  '/project/css/signup.css',
  '/project/css/welcome.css',
  '/project/javascript/home.js',
  '/project/javascript/counter.js',
  '/project/javascript/loader.js',
  '/project/javascript/welcome.js',
  '/project/javascript/login.js',
  '/project/javascript/signup.js',
  '/project/javascript/student_info.js',
  '/project/javascript/lecturer_info.js',
  '/project/javascript/validate_form.js',
  '/project/images/logo.jpg',
  '/project/images/my-brand.JPG',
  '/project/images/img-head.png',
  '/project/images/apple.JPG',
  '/project/images/google.JPG',
  '/project/images/mobile-and-web.png',
  '/project/images/support.png',
  '/project/images/marketplace.png',
  '/project/images/scanner.png',
  '/project/images/rating.png',
  '/project/images/design.png',
  '/project/images/icon.JPG',
  '/project/images/nav_bar-logo.png'
];

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(CACHE_NAME).then(function(cache) {
      return cache.addAll(urlsToCache);
    })
  );
});

self.addEventListener('install', function(event) {
    event.waitUntil(
      caches.open(CACHE_NAME).then(function(cache) {
        return Promise.all(
          urlsToCache.map(url =>
            fetch(url)
              .then(response => {
                if (!response.ok) {
                  throw new Error('Failed to fetch ' + url + ': ' + response.status);
                }
                return cache.put(url, response.clone());
              })
          )
        );
      })
    );
  });