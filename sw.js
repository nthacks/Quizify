self.addEventListener('install', function(e) {
	e.waitUntil(
    caches.open('quizify-cache').then(function(cache) {
      return cache.addAll([
        '/',
        '/index.php',
        '/favicon-16x16.png',
		'/favicon-32x32.png',
		'/android-chrome-144x144.png',
		'/android-chrome-192x192.png',
		'/android-chrome-256x256.png',
		'/android-chrome-36x36.png',
		'/android-chrome-384x384.png',
		'/android-chrome-48x48.png',
		'/android-chrome-512x512.png',
		'/android-chrome-72x72.png',
		'/android-chrome-96x96.png',
		'/android-chrome-144x144.png',
		'/web_hi_res_512.png',
		'/site.js',
        '/manifest.json',
        '/styles.css',
		'/js/mt.js',
		'/js/o.min.js',
		'/js/x.min.js',
		'/js/smoothState.min.js',
		'/student/config.php',
		'/student/generate.php',
		'/student/GenerateQuiz.php',
		'/student/shuffle.php',
		'/student/HelveticaNeue.ttf',
		'/teacher/config.php',
		'/teacher/FormPage.php',
		'/teacher/SubmitQuestion.php'
      ]);
    })
  );
});
self.addEventListener('fetch', function(event) {
	event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});