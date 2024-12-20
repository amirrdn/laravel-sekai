import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/dist', // Pastikan output directory ada di dalam folder public
        rollupOptions: {
          input: 'resources/js/app.js', // Path file entrypoint JS Anda
        },
      },
    resolve: {
        alias: {
            '$':  'jQuery',
        },
    },
});
