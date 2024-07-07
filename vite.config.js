import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [
    laravel({
      input: ["src/resources/sass/app.scss", "src/resources/js/app.js"],
      refresh: true
    })
  ]
});
