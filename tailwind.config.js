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
                        'primary-purple': '#5534A5',
                        'dark-purple': '#3B2476',
                        'light-purple': '#7D62BA',
                        'soft-purple': '#DED7ED',
                        'hover-purple': '#4A2E90',
                        'bg-light': '#F8FAFC',
                        'card-gradient-start': '#6B4BE0',
                        'card-gradient-end': '#9B71F5',
                        'accent-green': '#10B981',
                        'accent-red': '#EF4444',
                        'accent-yellow': '#F59E0B',
                    },
                    boxShadow: {
                        'custom': '0 4px 15px rgba(0, 0, 0, 0.05)',
                        'xl-custom': '0 25px 50px -12px rgba(0, 0, 0, 0.08), 0 10px 20px -5px rgba(0, 0, 0, 0.02)',
                        'card-purple': '0 8px 16px -4px rgba(85, 52, 165, 0.15)',
                        'card-hover-glow': '0 0 15px rgba(85, 52, 165, 0.3)',
                    },
                    borderRadius: {
                        'xl-2xl': '1.5rem',
                        'lg-xl': '1rem',
                    }
        },
    },
    // plugins: [require("daisyui")],
    // daisyui: {
    //     themes: ["light"], // Hanya izinkan tema 'light'
    // },
};
