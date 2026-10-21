import js from '@eslint/js'
import globals from 'globals'
import eslintConfigPrettier from 'eslint-config-prettier'

export default [
  {
    ignores: [
      'public/**',
      'dist/**',
      'node_modules/**',
      'bs-config.js',
      'vite.config.mjs',
      'scripts/',
      'src/assets/js/plugins/',
    ],
  },
  js.configs.recommended,
  {
    languageOptions: {
      globals: {
        ...globals.browser,
        $: 'readonly',
        jQuery: 'readonly',
      },
      parserOptions: {
        ecmaVersion: 'latest',
        sourceType: 'module',
      },
    },
    rules: {
      'no-var': 'error',
      'no-new-cap': 'off',
      semi: ['error', 'always'],
    },
  },
  eslintConfigPrettier,
]
