// // const cacheName = 'uparkCache';
// // const staticAssets = [
// //     '/assets/css/style.css',
// //     '/assets/img/fondo.png',
// //     '/assets/js/scripts.js',
// //     '/assets/js/app.js',
// //     '/assets/sw.js',
// //     '/img/back.jpg',
// //     '/img/background.jpg',
// //     '/img/login.jpg',
// //     '/manifest.json',
// //     '/offline.html',
// //     '/assets/favicon.ico',
// //     '/images/icons/icon-72x72.png',
// //     '/images/icons/icon-96x96.png',
// //     '/images/icons/icon-128x128.png',
// //     '/images/icons/icon-144x144.png',
// //     '/images/icons/icon-152x152.png',
// //     '/images/icons/icon-192x192.png',
// //     '/images/icons/icon-384x384.png',
// //     '/images/icons/icon-512x512.png',
// //     '/images/icons/splash-640x1136.png',
// //     '/images/icons/splash-750x1334.png',
// //     '/images/icons/splash-828x1792.png',
// //     '/images/icons/splash-1125x2436.png',
// //     '/images/icons/splash-1242x2208.png',
// //     '/images/icons/splash-1242x2688.png',
// //     '/images/icons/splash-1536x2048.png',
// //     '/images/icons/splash-1668x2224.png',
// //     '/images/icons/splash-1668x2388.png',
// //     '/images/icons/splash-2048x2732.png',
// // ];

// // self.addEventListener('install', (event) => {
// //     event.waitUntil(
// //         caches.open(cacheName)
// //             .then((cache) => {
// //                 console.log("Service worker instalado");
// //                 return cache.addAll(staticAssets);
// //             })
// //             .catch((error) => {
// //                 console.error("Error al instalar el service worker:", error);
// //             })
// //     );
// // });

// // self.addEventListener('fetch', (event) => {
// //     event.respondWith(
// //         caches.match(event.request).then((cachedResponse) => {
// //             // Si el recurso está en caché, lo devolvemos
// //             if (cachedResponse) {
// //                 return cachedResponse;
// //             }

// //             // Si el recurso no está en caché, lo solicitamos a la red
// //             return fetchAndUpdateCache(event.request).catch(() => {
// //                 // Si la solicitud a la red falla, devolvemos la página de offline
// //                 return caches.match('/offline.html');
// //             });
// //         })
// //     );
// // });

// // function fetchAndUpdateCache(request) {
// //     return fetch(request).then((response) => {
// //         // Verificamos si la respuesta es válida
// //         if (!response || response.status !== 200 || response.type !== 'basic') {
// //             return response;
// //         }

// //         // Clonamos la respuesta para usarla tanto en la caché como en el navegador
// //         const responseToCache = response.clone();

// //         // Actualizamos la caché con la nueva respuesta
// //         caches.open(cacheName).then((cache) => {
// //             cache.put(request, responseToCache);
// //         });

// //         return response;
// //     });
// // }

// const staticCacheName = "pwa-v1"; // Cambiar a una nueva versión cuando haya cambios en los archivos en caché

// const filesToCache = [
//     // Lista de archivos en caché
//     '/assets/css/style.css',
//     '/assets/img/fondo.png',
//     '/assets/js/scripts.js',
//     '/assets/js/app.js',
//     '/assets/sw.js',
//     '/img/back.jpg',
//     '/img/background.jpg',
//     '/img/login.jpg',
//     '/manifest.json',
//     '/offline.html',
//     '/assets/favicon.ico',
//     '/images/icons/icon-72x72.png',
//     '/images/icons/icon-96x96.png',
//     '/images/icons/icon-128x128.png',
//     '/images/icons/icon-144x144.png',
//     '/images/icons/icon-152x152.png',
//     '/images/icons/icon-192x192.png',
//     '/images/icons/icon-384x384.png',
//     '/images/icons/icon-512x512.png',
//     '/images/icons/splash-640x1136.png',
//     '/images/icons/splash-750x1334.png',
//     '/images/icons/splash-1242x2208.png',
//     '/images/icons/splash-1125x2436.png',
//     '/images/icons/splash-828x1792.png',
//     '/images/icons/splash-1242x2688.png',
//     '/images/icons/splash-1536x2048.png',
//     '/images/icons/splash-1668x2224.png',
//     '/images/icons/splash-1668x2388.png',
//     '/images/icons/splash-2048x2732.png'
// ];

// // Cache on install
// self.addEventListener("install", event => {
//     event.waitUntil(
//         caches.open(staticCacheName)
//             .then(cache => {
//                 return Promise.all(
//                     filesToCache.map(url => {
//                         return fetch(url)
//                             .then(response => {
//                                 if (!response.ok) {
//                                     throw new Error(`Failed to fetch ${url}`);
//                                 }
//                                 return cache.put(url, response);
//                             })
//                             .catch(error => {
//                                 console.error(`Error caching ${url}: ${error}`);
//                             });
//                     })
//                 );
//             })
//             .then(() => {
//                 console.log("Cache installation successful");
//             })
//             .catch(error => {
//                 console.error("Cache installation failed:", error);
//             })
//     );
// });


// // Clear cache on activate
// self.addEventListener('activate', event => {
//     event.waitUntil(
//         caches.keys().then(cacheNames => {
//             return Promise.all(
//                 cacheNames
//                     .filter(cacheName => cacheName.startsWith("pwa-") && cacheName !== staticCacheName)
//                     .map(cacheName => caches.delete(cacheName))
//             );
//         })
//     );
// });

// // Serve from Cache
// self.addEventListener("fetch", event => {
//     event.respondWith(
//         caches.match(event.request)
//             .then(response => {
//                 return response || fetch(event.request);
//             })
//             .catch(() => {
//                 return caches.match('/offline.html'); // Si la solicitud falla mientras el usuario está offline, servir la página offline
//             })
//     )
// });
