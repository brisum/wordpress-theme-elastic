'use strict';

const NODE_ENV = process.env.NODE_ENV || 'development';
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const AssetsPlugin = require('assets-webpack-plugin');
const ConcatPlugin = require('webpack-concat-plugin');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const webpack = require('webpack');
const path = require('path');
const glob = require('glob');
const rimraf = require('rimraf');
const fs = require('fs');

// Plugin
const extractTextPluginCss = new ExtractTextPlugin({
    filename: '[name].css?[contenthash]',
    allChunks: true
});


class Project {
    constructor() {
        this._aliases = null;
        this.requireInitDist = __dirname + '/resources/src/js/lib/require-init.dist.js';
        this.requireInit = __dirname + '/resources/src/js/lib/require-init.js';
    }

    generateRequireInit() {
        let self = this,
            requireAliasTemplate = null,
            cases = [];

        fs.readFile(self.requireInitDist, 'utf8', function (err, content) {
            if (err) {
                return console.log(err);
            }

            requireAliasTemplate = content.match(/\/\* case template:([\s\S]+)\*\//)[1];

            Object.keys(self.getAliases()).forEach(function (aliasName) {
                cases.push(requireAliasTemplate.replace(/{{name}}/g, aliasName));
            });

            content = content.replace('// {{cases}}', cases.join("\n"));

            fs.writeFile(self.requireInit, content, function (err) {
                if (err) {
                    console.log(err);
                }

                console.log('Generate require-init.js');
            });
        });
    }

    getAliases() {
        let self = this;

        if (!self._aliases) {
            self._aliases = {};

            let vendor = {
                //
            };
            Object.keys(vendor).forEach(function (alias) {
                self._aliases[alias] = vendor[alias];
            });

            let libBasePath =  __dirname + '/resources/src/js/lib/';
            glob.sync(libBasePath + '**/*.js').forEach(function (path) {
                let alias = 'lib-' + Project.generateAliasName(path, libBasePath);
                self._aliases[alias] = path;
            });

            let moduleBasePath =  __dirname + '/resources/src/js/module/';
            glob.sync(moduleBasePath + '**/*.js').forEach(function (path) {
                let alias = Project.generateAliasName(path, moduleBasePath);
                self._aliases[alias] = path;
            });

            let phpModulePath =  __dirname + '/module/';
            glob.sync(phpModulePath + '*/Resources/js/**/*.js').forEach(function (path) {
                if (path.match(/\/[A-Z][^\/]*\.js$/)) {
                    return;
                }

                let basePath = path.replace(
                    /^(.+\/module\/[^\/]+\/Resources\/js\/)(.+)$/g,
                    function (_, match1, match2) { return match1; }
                    ),
                    alias = Project.generateAliasName(path, basePath);
                self._aliases[alias] = path;
            });

            let adminBasePath =  __dirname + '/resources/src/js/admin/';
            glob.sync(adminBasePath + '**/*.js').forEach(function (path) {
                let alias = 'admin-' + Project.generateAliasName(path, adminBasePath);
                self._aliases[alias] = path;
            });


            delete self._aliases['lib-require-init.dist'];

            console.log(self._aliases);
        }

        return self._aliases;
    }

    static generateAliasName(filePath, basePath) {
        return filePath
            .replace(basePath, '')
            .replace(/\//g, '-')
            .replace(
                /([a-z0-9-])([A-Z])/g,
                function (_, char1, char2) { return ('-' !== char1 ? char1 : '') + '-' + char2.toLowerCase(); }
            )
            .replace(/\.[^\.]+$/, '');
    }

    getPlugins() {
        let plugins = [];

        plugins.push({ apply: (compiler) => { rimraf.sync(compiler.options.output.path); } });
        // plugins.push({ apply: (compiler) => { rimraf.sync(compiler.options.output.path + '-module'); } });

        plugins.push(extractTextPluginCss);

        plugins.push(new AssetsPlugin({
            prettyPrint: true,
            filename: 'resources.json',
            path: __dirname + '/resources/dist'
        }));

        plugins.push(new ConcatPlugin({
            uglify: NODE_ENV === 'production',
            useHash: true, // md5 file
            sourceMap: false, // generate sourceMap
            name: 'jquery', // used in html-webpack-plugin
            fileName: '[name].js?[hash]',
            filesToConcat: [
                __dirname + '/node_modules/jquery/dist/jquery.min.js',
                __dirname + '/node_modules/jquery-migrate/dist/jquery-migrate.min.js',
                __dirname + '/node_modules/what-input/dist/what-input.min.js'
            ]
        }));

        if (NODE_ENV === 'production') {
            plugins.push(new UglifyJsPlugin({
                test: /\.js($|\?)/i,
                cache: true,
                parallel: 4,
                sourceMap: false
            }));
        }

        plugins.push(new webpack.LoaderOptionsPlugin({
            debug: NODE_ENV !== 'production'
        }));

        return plugins;
    }
}
let project = new Project();

project.generateRequireInit();

module.exports = {
    context: __dirname + '/resources/src',
    entry: {
        style: './scss/foundation.scss',
        main: [
            './../../node_modules/motion-ui/dist/motion-ui.min.js',
            './../../node_modules/foundation-sites/dist/js/foundation.min.js',

            // thirdparty
            './../../node_modules/jquery.cookie/jquery.cookie.js',

            // Vendor scripts
            './../../vendor/brisum/lib-form/src/Resources/js/jquery.serializeJSON.js',
            './../../vendor/brisum/lib-form/src/Resources/js/jquery.brisum.astute-form.js',

            './js/main.js'
        ],
        admin_style: './scss/admin/foundation.scss',
        admin_main: [
            './../../node_modules/foundation-sites/dist/js/foundation.min.js',

            // Include your own custom scripts (located in the custom folder)
            './js/admin/main.js'
        ]
    },

    output: {
        path: __dirname + '/resources/dist',
        publicPath: '/wp-content/themes/elastic/resources/dist/',
        filename: '[name].js?[chunkhash]',
        chunkFilename: 'js/chunk/[name].[id].js?[chunkhash]',
        library: '[name]'
    },

    resolve: {
        extensions: ['.js', '.css', '.scss'],
        alias: project.getAliases()
    },

    externals: {
        "jquery": "jQuery"
    },

    devtool: NODE_ENV === 'development' ? "source-map" : false,

    watchOptions: {
        aggregateTimeout: 300
        // poll: 1000
    },

    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [ "babel-preset-es2015" ].map(require.resolve)
                    }
                }
            },
            {
                test: /\.jade$/,
                use: {
                    loader: "jade-loader"
                }
            },
            {
                test: /\.css$/,
                use: extractTextPluginCss.extract(['css-loader', 'resolve-url-loader'])
            },
            {
                test: /\.scss$/,
                use: extractTextPluginCss.extract(['css-loader?sourceMap', 'resolve-url-loader?sourceMap', 'sass-loader?sourceMap'])
            },
            {
                test: /\.(gif|png|jpg|svg|ttf|eot|woff|woff2)(\?\S*)?/,
                use: {
                    loader: 'file-loader',
                    options: {
                        filename: '[path][name].[ext]?[hash:6]'
                    }
                }
            }
        ]
    },

    plugins: project.getPlugins()
};

// NODE_ENV=production webpack --optimize-minimize
// NODE_ENV=development webpack --watch
