/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'lara': 'rgba(245, 158, 11, 1   )',
            }
        },
    },
    plugins: [],
}

