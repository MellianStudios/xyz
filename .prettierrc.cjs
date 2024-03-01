module.exports = {
    printWidth: 120,
    trailingComma: 'all',
    tabWidth: 4,
    semi: true,
    singleQuote: true,
    bracketSpacing: true,
    importOrder: ['^@/(.*)$', '^[./]'],
    importOrderSeparation: false,
    importOrderSortSpecifiers: true,
    plugins: ['@trivago/prettier-plugin-sort-imports'],
};
