import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    optimizeDeps: {
        include: ['pusher-js', 'laravel-echo'], // Add dependencies here
    },
    build: {
        rollupOptions: {
            external: ['pusher-js', 'laravel-echo'],
        },
    },
});
