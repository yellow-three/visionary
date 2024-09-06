import { defineConfig,loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig(({ mode }) =>{

    return {
        plugins: [
            laravel({
                hotFile: "frontend-visionary-vite.hot",
                publicDirectory: "publishable",
                buildDirectory: "build",
                /*buildDirectory: "themes/frontend/visionary/build",*/
                input: [
                    'resources/assets/js/app.js',
                    // 'resources/scss/styles.scss',
                ],
                refresh: true,
            }),
        ],
        build: {
            emptyOutDir: true,
            /*outDir: path.resolve(__dirname, 'publishable/build'),*/
        },
    }
});
