import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
  plugins: [laravel(["src/resources/css/app.css", "src/resources/js/app.js"])]
});
