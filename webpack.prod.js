const path = require("path");
const webpack = require("webpack");
const HtmlWebPackPlugin = require("html-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCssAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");
const glob = require("glob");

module.exports = {
  externals: {
    jquery: "jQuery",
  },
  entry: {
    main: "./src/index.js",

  },
  mode: "production",
  output: {
    filename: "js/app-qab1744ab2.js",
    libraryTarget: "var",
    library: "Client", // All of our javascipt code is accessible through this Client library.
  },
  module: {
    rules: [
      {
        test: "/.js$/",
        exclude: /node_modules/,
        loader: "babel-loader",
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          "css-loader?url=false",
          "sass-loader",
        ],
      },
      {
        test: /\.(png|jpe?g|gif|svg|pdf)$/i,
        use: [
          {
            loader: "file-loader",
          },
        ],
      },
    ],
  },
  optimization: {
    minimizer: [new TerserPlugin(), new OptimizeCssAssetsPlugin({})],
  },
  plugins: [
      /*
    new HtmlWebPackPlugin({
      template: "./src/index.html",
      filename: "./index.html",
      chunks: ["main"],
    }),
    */
 
    new MiniCssExtractPlugin({
      // Options similar to the same options in webpackOptions.output
      // all options are optional
      filename: "css/app-qc7bd6bdc9.css",
      //chunkFilename: '[id].css',
      ignoreOrder: false, // Enable to remove warnings about conflicting order
    }),
    new CopyPlugin({
      patterns: [{ from: "src/images", to: "images" }],
      options: {
        concurrency: 100,
      },
    }),
  ],
};
