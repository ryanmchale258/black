var gulp = require('gulp'),
	gutil = require('gulp-util'),
	compass = require('gulp-compass'),
	browserSync = require('browser-sync').create(),
	reload = browserSync.reload;

var env,
	siteSources,
	layoutSources,
	sassStyle,
	outputDir;

siteDir = './';
env = 'development';

siteSources = ['sass/**/*.scss'];
layoutSources = ['sass/layouts/content-sidebar.scss', 'sass/layouts/no-sidebar.scss'];

if(env === 'production') {
	sassStyle = 'compressed';
}else{
	sassStyle = 'expanded';
}

gulp.task('site', function(){
	gulp.src('sass/style.scss')
		.pipe(compass({
			sass: 'sass',
			css: siteDir,
			image: siteDir + 'images',
			style: sassStyle,
			sourcemap : true,
			debug : true,
			require: ['susy', 'breakpoint']
		})
		.on('error', gutil.log))
        .pipe(reload({stream: true}));;
});

gulp.task('layout', function(){
	gulp.src(layoutSources)
		.pipe(compass({
			sass: 'sass',
			css: siteDir,
			image: siteDir + 'images',
			style: sassStyle,
			require: ['susy', 'breakpoint']
		})
		.on('error', gutil.log))
        .pipe(reload({stream: true}));
});

gulp.task('serve', function() {
    browserSync.init({
    	browser: "google chrome",
        proxy: "localhost/black"
    });

    gulp.watch([siteSources], ['site']);
    gulp.watch([layoutSources], ['layout']);
});

gulp.task('default', ['serve']);