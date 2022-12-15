const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const webpack = require('webpack');

module.exports = {
    entry: './src/assets/jquery/index.js',
    module: {
        rules: [
          { test: /\.(js)$/, use: 'babel-loader' }
        ]
      },
    output: {
        path: path.resolve(__dirname, './public/assets/jquery'),
        filename: 'jquery.js'
    },

    plugins: [
        new HtmlWebpackPlugin(),
        new webpack.ProvidePlugin({
          $: 'jquery',
          jQuery: 'jquery'
        })
    ],

    mode: "production"
}