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
                custom: {
                    'chart-1': 'hsl(217, 91%, 60%)',
                    'chart-2': 'hsl(214, 91%, 75%)',
                    'chart-3': 'hsl(222, 69%, 50%)',
                    'chart-4': 'hsl(195, 91%, 80%)',
                    'chart-5': 'hsl(214, 91%, 65%)',
                }
            }
        },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: [
            {
                light: {
                    "primary": "hsl(217, 100%, 55%)",
                    "primary-content": "hsl(210, 40%, 98%)",
                    "secondary": "hsl(214, 100%, 93%)",
                    "secondary-content": "hsl(222, 69%, 20%)",
                    "accent": "hsl(214, 100%, 93%)",
                    "accent-content": "hsl(222, 69%, 20%)",
                    "neutral": "hsl(222, 69%, 20%)",
                    "base-100": "hsl(195, 100%, 98%)",
                    "base-200": "hsl(214, 32%, 91%)",
                    "base-300": "hsl(214, 32%, 86%)",
                    "base-content": "hsl(222, 69%, 20%)",
                    "info": "hsl(217, 100%, 55%)",
                    "success": "hsl(142, 72%, 52%)",
                    "warning": "hsl(43, 96%, 56%)",
                    "error": "hsl(0, 84%, 60%)",
                },
                dark: {
                    "primary": "hsl(217, 91%, 60%)",
                    "primary-content": "hsl(222, 47%, 15%)",
                    "secondary": "hsl(217, 91%, 25%)",
                    "secondary-content": "hsl(213, 31%, 91%)",
                    "accent": "hsl(217, 91%, 25%)",
                    "accent-content": "hsl(213, 31%, 91%)",
                    "neutral": "hsl(222, 47%, 15%)",
                    "base-100": "hsl(222, 47%, 15%)",
                    "base-200": "hsl(217, 91%, 25%)",
                    "base-300": "hsl(217, 91%, 20%)",
                    "base-content": "hsl(213, 31%, 91%)",
                    "info": "hsl(217, 91%, 60%)",
                    "success": "hsl(142, 72%, 52%)",
                    "warning": "hsl(43, 96%, 56%)",
                    "error": "hsl(0, 84%, 60%)",
                }
            }
        ],
    },
} 