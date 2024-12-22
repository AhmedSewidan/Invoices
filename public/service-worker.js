
self.addEventListener('push', function(event) {
    var options = {
        body: event.data.text(),
        icon: 'path-to-icon.png',
        badge: 'path-to-badge.png',
    };

    event.waitUntil(
        self.registration.showNotification('New Comment', options)
    );
});
