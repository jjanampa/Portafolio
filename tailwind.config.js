const colors = require("tailwindcss/colors");
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

const toRGB = (colors) => {
    const tempColors = Object.assign({}, colors);
    const rgbColors = Object.entries(tempColors);
    for (const [key, value] of rgbColors) {
        if (typeof value === "string") {
            if (value.replace("#", "").length == 6) {
                const aRgbHex = value.replace("#", "").match(/.{1,2}/g);
                tempColors[key] = `${parseInt(aRgbHex[0], 16)} ${parseInt(
                    aRgbHex[1],
                    16
                )} ${parseInt(aRgbHex[2], 16)}`;
            }
        } else {
            tempColors[key] = toRGB(value);
        }
    }
    return tempColors;
}


/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            colors: {
                rgb: toRGB({
                    inherit: colors.inherit,
                    current: colors.current,
                    transparent: colors.transparent,
                    black: colors.black,
                    white: colors.white,
                    slate: colors.slate,
                    gray: colors.gray,
                    zinc: colors.zinc,
                    neutral: colors.neutral,
                    stone: colors.stone,
                    red: colors.red,
                    orange: colors.orange,
                    amber: colors.amber,
                    yellow: colors.yellow,
                    lime: colors.lime,
                    green: colors.green,
                    emerald: colors.emerald,
                    teal: colors.teal,
                    cyan: colors.cyan,
                    sky: colors.sky,
                    blue: colors.blue,
                    indigo: colors.indigo,
                    violet: colors.violet,
                    purple: colors.purple,
                    fuchsia: colors.fuchsia,
                    pink: colors.pink,
                    rose: colors.rose,
                }),
                primary: "rgb(var(--color-primary) / <alpha-value>)",
                secondary: "rgb(var(--color-secondary) / <alpha-value>)",
                success: "rgb(var(--color-success) / <alpha-value>)",
                info: "rgb(var(--color-info) / <alpha-value>)",
                warning: "rgb(var(--color-warning) / <alpha-value>)",
                pending: "rgb(var(--color-pending) / <alpha-value>)",
                danger: "rgb(var(--color-danger) / <alpha-value>)",
                light: "rgb(var(--color-light) / <alpha-value>)",
                dark: "rgb(var(--color-dark) / <alpha-value>)",
                slate: {
                    50: "rgb(var(--color-slate-50) / <alpha-value>)",
                    100: "rgb(var(--color-slate-100) / <alpha-value>)",
                    200: "rgb(var(--color-slate-200) / <alpha-value>)",
                    300: "rgb(var(--color-slate-300) / <alpha-value>)",
                    400: "rgb(var(--color-slate-400) / <alpha-value>)",
                    500: "rgb(var(--color-slate-500) / <alpha-value>)",
                    600: "rgb(var(--color-slate-600) / <alpha-value>)",
                    700: "rgb(var(--color-slate-700) / <alpha-value>)",
                    800: "rgb(var(--color-slate-800) / <alpha-value>)",
                    900: "rgb(var(--color-slate-900) / <alpha-value>)",
                },
                darkmode: {
                    50: "rgb(var(--color-darkmode-50) / <alpha-value>)",
                    100: "rgb(var(--color-darkmode-100) / <alpha-value>)",
                    200: "rgb(var(--color-darkmode-200) / <alpha-value>)",
                    300: "rgb(var(--color-darkmode-300) / <alpha-value>)",
                    400: "rgb(var(--color-darkmode-400) / <alpha-value>)",
                    500: "rgb(var(--color-darkmode-500) / <alpha-value>)",
                    600: "rgb(var(--color-darkmode-600) / <alpha-value>)",
                    700: "rgb(var(--color-darkmode-700) / <alpha-value>)",
                    800: "rgb(var(--color-darkmode-800) / <alpha-value>)",
                    900: "rgb(var(--color-darkmode-900) / <alpha-value>)",
                },
            },
            strokeWidth: {
                0.5: 0.5,
                1.5: 1.5,
                2.5: 2.5,
            },
            fontFamily: {
                roboto: ["Roboto"],
            },
        },
    },

    plugins: [forms, typography, require('flowbite/plugin')],
};
