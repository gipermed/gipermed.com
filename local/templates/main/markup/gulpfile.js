'use strict';

const gulp = require('gulp');
const	watch = require('gulp-watch');
const	plumber = require('gulp-plumber');
const	gutil = require('gulp-util');
const	less = require('gulp-less');
const	lessAutoprefix = require('less-plugin-autoprefix');
const	autoprefix = new lessAutoprefix({
	browsers: ['last 4 versions', 'IE 11']
});
const	sourcemaps = require('gulp-sourcemaps');
const uglifyes = require('uglify-es');
const composer = require('gulp-uglify/composer');
const uglify = composer(uglifyes, console);
const	cssmin = require('gulp-minify-css');
const	imagemin = require('gulp-imagemin');
const	pngquant = require('imagemin-pngquant');
const	htmlmin = require('gulp-htmlmin');
const	rimraf = require('rimraf');
const	babel = require('gulp-babel');
const	svgSprite = require('gulp-svg-sprites');
const	svgmin = require('gulp-svgmin');
const	cheerio = require('gulp-cheerio');
const	replace = require('gulp-replace');
const	fileinclude = require('gulp-file-include');
const	include = require('gulp-include');

const path = {
	src: {
		html: 'frontend/*.*',
		js: 'frontend/js/scripts.js',
		jsPlugins: 'frontend/js/plugins/**/*.*',
		less: 'frontend/less/styles.less',
		css: 'frontend/css/**/*.*',
		img: 'frontend/img/**/*.*',
		fonts: 'frontend/font/**/*.*'
	},
	dest: {
		html: 'public/',
		js: 'public/js/',
		css: 'public/css/',
		img: 'public/img/',
		fonts: 'public/font/'
	},
	watch: {
		html: 'frontend/**/*.*',
		js: 'frontend/js/**/*.js',
		jsPlugins: 'frontend/js/plugins/**/*.*',
		less: 'frontend/less/*.*',
		css: 'frontend/img/**/*.*',
		img: 'frontend/img/**/*.*',
		fonts: 'frontend/font/**/*.*'
	},
	clean: './public'
}

gulp.task('svgsprite', function () {
	return gulp.src('frontend/img/icons/*.svg')
		.pipe(cheerio({
			run: function ($) {
				$('[fill]').removeAttr('fill');
				$('[style]').removeAttr('style');
				$('clipPath').remove();
				$('[clip-path]').removeAttr('clip-path');
				$('path[id]').removeAttr('id');
			},
			parserOptions: { xmlMode: true }
		}))
		.pipe(replace('&gt;', '>'))
		.pipe(svgSprite({
				mode: "symbols",
				preview: false,
				selector: "icon-%f",
				svg: {
					symbols: 'sprite.html'
				}
			}
		))
		.pipe(gulp.dest('frontend/templates/'));
});

function handleError (error) {
	console.log(error.toString());
	this.emit('end');
}

gulp.task('clean', function (cb) {
	rimraf(path.clean, cb);
});

gulp.task('html', function(){
	return gulp.src(path.src.html)
	.pipe(fileinclude({
      prefix: '@@',
      basepath: 'frontend/templates/',
		indent: true
    }))
	.pipe(gulp.dest(path.dest.html))
})

gulp.task('html:min', function(){
	return gulp.src(path.src.html)
	.pipe(fileinclude({
		prefix: '@@',
		basepath: 'frontend/templates/',
		indent: true
    }))
	.pipe(htmlmin({
		collapseWhitespace: true,
		removeComments: true,
		minifyJS: true,
		minifyCSS: true,
		includeAutoGeneratedTags: false
	}))
	.pipe(gulp.dest(path.dest.html))
})

gulp.task('less', function(){
	return gulp.src(path.src.less)
	// .pipe(sourcemaps.init())
	.pipe(plumber({
		errorHandler: function (error) {
		gutil.log('Error: ' + error.message);
		this.emit('end');
	}}))
	.pipe(less({
		plugins: [autoprefix]
	}))
	// .pipe(sourcemaps.write())
	.pipe(gulp.dest(path.dest.css));
})

gulp.task('less:min', function () {
	return gulp.src(path.src.less)
	.pipe(plumber({
		errorHandler: function (error) {
		gutil.log('Error: ' + error.message);
		this.emit('end');
	}}))
	.pipe(less({
		plugins: [autoprefix]
	}))
	.pipe(cssmin())
	.pipe(gulp.dest(path.dest.css))
});

gulp.task('css', function(){
	return gulp.src(path.src.css)
	.pipe(cssmin())
	.pipe(gulp.dest(path.dest.css));
})

gulp.task('js', function () {
   return gulp.src(path.src.js)
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.on('error', handleError)
		.pipe(include())
		// .pipe(sourcemaps.init())
		// .pipe(sourcemaps.write())
		.pipe(gulp.dest(path.dest.js))
});

gulp.task('js:min', function () {
   return gulp.src(path.src.js)
		.pipe(babel({
			presets: ['@babel/env']
		}))
		.on('error', handleError)
		.pipe(include())
		.pipe(uglify({ 
			mangle: false,
			ecma: 6 
		}))
		.pipe(gulp.dest(path.dest.js))
});

gulp.task('js:plugins', function () {
   return gulp.src(path.src.jsPlugins)
		.pipe(gulp.dest(path.dest.js))
});

gulp.task('img', function () {
	return gulp.src(path.src.img, {cwd: process.cwd()})
	.pipe(gulp.dest(path.dest.img, {cwd: process.cwd()}))
});

gulp.task('img:min', function () {
	return gulp.src(path.src.img, {cwd: process.cwd()})
	.pipe(imagemin({
		progressive: true,
		svgoPlugins: [{
			removeViewBox: false
		}],
		use: [pngquant()],
		interlaced: true
	}))
	.pipe(gulp.dest(path.dest.img, {cwd: process.cwd()}))
});

gulp.task('fonts', function(){
	return gulp.src(path.src.fonts)
	.pipe(gulp.dest(path.dest.fonts))
})

gulp.task('watch', function () {
	gulp.watch(path.watch.html, gulp.task('html'));
	gulp.watch(path.watch.less, gulp.task('less'));
	gulp.watch(path.watch.css, gulp.task('css'));
	gulp.watch(path.watch.js, gulp.task('js'));
	gulp.watch(path.watch.jsPlugins, gulp.task('js:plugins'));
	gulp.watch(path.watch.img, gulp.task('img'));
	gulp.watch('frontend/img/icons/', gulp.task('svgsprite'));
	gulp.watch(path.watch.fonts, gulp.task('fonts'));
});

gulp.task('default', gulp.series('clean', 'svgsprite', 'html', 'css', 'less', 'js:plugins', 'js', 'img', 'fonts', 'watch'));
gulp.task('min', gulp.series('clean', 'svgsprite', 'html:min', 'css', 'less:min', 'js:plugins', 'js:min', 'img:min', 'fonts'));
gulp.task('build', gulp.series('clean', 'svgsprite', 'html', 'css', 'less', 'js:plugins', 'js', 'img:min', 'fonts'));