import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    publicDir: 'public',
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                "resources/css/app.css",
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),

    ],
    resolve: {
        alias: [
            {
                find: '@',
                replacement: '/resources/js'
            },
            {
                find: '~',
                replacement: '/node_modules'
            },
            {
                find: /^~(.*)$/,
                replacement: '$1',
            },
        ],

        extensions: ['.js', '.json', '.jsx', '.mjs', '.ts', '.tsx', '.vue'],


    },
});
