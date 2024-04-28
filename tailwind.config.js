import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
export default {
    mode: "jit",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/*.blade.php",
        "./resources/js/**/*.vue",
        "./resources/**/*.js",
        "./resources/**/*.css",
    ],
    theme: {
        extend: {

            colors: {
                primary_color: '#3DC9B7',
                background_color: "#162220",
                basic: "#E7E8E7",
                natural: "#FEFFFE",
                placeholder_color: "#8C8C8C",
                logo: "#C3EEE9",
                site: "#6C0CE9",
                tags: "#108C1E",
                guards: "#C5A816",
                green: colors.green,
                table: "#EAECF0",
                checkin: "#E8F9EA",
                checkInText: '#0C6C17',
                checkout: "#EDE4B7",
                checkOutText: "#8C7710",
                db: "#212D2B",
                logout: "#344054",
                foundation: "#0C6C17",
                inactive: "#8C1810",
                error: "#ed64a6",
                filter: "#010501",
                filter_text: '#B4B5B4',
                filterInput: "#D0D5DD",
                col1: "#000000",
                col2: "#E63026",
                col3: "#1A544D",
                col4: "#ECFAF8",
                col5: "#565C56"
            },
            padding: {
                "1%": '1%',
                "2%": "2%",
                "10%": "10%",
                "5%": "5%",
                "basic_padding": "5%",
                'small': '2%',
                "smaller": "1%",
                "smallest": "0.5%"
            },
            spacing: {
                '5%': '5%',
                '2%': '2%',
                'mainMargin': "5%"
            },
            fontFamily: {
                primary: ['Inter'],
            },
            fontSize: {
                size1: '1em',
                size2: "0.875em",
                header: "2.25em",
                big: "20px",
                bigger: "30px",
                normal: "14px",
                small: "12px",
                medium: "16px",
                eighteen: "18px"
            },
            fontWeight: {
                big: "500",
                normal: "400",
                bigger: "700",
            }
        },
    },

    plugins: [forms],
};
