const VueLoaderPlugin = require('vue-loader/lib/plugin');

module.exports = {
  // モード値を production に設定すると最適化された状態で、
  // development に設定するとソースマップ有効でJSファイルが出力される
  mode: 'development',
  // mode: 'production',

  // メインとなるJavaScriptファイル（エントリーポイント）
  entry: "./src/_js/app.js",
  // ファイルの出力設定
  output: {
    //  出力ファイルのディレクトリ名
    path: `${__dirname}/public/assets/js/`,
    // 出力ファイル名
    filename: 'app.js'
  },
  // jQueryCDN用設定
  // externals: {
  //   jquery: 'jQuery',
  //   jquery: '$'
  // },
  module: {
    rules: [
      {
        test: /\.vue$/,
        use: [
          {
            loader: "vue-loader"
          }
        ]
      },
      {
        // 拡張子 .js の場合
        test: /\.js$/,
        use: [
          {
            // Babel を利用する
            loader: 'babel-loader',
            // Babel のオプションを指定する
            options: {
              presets: [
                // env を指定することで、ES2017 を ES5 に変換。
                // {modules: false}にしないと import 文が Babel によって CommonJS に変換され、
                // webpack の Tree Shaking 機能が使えない
                ['env', {'modules': false}]
              ]
            }
          }
        ],
        // node_modules は除外する
        exclude: /node_modules/,
      }
    ]
  },
  resolve: {
    // importするときに省略できる拡張子の設定
    extensions: ['.js', '.vue'],
    // aliasを追加
    alias: {
      'vue$': 'vue/dist/vue.esm.js'
    }
  },
  plugins: [
    // Vueを読み込めるようにするため
    new VueLoaderPlugin()
  ]
};
