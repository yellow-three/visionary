import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    /*plugins: [
        laravel({
            buildDirectory: 'bundle',
            input: [
                'resources/assets/js/app.js',
                // 'resources/scss/styles.scss',
            ],
        }),
    ],*/
    resolve: {
        alias: {
            '@visionary': path.resolve(__dirname, 'resources'),
        },
    },
    build: {
        manifest: 'assets.json', // Customize the manifest filename...
        outDir: path.resolve(__dirname, 'publishable'),
    },
});
