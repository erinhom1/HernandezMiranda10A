// navigator.serviceWorker.register('/assets/sw.js', { scope: '/assets/' })
//     .then(registration => {
//         console.log('Service Worker registrado correctamente:', registration);
//     })
//     .catch(error => {
//         console.error('Error al registrar Service Worker:', error);
//     });


if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/assets/sw.js', { scope: '/assets/' })
        .then((registration) => {
            console.log('Service Worker registrado:', registration.scope);
        })
        .catch((error) => {
            console.error('Service Worker no registrado:', error);
        });
}
