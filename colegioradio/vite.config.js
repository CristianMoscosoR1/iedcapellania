import { defineConfig } from 'vite';
import path from 'path';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';

export default defineConfig({
  server: {
    proxy: {
      '/app': 'http://localhost',
    },
  },
  publicDir: false, // Desactiva el uso de la carpeta 'public' como assets públicos
  build: {
    manifest: true, // Necesario para Laravel
    outDir: path.resolve(__dirname, 'public/build'), // Carpeta donde se colocarán los assets generados
    assetsDir: '', // Evita subcarpetas en 'build'
    rollupOptions: {
      input: [
        'resources/js/app.js',
        'resources/css/app.css'
      ],
    },

  },
  css: {
    postcss: {
      plugins: [
        tailwindcss(),
        autoprefixer(),
      ],
    },
  },
});
