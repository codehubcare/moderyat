import { defineConfig } from "vite";

export default defineConfig({
  build: {
    rollupOptions: {
      input: ["src/resources/js/app.js", "src/resources/sass/app.scss"],
      output: {
        assetFileNames: "[name][extname]",
        dir: "src/public/",
        entryFileNames: "[name].js"
      }
    },
    manifest: false
  }
});
