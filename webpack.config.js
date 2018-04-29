const path = require('path');
const {VueLoaderPlugin} = require('vue-loader');

function resolve(dir) {
	return path.resolve(__dirname, dir);
}

module.exports = {
	entry: {
		app: './app/main.js'
	},
	output: {
		filename: 'bundle.js',
		path: resolve('dist'),
		publicPath: "dist/"
	},
	resolve: {
		extensions: ['.js', '.vue'],
		alias: {
			'vue$': 'vue/dist/vue.esm.js',
			'@components': resolve('app/components/')
		}
	},
	module: {
		rules: [
			{
				test: /\.vue$/,
				loader: 'vue-loader'
			},
			{
				test: /\.css$/,
				use: ['style-loader', 'css-loader']
			},
			{
				test: /\.(png|svg|jpg|gif)$/,
				use: ['file-loader']
			}
		]
	},
	plugins: [
		new VueLoaderPlugin()
	],
	node: {
		fs: "empty"
	}
};
