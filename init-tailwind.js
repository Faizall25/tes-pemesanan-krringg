import fs from "fs";

// 1. Generate tailwind.config.js
const tailwindConfig = `/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
`;

fs.writeFileSync("tailwind.config.js", tailwindConfig);
console.log("✅ tailwind.config.js berhasil dibuat");

// 2. Generate postcss.config.js
const postcssConfig = `module.exports = {
  plugins: {
    tailwindcss: {},
    autoprefixer: {},
  },
}
`;

fs.writeFileSync("postcss.config.js", postcssConfig);
console.log("✅ postcss.config.js berhasil dibuat");
