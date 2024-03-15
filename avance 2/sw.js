self.addEventListener('install', event => {
    console.log("SW: service worker instalado")
    const installing = new Promise((resolve, reject)=>{
        setTimeout(() =>{
            console.log("SW: instalacion finalizada")
        },1000);
        self.skipWaiting();
        resolve();

    });
    event.waitUntil(installing);
});

self.addEventListener('activate', event =>{
    console.log("SW: service worker activated")
});