import purgecssModule from '@fullhuman/postcss-purgecss';
import autoprefixer from 'autoprefixer';

// Правильный способ получения функции purgecss
const purgecss = purgecssModule.default || purgecssModule;

const isProduction = process.env.NODE_ENV === 'production';

export default {
  plugins: [
    autoprefixer,
    ...(isProduction ? [
      purgecss({
        content: [
          './resources/views/**/*.blade.php',
          './resources/js/**/*.vue',
          './resources/js/**/*.js',
          './node_modules/@fancyapps/ui/**/*.js' // Добавляем fancybox
        ],
        defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || [],
        safelist: [
          /data-v-.*/, // Для scoped-стилей Vue 2
          /^fancybox-/, /^carousel-/, // Для fancybox
          /^bg-/, /^text-/, /^hover:/, /^focus:/ // Для Tailwind
        ]
      })
    ] : [])
  ]
};