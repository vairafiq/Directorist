const common                 = require("./webpack.common");
const { merge }              = require('webpack-merge');
const MiniCssExtractPlugin   = require("mini-css-extract-plugin");
const WebpackRTLPlugin       = require("webpack-rtl-plugin");
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

const prodConfig = {
  mode: "production", // production | development
  watch: false,
  
  plugins: [
    new CleanWebpackPlugin({
      cleanOnceBeforeBuildPatterns: [ 'css/*', 'js/*' ]
    }),
    new MiniCssExtractPlugin({
      filename: "css/[name].min.css",
      minify: true,
    }),
    new WebpackRTLPlugin({
      minify: true,
    }),
  ],

  output: {
    filename: "js/[name].min.js",
  },
};

let configs = [];
common.forEach(element => {
  const _config = merge( element, prodConfig );
  configs.push( _config );
});

module.exports = configs;