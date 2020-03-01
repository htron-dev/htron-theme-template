const path = require('path');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
    entry: "./assets/js/index.js",
    mode: process.env.NODE_ENV,
    output: {
        path: path.resolve(__dirname, 'assets/dist/js'),
        filename: "main.js",
        hotUpdateChunkFilename: 'hot/hot-update.js',
        hotUpdateMainFilename: 'hot/hot-update.json'
    },   
    module: {
      rules: [
        {
          test: /\.js$/,         
          use: {
            loader: 'babel-loader',
            options: {
             presets: ['env']
            }
          }
        },
        {
          test: /\.s[ac]ss$/i,
          use: [
            MiniCssExtractPlugin.loader,
            'css-loader',
            'sass-loader',
          ],
        }
      ]
    },
    plugins:[
      new MiniCssExtractPlugin({
        filename: 'css/[name].css',
        chunkFilename: 'css/[id].css',
      }),
      new BrowserSyncPlugin({
        open: false,
        host: "localhost",
        proxy: "localhost:8080",
        port: "8080",
        files: ["./**/*.php", "./assets/js/**/*.js"],
        reloadDelay: 0
      }),
    ]
}