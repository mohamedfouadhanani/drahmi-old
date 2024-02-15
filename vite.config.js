import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/flash-messages.js",
                "resources/js/navbar.js",
                "resources/js/profile-dropdown.js",
                "resources/js/theme.js",
            ],
            refresh: true,
        }),
    ],
});
