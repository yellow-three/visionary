import { defineConfig,loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig(({ mode }) =>{

    const envDir = "../../../";

    Object.assign(import.meta.env, loadEnv(mode, envDir));

    return {
        server: {
            host: import.meta.env.VITE_HOST || "localhost",
            port: import.meta.env.VITE_PORT || 5173,
        },
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

        experimental: {
            renderBuiltUrl(filename, { hostId, hostType, type }) {
                if (hostType === "css") {
                    return path.basename(filename);
                }
            },
        },
    }
});
