const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontFamily: {
            dancing: "Dancing Script",
        },
        extend: {
            colors: {
                error: colors.red["600"],
                success: colors.green["600"],
                primary: colors.neutral,
            },
        },
    },
    plugins: [require("@tailwindcss/forms"), require("tailwind-scrollbar")],
};
