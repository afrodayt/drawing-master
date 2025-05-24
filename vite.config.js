import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue2';
import path from "path";

export default defineConfig({
    base: '/build',
    server: {
        https: process.env.APP_ENV === 'production', // HTTPS только на продакшене
    },

    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/less/app.less',
            ],
            refresh: true,
        }),
        vue(),
    ],

    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            'assets': path.resolve(__dirname, 'public/assets'),
            'img': path.resolve(__dirname, 'public/assets/img'),
        },
    },
     css: {
        postcss: {
          config: './postcss.config.mjs'
        }
    }
});

